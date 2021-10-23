<?php
    $connect=new mysqli("localhost","root","","ajax");
    $message="";
    if(!empty($_POST)){
        $username=mysqli_escape_string($connect,$_POST["username"]);
        $email=mysqli_escape_string($connect,$_POST["email"]);
        $password=mysqli_escape_string($connect,$_POST["password"]);
        $sql="SELECT * FROM accounts WHERE username = '$username'";
        if($connect->query($sql)->num_rows>0){
            $message="Username is uesd.";
        }else{
            $sql="SELECT * FROM accounts WHERE email = '$email'";
            if($connect->query($sql)->num_rows>0){
                $message="Email is uesd.";
            }else{
                $sql="INSERT INTO accounts (username,email,password) VALUES ('$username', '$email','$password')";
                if($connect->query($sql)){
                    $message="Register successfully.";
                }else{
                    $message=$sql;
                }
            }
        }
    }else{
        $message="Error data.";
    }
    $connect->close();
    echo $message;
?>