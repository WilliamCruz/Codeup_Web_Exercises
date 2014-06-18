<?php

var_dump($_GET);
var_dump($_POST)

?>
<html>
<head>
	<title>My First HTML Form</title>
</head>
<body>
		<form method="POST">

			<p>
				<label for="Username">Username</label>
				<input id="username" name="username" type="text">
			</p>
			<p>
				<label for="password">Password</label>
				<input id="password" name="password" type="text">
			</p>
			<p>
				<input type="submit">
			</p>
		</form>
</body>
</html>