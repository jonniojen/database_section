<?

include "crudUser.php";
$usuarios = readAll();

?>

<!doctype html>

<html lang="pt-br">
  
	<head>
		
		<meta charset="UTF-8">
		<title>Document</title>
		
		<style type="text/css">

			table {
				counter-reset: count;
				width: 50%;
			}

			.id_usuario:before {
				counter-increment: count;
				content: counter(count);
			}

			table, tr {
				border-collapse: collapse;
				border: 1px solid #000;
				text-align: center;
			}

			#titulo {
				text-align: center;
			}

			#botao {
				position: relative;
				left: 50%;
				right: 50%;
			}

		</style>

	</head>
	
	<body>
		
		<h2 id="titulo">Registro de usuários cadastrados</h2>
		
		<?if(!empty($usuarios)){?>
						
			<table border="1" align="center">
				<?foreach ($usuarios as $usuario) {?>
					<tr>
						<td class="id_usuario"></td>
					<?foreach ($usuario as $nameCol=>$columns) {
						if($nameCol != "id_usuario"){?>
							<td><?=$columns?></td>
						<?}
					}?>
						<td>
							<a href="remove.php?id=<?=$usuario['id_usuario']?>">
								<img src="http://localhost/aulasphp/Website/images/remove.png" alt="Remover" title="Remover">
							</a>
						</td>
						<td>
							<a href="update.php?id=<?=$usuario['id_usuario']?>">
								<img src="http://localhost/aulasphp/Website/images/edit.png" alt="Editar" title="Editar">
							</a>
						</td>
					</tr>
				<?}?>
			</table>
			
		<?}else{?>
		
			<p>Nenhum Usuário foi cadastrado.</p>
			
		<?}?>
						
		<br>

		<button onclick="location.href='cadastro.php'" id="botao">Cadastrar novo usuário</button>
		
	</body>
	
</html>
