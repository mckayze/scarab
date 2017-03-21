<html lang="en">
<head>
    <meta charset="utf-8">it
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scarab | 1.0</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <style>
        body {
            font-size: 16px;
            padding-top: 370px;
            width: 100%;
        }
        .heading {
            font-family: 'Poiret One', cursive;
            font-size: 4em;
        }
        .c-container {
            display: block;
            text-align: center;
        }
        .nav {
            display:block;
            color: grey;
            user-select: none;
            -moz-user-select: none;
        }
        .nav > li {
            display: inline-block;
            margin: 0 70px;
        }
    </style>
</head>

<body>

<div class="c-container">
    <div class="heading">
        {{ $title }}
    </div>

    <br>

    {{ provide('partials/nav') }}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>