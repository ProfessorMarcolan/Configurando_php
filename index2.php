<?php
    session_start();
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'generico_2';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e){
        die("Error: " . $e->getMessage());
    }

    /**
     * Login
    */
    if(isset($_POST) && !empty($_POST)){ // Executar apenas se for chamado via um method post
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING); // Filtrar o input (segurança)
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING); // Filtrar o input (segurança)

        if (empty($login) || empty($password)) { // Se os campos forem vazios, executa o erro.
            echo 'Preencha os campos';
        } else {
            $sql_password = $pdo->prepare("select * from users where login=:login");
            $sql_password->bindParam(":login", $login);
            $sql_password->execute();

            $dados = $sql_password->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $dados['password'])) { // Verificar a senha criptografada, caso esteja correta, faz o login, caso contrario, da erro.
                $_SESSION['login'] = $dados['login'];
            } else {
                echo 'Login ou senha inválidos.';
            }
        }
    }

    if (isset($_GET['sair']) and $_GET['sair'] == 'logoff') { // Apenas para fazer logout
        session_destroy(); // Destroy as sessões criadas.
        header("Location: index.php"); // Redireciona após destroy a sessão.
    }
?>

<b>Senha para criar no Banco de dados, para teste</b> (<b>senha:</b> teste).<br>
<?php echo password_hash("teste", PASSWORD_DEFAULT); ?><br><br><br>

<?php if (!isset($_SESSION['login'])) : // Formulario aparece apenas se o usuário tiver deslogado. ?>
<form action="" method="post">
    <label>Login</label><br>
    <input type="text" name="login"><br>

    <label>Password</label><br>
    <input type="password" name="password"><br>
    <br>
    <input type="submit">
</form>
<?php else: // Apos o else, ele informa os dados do usuário logado. ?>
<?php echo 'Bem-vindo(a), ' . $_SESSION['login']; ?><br>
<a href="?sair=logoff">Sair</a>
<?php endif; ?>

<h2>Lista de usuarios</h2>

<?php
  $listagem = $pdo->query("select * from users");
  $list = $listagem->fetchAll();

  foreach ($list as $value) {
    echo 'ID: '.$value['id'].' - Nome: '.$value['login']."<br>";
  }
?>
