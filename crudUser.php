<?

$pdo = new PDO('mysql:usuario=localhost;dbname=cadastro', 'root', '');

function readAll() {

  global $pdo;
	$stmt = $pdo->prepare("SELECT * FROM usuario");
	$stmt->execute();
	$usuarios = array();
	while($usuario = $stmt->fetch(PDO::FETCH_ASSOC)){
		$usuarios[] = $usuario;
	}
	return $usuarios;

}

function readById($id) {

	global $pdo;
	$stmt = $pdo->prepare("SELECT * FROM usuario WHERE `id_usuario` = ?");
	$stmt->bindParam(1, $id);
	$stmt->execute();
	$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
	return $usuario;

}

function remove($id) {

	global $pdo;
	$stmt = $pdo->prepare("DELETE FROM `usuario` WHERE `id_usuario`= ?");
	$stmt->bindParam(1, $id);
	$stmt->execute();

}

function create($nome_usuario, $login_usuario, $senha_usuario, $email_usuario) {

	global $pdo;
	$stmt = $pdo->prepare("INSERT INTO `usuario` VALUES (null, ?, ?, ?, ?)");
	$stmt->bindParam(1, $nome_usuario);
	$stmt->bindParam(2, $login_usuario);
	$stmt->bindParam(3, $senha_usuario);
	$stmt->bindParam(4, $email_usuario);
	$stmt->execute();

}

function update($id, $nome_usuario, $login_usuario, $senha_usuario, $email_usuario) {

	global $pdo;
	$stmt = $pdo->prepare("UPDATE `usuario` SET `nome_usuario`= ?, `login_usuario`= ?, `senha_usuario`= ?, `email_usuario`= ? WHERE `id_usuario`= ?");
	$stmt->bindParam(1, $nome_usuario);
	$stmt->bindParam(2, $login_usuario);
	$stmt->bindParam(3, $senha_usuario);
	$stmt->bindParam(4, $email_usuario);
	$stmt->bindParam(5, $id);
	$stmt->execute();
	
}

?>
