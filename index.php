<?

// CODIGO PHP QUE SERÁ CHAMADO AO CLICAR-SE NO BOTAO ENVIAR DO FORMULARIO CADASTRO.

$pdo = new PDO('mysql:usuario=localhost;dbname=cadastro', 'root', '');

if(isset($_REQUEST["setar_dados"])){
     
    if(empty($_POST["usr_nome"]) || empty($_POST["usr_login"]) || empty($_POST["usr_senha"]) || empty($_POST["usr_email"])){
       
        echo "<script>alert('Preencha todos os campos antes de enviar seu cadastro!');</script>";  
       
    }

    else{

        $tb = $pdo->prepare("INSERT INTO `usuario` VALUES (null, ?, ?, ?, ?)");
  	$tb->bindParam(1, $_POST["usr_nome"]);
		$tb->bindParam(2, $_POST["usr_login"]);
		$tb->bindParam(3, $_POST["usr_senha"]);
		$tb->bindParam(4, $_POST["usr_email"]);
        $tb->execute();
        $tb = null;
           
        echo "<script>alert('Cadastro efetuado com sucesso!\\nFaça seu login agora');document.location='index.php';</script>";
           
    }
     
}

?>

<?

// CODIGO PHP QUE SERÁ CHAMADO AO CLICAR-SE NO BOTAO OK DO FORMULARIO LOGIN.

if(isset($_REQUEST["fazer_login"])) {
     
    if (!empty($_POST) AND (empty($_POST['usr_login2']) OR empty($_POST['usr_senha2']))) {

    	header("Location: index.php"); 
    	exit;

   	}
        
    $tb = $pdo->prepare("SELECT `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario` FROM `usuario` WHERE (`login_usuario` = ?) and `senha_usuario`=?");
        
    $tb->bindParam(1, $_POST["usr_login2"]);
	$tb->bindParam(2, $_POST["usr_senha2"]);
    $tb->execute();
    $log = $tb->fetch(PDO::FETCH_ASSOC);

 	// Quando o campo não estiver vazio, quer dizer que o usuário está logado e você pode direcioná-lo para onde quiser através do header.

    if(!empty($log)) {

        $_SESSION["usuario"] = $log["id_usuario"];
        header("Location: http://localhost/aulasphp/Website/command_section/index.php");
       
    }

    else {
   
        echo "<script>alert('Login Falhou');</script>";
        
    }   
     
} 

// Se o usuário estiver no banco de dados, ele será logado, caso contrário, será exibido o alerta.

?>

<!doctype html>

<html lang="pt-br">

	<head>
		
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		
		<style type="text/css">

			.cabecalho {
				background-color: RoyalBlue;
				color: white;
				text-transform: uppercase;
				font-size: 18px;
				font-family: Arial,Helvetica,sans-serif;
			}

		</style>
		
	</head>

	<body>
		
			<div class="scene">
  				<div class="text">TOOLS FOR NETWORK TESTING</div>
  				<div class="sheep">
    				<span class="top">
      					<div class="body"></div>
      					<div class="head">
        					<div class="eye one"></div>
        					<div class="eye two"></div>
        					<div class="ear one"></div>
        					<div class="ear two"></div>
      					</div>
    				</span>
      					<div class="legs">
        					<div class="leg"></div>
        					<div class="leg"></div>
        					<div class="leg"></div>
        					<div class="leg"></div>
    					</div>
    			</div>
  			</div>
  						
		<p class="cabecalho">Informe seus dados</p>
					
		<br>
			
		<form name="cadastro" method="post" action="<?=$_SERVER['PHP_SELF']?>">
			
			<input type="text" name="usr_nome" id="usr_nome" size="60" placeholder="Nome Completo" required> <br> <br>
			
			<input type="text" name="usr_login" id="usr_login" size="60" placeholder="Login" required> <br> <br>
			
			<input type="password" name="usr_senha" id="usr_senha" size="60" placeholder="Senha" required> <br> <br>
			
			<input type="email" name="usr_email" id="usr_email" size="30" placeholder="Email" required> <br> <br>
			
			<input type="submit" name="setar_dados" value="Enviar">
	
			<input type="reset" value="Limpar">
			
		</form>
		
		<p class="cabecalho">Faça seu login</p>
								
		<br>
		
		<form name="login" method="post" action="<?=$_SERVER['PHP_SELF']?>">
									
			<input type="text" name="usr_login2" id="usr_login2" size="60" placeholder="Login" required> <br> <br>
			
			<input type="password" name="usr_senha2" id="usr_senha2" size="60" placeholder="Senha" required> <br> <br>
			
			<input type="submit" name="fazer_login" value="OK">
	
			<input type="reset" value="Limpar">
			
		</form>
		
	</body>

</html>
