<?php
session_start(); //메모리 공강 할당
 
$con = mysqli_connect('localhost','root','123123','final');
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($_POST['username'])){
        echo "<script> alert('Please enter Username !') </script>";
    }
    if(empty($_POST['password'])){
        echo "<script> alert('Please enter password !') </script>";
    }
 
    $query = "SELECT name, pass FROM users
    WHERE name='$username' AND pass='$password'";
 
    $result = mysqli_query($con, $query);
 
    if( mysqli_num_rows($result)>0 ) {
        $_SESSION['login']=$username;
        header("Location: content.php");
    }
    else {
        // echo "Wrong username or password"; //이거 말고 메시지창 띄우듯이 하는 것 추가
    }
}
?>


<!DOCTYPE html>

<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>Final Project</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <link href="css/abc.css" rel="stylesheet"> 
    </head>
    <body>
        <div class="container">           
            <header>
                <h1></h1> <br><br><br>
            </header>
            <section>               
                <div id="container_demo" >                                        
                    <a class="hiddenanchor" id="tologin"></a>
                    
                    <div id="wrapper">

                        <div id="login" class="animate form">   

                            <form action="login.php" method="POST"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" > Your username </label>
                                    <input id="username" name="username" type="text" />
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" type="password" /> 
                                </p>                                
                                <p class="signin button"> 
                                    <input type="submit" name="submit" value="Log in"/> 
                                </p>                                
                                <p class="change_link">
                                    Not a member yet ?
                                    <a href="registration.php">Join us</a>

                                    <a href="index.php">Back</a>

                                </p>
                            </form>
                        </div>                                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>




