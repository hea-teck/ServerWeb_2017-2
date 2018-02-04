<?php
session_start();
$id = $_GET['cha'];
$con = mysqli_connect('localhost', 'root', '123123', 'final');

if (isset($_POST['submit'])) {
    
    $passwordchange = $_POST['passwordchange'];
	$up_id = $_POST['up_id'];
	
	if (empty($_POST['passwordchange'])) {
        echo "<script> alert('Please enter your passwordchange!')</script>";
        }		
	
    $query = "UPDATE users SET pass='$passwordchange' WHERE id='$up_id' ";
    $result = mysqli_query($con,$query);
    
    if ( mysqli_query($con,$query)) {
            header("Location: admin_users.php");
    } else {
        echo "Wrong name or password !";
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
                    <a class="hiddenanchor" id="topasswordchange"></a>
                    
                    <div id="wrapper">

                        <div id="login" class="animate form">   

                            <form action="change.php" method="POST"> 

                                <h1>Password Change</h1><br> 

                                <p> 
                                    <label for="passwordchange" class="passwordchange" > Password </label>

									<input type="hidden" name="up_id" value=<?php echo $id; ?>>

                                    <input id="passwordchange" name="passwordchange" type="password" />
                                </p><br>
                                                               
                                <p class="signin button"> 
                                    <input type="submit" name="submit" value="Modify"/>
                                </p>                                
                                
                            </form>
                        </div>                                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>