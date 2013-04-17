<?

include "crudUser.php";

if(isset($_GET['id'])) {

  $usuario = readById($_GET['id']);
	$nome_usuario = $usuario['nome_usuario'];

}

if(isset($_POST['sim'])) {

	remove($_POST['id']);
	header("Location:indexadmin.php");

}

if(isset($_POST['nao'])) {

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
	
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
			<input type="hidden" name="id" value="<?=$usuario['id_usuario']?>">
			<p>Confirmar a exclusão da conta de <?=$nome_usuario?>?</p>
			<input type="submit" name="sim" value="Sim">
			<input type="submit" name="nao" value="Não">
		</form>
		
	</body>

</html>
