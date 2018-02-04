<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location:login.php");   
}
$id=$_SESSION['login'];


$con = mysqli_connect('localhost','root','123123','final');

$result1=mysqli_query($con, "SELECT * FROM users WHERE name='$id'");

$row=mysqli_fetch_array($result1);

$ab = $row['id'];

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    
    if (empty($_POST['username'])) {
        echo "<script> alert('Please enter your name!')</script>";
        }
    if (empty($_POST['password'])) {
        echo "<script> alert('Please enter your pass!')</script>";
        }       
    if (empty($_POST['email'])) {
        echo "<script> alert('Please enter your email!')</script>";
        }
    
    $query = "UPDATE users SET  name='$name',pass='$pass',email='$email' WHERE id='$ab'";
    $result = mysqli_query($con,$query);
    
    if ( mysqli_query($con,$query)) {
            $_SESSION['login']=$name;
            header("Location: content.php");
    } else {
      
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

                            <form action="mypage.php" method="POST"> 
                                <h1>My page</h1> 
                                <p> 
                                    <label for="username" class="uname" > Your username </label>
                                    <input id="username" name="username" type="text" />
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" type="password" /> 
                                </p>           
                                <p> 
                                    <label for="email" class="email"> Your address </label>
                                    <input id="email" name="email" type="text" /> 
                                </p>                      
                                <p class="signin button"> 
                                    <input type="submit" name="submit" value="Modify"/>
                                </p>                                
                                <p class="change_link">
                                    
                                    <a href="content.php">Back</a>

                                </p>
                            </form>
                        </div>                                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
