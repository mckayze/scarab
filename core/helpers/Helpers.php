<?php

/**
 * @param $variable
 *
 * The dd() function means to die and var_dump it
 * both cancels any further script execution
 * and then var_dumps a variable onto
 * the page for debugging purposes
 */
function dd($variable)
{
    return die(var_dump($variable));
}

/**
 * @return string
 *
 * This is the function that is responsible for setting
 * the base path of the application, given that the
 * application has a suitable name this method
 * will return the value of that folder name
 */
function getBaseUrl()
{
    $currentBasePath = str_replace('\core', '', dirname(__DIR__));
    $baseUrl = @end(explode('\\', $currentBasePath));
    return "/$baseUrl/";
}

/**
 * @param $url
 * @return string
 *
 * This method is responsible for handling requests made to
 * resources in the public directory, scarab looks in
 * the public directory / wherever the user has
 * requested to find the given resource.
 * used along with {{ $var }} to be
 * successfully echos onto the
 * page.
 */
function resource($url)
{
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]public/$url";
}

/**
 * @param $item
 * @return mixed
 *
 * This is the method used for providing a view to the user, it
 * uses the infamous eval() function to return the view and
 * change {{}} -> <?= ?> allowing users to echo variables
 * onto the page more neatly that implementing PHP tags
 * everywhere.
 */
function provide($item)
{

    $src = __DIR__.'/../../views/'.$item.'.view.php';
    $text = str_replace(["{{","}}" ],[ "<?=", "?>" ], file_get_contents($src));

    return eval("?>".$text);
}

/**
 * @param $url
 * @return string
 *
 * This is a simple function that checks the $url data being
 * passed to it and returns a url based on that, if the
 * URL is '/' then it just returns a home page request
 * else it returns the full requested string.
 */
function url($url)
{
    if($url == '/'){return "http://$_SERVER[HTTP_HOST]".getBaseUrl();}
    else{return $url;}
}

/**
 * @param $view
 * @param $data
 *
 * This is the view function which controls converting {{ }}
 * to a php method that echos out variables. This is used
 * directly from the controller where you can set
 * variables for use in the page returned by
 * View()
 */
function View($view, $data = null)
{
    $variables = "<?php ";
    $ending = "?>";

    # This foreach is responsible for setting usable variables
    # along with their values on the page returned by View()
    if($data)
    {
        foreach($data as $key => $value)
        {
            $value = (string)$value;
            $value = str_replace("'", '\\', $value);
            $variables .= "$$key = '".$value."';";
        }
    }

    $variables .= $ending;

    $src  = __DIR__.'/../../views/'.$view.'.view.php';
    $text = $variables . str_replace(["{{","}}" ],[ "<?=", "?>"],file_get_contents($src));

    eval("?>".$text);
}

/**
 * @param $uri
 *
 * This function is responsible for displaying the 404 page
 * depending on whether the user has one set or not. 404
 * pages are set in the 'views/errors/' directory under
 * the 404.view.php page. If one is not set a default
 * page is shown to the user.
 */
function display404($uri)
{
    if(@file_get_contents(__DIR__. '/../../views/errors/404.view.php'))
    {
        echo file_get_contents(__DIR__. '/../../views/errors/404.view.php');
    }
    else
    {
        echo "<p style='font-size: 72px; font-family: helvetica, sans-serif; text-align: center; padding-top: 50px;'>
                  Error! page \"<span style='color: red;'>$uri</span>\", not found :(
                  <br /> <br />
                  <img src='http://i.imgur.com/5VqzuqK.png' alt=''>
              </p>";
    }

}