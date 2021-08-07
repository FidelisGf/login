<?php 
session_start();

	include("connection.php");
	include("fuctions.php");
	$user_data = check_login($con);

?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Codigo = $_POST['Codigo'];
		$Setor = $_POST['Setor'];
		$Quantidade = $_POST['Quantidade'];
		$Valor = $_POST['Valor'];
		$Produto = $_POST['Produto'];
		$query = "insert into produtos (Codigo,Produto,Setor,Quantidade,Valor) values ('$Codigo','$Produto','$Setor','$Quantidade', '$Valor')";
		mysqli_query($con, $query);
		header("Location: index.php");
		die;
		
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Menu</title>
	</head>

	<body style="background-color: #17D6D6;">
		<style type="text/css">
		 *{margin:0;padding: 0;box-sizing: border-box;}
			.body{
				width: 100%;
				height: 100%;	
				
			}
			.Inicio{
				width: 100%;
				height: 80px;
				background-color: #9CDCE6;
				
			}
			.Intro{
				
				margin-left: 894px;
				padding-top: 25px;
				color: white;
				font-family: Georgia, 'Times New Roman', Times, serif;
				transform: translate(-30%);
			}
			#text{
				height: 28px;
                border-radius: 25px;
                padding: 6px;
                border: solid thin #aaa;
                width: 30%;
                margin-left: 20px;
			}
			.Usuario{
				margin-top: 105px;
				margin-left: 10px;
				display: inline-block;
				font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
				color: whitesmoke;
			}
			.Cadastro-titulo{
				margin: 20px;
				margin-left: 34%;
				transform: translate(-50%);
			}
			form input[type=number]:focus{
				outline: 0;
			}
			form input[type=text]:focus{
				outline: 0;
			}
			form input[type=submit]{
				margin-top: 12px;
				background:linear-gradient(to bottom, pink 5%, cyan 100%);
				background-color:black;
				border-radius:28px;
				border:1px solid #48EAE5;
				display:inline-block;
				cursor:pointer;
				color:#ffffff;
				font-family:Times New Roman;
				font-size:17px;
				margin-left: 29%;
				padding:16px 70px;
				text-decoration:none;
				text-shadow:1px 1px 1px #2f6627;
				animation-name: fadeInOpacity;
				animation-iteration-count: 1;
				animation-timing-function: ease-in;
				animation-duration: 2s;
				
			}
			form input[type=submit]:hover{
				background:linear-gradient(to bottom, #F0A2FF 20%, #EDC1F1 60%);
				background-color:#5cbf2a;
				
			}
			.a1{
				width: 1000px;
				height: 900px;
				margin-left: 35%;
				background-color: red;
			}
			.corpo{
				width: 500px;
				height: 450px;
				margin-left: 35%;
				background-color: #47DCD8;
				border-radius: 25px;
			}
		</style>

		<div class="Inicio">
			<h2 class="Intro">
				Cadastro de Produto
			</h2>
		</div>
		<br><br><br><br><br><br>
		<div class="corpo">
			<br><br><br>
			<form class="Bot">
				<input id="button" type="submit" value="Cadastrar" onclick="cadastro()">
				<br><br>
				<input id="button" type="submit" value="Atualizar">
				<br><br>
				<input id="button" type="submit" value="Remover">
				<br><br>
				<input style="margin-left: 162px;" id="button" type="submit" value="Sair" onclick="logout()">
			</form>
			
		</div>
		<div class="Usuario">
			<h4 class="User">
				Usuario: <?php echo $user_data['user_name']; ?> 
				
			</h4>
			<h4 class="Id">
				Id Do Usuario: <?php echo $user_data['user_id']; ?>
			</h4>
		</div>
		
		<script>
			function cadastro(){
				var win = window.open("Cadastro-Produto.php", '_blank');
				win.focus();
			}
			function logout(){
				window.location.href = "log-out.php";
			}
			var email = document.getElementsByName('Codigo');
            var senha = document.getElementsByName('senha');
            email.addEventListener('focus',()=>{
                email.style.borderColor= "rgb(69, 155, 212)";
            });
            email.addEventListener('blur',()=>{
                email.style.borderColor = "#ccc";
            });		
		</script>
	</body>
	
</html>