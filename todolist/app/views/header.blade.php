<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="To do list App">
	<meta name="keywords" content="HTML,CSS,JQuery, PHP">
	<meta name="author" content="André Rocha">
	<title>To Do List</title>

    <!--CSS LINKS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/css.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('semantic-ui/semantic.min.css') }}">

</head>
<body>
    <div class = "container">