<?php
session_start();

include("connection.php");
include("fuctions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $Nome_Real = $_POST['Nome_Real'];
    $email = $_POST['email'];
    $cpf = $_POST['Cpf'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,password, Nome_Real, CPF, email) values ('$user_id','$user_name','$password', '$Nome_Real', '$cpf', '$email')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }else
    {
        echo "<script>alert('Informações Invalidas');</script>";
    }
}
    
?>
<html>
    <head>
        <title>
           Sign-up
        </title>
    </head>
    <body>
        <style type="text/css">
             #text{
                height: 25px;
                border-radius: 10px;
                padding: 6px;
                border: solid thin #aaa;
                width: 90%;
                margin-left: 16px;
            }
            #text:hover{
                outline: 0;
            }
            #button{
                padding: 10px;
                margin-left: 8px;
                width: 100px;
                height: 32px;
                color: white;
                background-color: lightblue;
                border: none;
                border-radius: 10px;
                margin-left: 98px;
                transition: 1s;
            }
            #box{
                background-color: grey;
                width: 300px;
                padding: 20px;
                border: none;
                border-radius: 20px;
                margin: auto;
                margin-top: 200px;
            }
            #button:hover{
                background-color: #44CBCB;
            }
            .link:hover{
                background-color: #3CB7B7;
            }
            .link{
                transition: 1s;
                margin-left: 98px;
                margin-top: -12px;
                width: 100px;
                height: 30px;
                border-radius: 20px;
                border: none;
                background-color: lightblue;
                color: white;
            }
        </style>
        <div id="box">
            <form method="POST">
                <div style="font-size: 20px;margin: 10px; color: white; margin-left: 74px;"><h1>Cadastro</h1></div>
                <input id="text" type="text" name="user_name" placeholder="Usuario"><br><br>
                <input id="text" type="password" name="password" placeholder="Senha"><br><br>
                <input id="text" type="text" name="Nome_Real" placeholder="Seu Nome" ><br><br>
                <input id="text" type="text" name="Cpf" placeholder="Cpf"><br><br>
                <input id="text" type="email" name="email" placeholder="E-mail"><br><br>
                <input id="button" type="submit" value="Cadastrar"><br><br>
            </form>
            <div>
                <a href="login.php">
                    <button class="link">
                        Logar
                    </button>
                </a>
            </div>
        </div>
        
    </body>
</html>