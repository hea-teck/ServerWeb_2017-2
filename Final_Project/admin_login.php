<?php
session_start(); //메모리 공강 할당
 
$con = mysqli_connect('localhost','root','123123','final');

if(isset($_POST['submit'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    if(empty($_POST['admin_username'])){
        echo "<script> alert('Please enter Admin Username !') </script>";
    }
    if(empty($_POST['admin_password'])){
        echo "<script> alert('Please enter Admin password !') </script>";
    }
 
    $query = "SELECT admin_name, admin_pass FROM admin
    WHERE admin_name='$admin_username' AND admin_pass='$admin_password'";
 
    $result = mysqli_query($con, $query);
 
    if( mysqli_num_rows($result)>0 ) {
        $_SESSION['admin_login']=$admin_username;
        header("Location: admin_users.php");
    }
    else {
        
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
                    <a class="hiddenanchor" id="toadmin_login"></a>
                    
                    <div id="wrapper">

                        <div id="login" class="animate form">   

                            <form action="admin_login.php" method="POST"> 
                                <h1>Admin</h1> 
                                <p> 
                                    <label for="admin_username" class="admin_username" > Admin username </label>
                                    <input id="admin_username" name="admin_username" type="text"/>
                                </p>
                                <p> 
                                    <label for="admin_password" class="admin_password">Admin password </label>
                                    <input id="admin_password" name="admin_password" type="password" /> 
                                </p>                                
                                <p class="signin button"> 

                                    <input type="submit" name="submit" value="Admin Log in"/> 

                                </p>  

                                <p class="change_link">
                                    
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