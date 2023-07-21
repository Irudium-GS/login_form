<?php 

$host="localhost";
$user="root";
$password="";
$db="user";

session_start();

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection error");
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select * from login where username='".$username."' AND password='".$password."' ";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="user")
    {
        $_SESSION["username"]=$username;
        header("location:userhome.php");
    }
    else if($row["usertype"]=="admin")
    {   
        $_SESSION["username"]=$username;
        header("location:adminhome.php");
    }
    else{
        echo "username or password incorrect";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Animated Login From</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="login.css" />
</head>
<body>
    <form action="#" method="POST">
        <div class="login_form_container">
            <div class="login_form">
                <h2>Login</h2>
                <div class="input_group">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" placeholder="Username" class="input_text" autocomplete="off" require/>
                </div>
                <div class="input_group">
                    <i class="fa fa-unlock-alt"></i>
                    <input type="password" placeholder="Password" class="input_text" autocomplete="off" require/>
                </div>
                <div class="button_group" id="login_button">
                    <input id="button" type="submit" value="Login">
                </div>
                <div class="footer">
                    <a href="#" >Forgot Password ?</a>
                    
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="login.js"></script>
</body>
</html>
