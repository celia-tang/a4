<!DOCTYPE html>
<html>
<head>
	<title>
        Tasks
    </title>

	<meta charset='utf-8'>
    <link href="css/style.css" type='text/css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    @stack('head')

</head>
<body>

	<header>
		<h1>Tasks To Do</h1>
	</header>

	<section>
		@yield('content')
	</section>

    @stack('body')

</body>
</html>