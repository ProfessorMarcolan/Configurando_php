<?php
	session_start();
	include 'database.php';
	$pdo = pdo_connect_mysql();
	if(isset($_POST['action']))
	{
		if($_POST['action'] == 'logout')
		{
			session_destroy();
			header("Location: login.php");
		}
	}
?>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
	<?php
		if($_SESSION['isLoggedIn'])
		{
			echo "Logado";
			?>
				<form method="post">
					<button name="action" value="logout">Logout</button>
				</form>
			<?php
		} else {
			?>
				<script>
					alert("Usuário não logado!!");
					document.location.href = "login.php";
				</script>
			<?php
		}
	?>
	</body>
</html>