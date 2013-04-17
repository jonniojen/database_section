<?

require_once "crudUser.php";

$usuario;

if(isset($_GET['id'])) {

  $id = $_GET['id'];
	$usuario = readById($id);

}

if(isset($_GET['nome_usuario'])) {

	update($_GET['id_usuario'], $_GET['nome_usuario'], $_GET['login_usuario'], $_GET['senha_usuario'], $GET['email_usuario']);
	header("Location:indexadmin.php");

}

?>

<!doctype html>

<html lang="pt-br">
	
	<head>
	
		<meta charset="UTF-8">
		<title></title>

	</head>

	<body>
	
		<form action="<?=$_SERVER['PHP_SELF']?>">
			<input type="hidden" name="id_usuario" value="<?=$usuario['id_usuario']?>">
			Nome:<br>
			<input type="text" name="nome_usuario" value="<?=$usuario['nome_usuario']?>"><br>
			Login:<br>
			<input type="text" name="login_usuario" value="<?=$usuario['login_usuario']?>"><br>
			Senha:<br>
			<input type="password" name="senha_usuario" value="<?=$usuario['senha_usuario']?>"><br>
			Email:<br>	
			<input type="email" name="email_usuario" value="<?=$usuario['email_usuario']?>"><br>
			<input type="submit" name="enviar" value="Cadastrar">
		
		</form>
	
	</body>

</html>
