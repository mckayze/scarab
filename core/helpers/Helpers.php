<?php

function dd($item)
{
    return die(var_dump($item));
}

function getBaseUrl()
{
    $currentBasePath = str_replace('\core', '', dirname(__DIR__));
    $baseUrl = @end(explode('\\', $currentBasePath));
    return "/$baseUrl/";
}

function resource($url)
{
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]public/$url";
}

function provide($item)
{

    $src = __DIR__.'/../../views/'.$item.'.view.php';
    $text = str_replace(["{{","}}" ],[ "<?=", "?>" ], file_get_contents($src));

    return eval("?>".$text);
}

function url($url)
{
    if($url == '/')
    {
        return "http://$_SERVER[HTTP_HOST]".getBaseUrl();
    }
    else
    {
        return $url;
    }
}


function View($view, $data)
{
    $variables = "<?php ";
    $ending = "?>";


    foreach($data as $key => $value)
    {
        $value = (string)$value;
        $value = str_replace("'", '\\', $value);
        $variables .= "$$key = '".$value."';";
    }

    $variables .= $ending;

    $src  = __DIR__.'/../../views/'.$view.'.view.php';
    $text = $variables . str_replace(["{{","}}" ],[ "<?=", "?>"],file_get_contents($src));

    eval("?>".$text);
}

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