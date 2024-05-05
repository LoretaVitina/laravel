<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        body{
            background: green;
        }
        h1{
            color: white;
        }
    </style>
</head>
<body>
<h1>{{ $P['title'] }}</h1>
<br>
<p>{{ $P['body'] }}</p>
<p>{{ $P['date'] }}</p>

</body>
</html>
