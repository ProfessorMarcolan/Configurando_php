<?php
	include 'database.php';
	$pdo = pdo_connect_mysql();
	//Verifica se o formulário foi postado
	if($_POST)
	{
		$login = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM `users` WHERE `login` = ? AND `password` = ?";
		$query = $pdo->prepare($sql);
		$query->execute([$login, $password]);
		if($query->rowCount() == 1)
		{
			session_start();
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['usuario'] =$login ;
			header('Location: index.php');
		} else {
			echo "login não encontrado";
		}
		
	}
?>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<table border="1">
			<form action="" method="post">
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username"></td>
				<tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password"></td>
				<tr>
				<tr><td colspan="2"><button>Login</button></td></tr>
			</form>
		</table>
	</body>
</html>