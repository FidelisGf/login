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
    header("Location: Cadastro-Produto.php");
    die;
    
}
?>
<html>
    <head>
        <title>Cadastro-Produto</title>
    </head>
    <body>
        Cadastro
        <form method="POST">
        <input class="Codig" id="text" type="number" name="Codigo" placeholder="Codigo do produto"><br><br>
		<input id="text"  type="text" name="Produto" placeholder="Produto"><br><br>
		<input id="text"  type="text" name="Setor" placeholder="Setor"><br><br>
		<input id="text"  type="number" name="Quantidade" placeholder="Quantidade"><br><br>
		<input id="text"  type="number" name="Valor" placeholder="Valor"><br><br><br>
		<input id="button" type="submit">
        </form>
    </body>
</html>