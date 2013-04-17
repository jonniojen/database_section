<?

require_once "crudUser.php";

if(isset($_GET['nome_usuario'])) {

    create($_GET['nome_usuario'], $_GET['login_usuario'], $_GET['senha_usuario'], $_GET['email_usuario']);
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
            Nome:<br>
            <input type="text" name="nome_usuario"><br>
            Login:<br>
            <input type="text" name="login_usuario"><br>
            Senha:<br>
            <input type="password" name="senha_usuario"><br>
            Email:<br>
            <input type="email" name="email_usuario"><br>
            <input type="submit" name="enviar" value="Cadastrar">
        </form>
    
    </body>

</html>


