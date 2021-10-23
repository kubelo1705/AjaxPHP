<?php
    $connect=mysqli_connect("localhost","root","","ajax");
    $message="";
    if(!empty($_POST)){
        $username=mysqli_escape_string($connect,$_POST["username_login"]);
        $password=mysqli_escape_string($connect,$_POST["password_login"]);
        $sql="SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
        if($connect->query($sql)->num_rows>0){
            $message="Login successful.";
        }else{
            $message="Username or password is incorrect.";
        }

    }else{
        $message="Error data.";
    }
    $connect->close();
    echo $message;
?>