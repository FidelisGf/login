<?php
    session_start();
    include("connection.php");
    include("fuctions.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
            $query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password){
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
            echo "<script>alert('Usuario ou Senha Invalidos !');</script>";
        }else{
            echo "<script>alert('Preencha os campos corretamente !');</script>";
        }
    }

?>
<html>
    <head>
        <title>
            login
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
                <div style="font-size: 20px;margin: 10px; color: white; margin-left: 100px;"><h1>Login</h1></div>
                <input id="text" type="text" name="user_name"><br><br>
                <input id="text" type="password" name="password"><br><br>
                <input id="button" type="submit" value="LOG-IN"><br><br>
            </form>
            <div>
                <a href="sig-up.php">
                    <button class="link">
                        Cadastra-se
                    </button>
                </a>
            </div>
        </div>
    </body>
</html>