<script type="text/javascript">
/*ID중복검사이벤트*/
function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  document.getElementById("txtHint").style.border="0px solid red";
  return;
  }
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    document.getElementById("txtHint").style.border="0px solid black";
    }
  }
xmlhttp.open("GET","namecheck.php?q="+str,true);
xmlhttp.send();
}
</script>

<?php
session_start();

$con = mysqli_connect('localhost','root','123123','final');

if(isset($_POST['submit'])){
    $usernamesignup = $_POST['usernamesignup'];
    $passwordsignup = $_POST['passwordsignup'];
    $emailsignup = $_POST['emailsignup'];

    if( empty($_POST['usernamesignup']) || empty($_POST['passwordsignup']) || empty($_POST['emailsignup'])){
        echo "<script> alert('Please enter all required filed !!! ') </script>";

    }
    else{
        $query = "SELECT * FROM users 
                  WHERE name='$usernamesignup' OR email='$emailsignup'";
        $result = mysqli_query($con, $query);

        if( mysqli_num_rows($result)>0 ){
             echo "<script> alert('Username or email is already exist. Please use another one!!') </script>";          
        } 
        else{
            $query = "INSERT INTO users (name, pass, email)
                      VALUES ('$usernamesignup', '$passwordsignup', '$emailsignup')";
            if(mysqli_query($con, $query)){
              $_SESSION['login']=$usernamesignup;
              header("Location: content.php");
            }
        }
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
                    <a class="hiddenanchor" id="toregister"></a>
                    
                    <div id="wrapper">

                        <div id="login" class="animate form">

                            <form action="registration.php" method="POST"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" >Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" type="text" onkeyup="showHint(this.value)"> <a id="txtHint"></a>
                                </p>
                                
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" type="password"/>
                                </p>

                                <p> 
                                    <label for="emailsignup" class="youmail"  > Your email</label>
                                    <input id="emailsignup" name="emailsignup" type="email" /> 
                                </p>
                                
                                <p class="signin button"> 
                                    <input type="submit" name="submit" value="Sign up"/> 
                                </p>
                                <p class="change_link">  
                                    Already a member ?
                                    <a href="login.php"> Go and log in </a>
                                    
                                </p>
                            </form>
                        </div>    
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>



레