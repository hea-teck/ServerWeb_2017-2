<!DOCTYPE html>

<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>Final Project</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <link href="css/abc.css" rel="stylesheet"> 
    </head>

<?php

    session_start(); //메모리 공강 할당

    $con = mysqli_connect("localhost", "root", "123123", "final") or die(mysqli_connect_error());

    if(isset($_POST['submit'])){

        $title=$_POST['title'];
        $comment=$_POST['comment'];

        $file = $_FILES['image']['tmp_name'];   
        $image_name = addslashes($_FILES['image']['name']);
        $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        
        $user_name = $_SESSION['login'];

        if ($image_size == FALSE) {
            echo "That's not an image !";
        }
        else { //올바른 경우 

            $sql = "INSERT INTO upload (title, comment, image_name, image_data, user_name)
            VALUES ('$title','$comment','$image_name','$image_data', '$user_name') ";

            if(!mysqli_query($con, $sql)){ 
                echo "Problem in uploading image !". mysqli_error($con);
            }else{
                header("Location: content.php"); //업로드 버튼 클릭 시 화면 전환
                
                // echo "<img align='center' width='200' height='200' src='get.php?title=$title'></h4>"; 업로드하는 곳에 사진 출력..
            }   
        }        
    }

?>


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

                            <form action="upload.php" method="POST" enctype="multipart/form-data"> 
                                <h1>Upload</h1> 

                                <p> 
                                    <label for="title" class="title" > Title </label>
                                    <input id="title" name="title" type="text" />
                                </p>

                                <p> 
                                    <label for="Comment" class="Comment"> Comment </label>
                                    <textarea name="comment" rows="10" cols="60"></textarea>
                                   
                                </p>   
                                <p>
                                File<input type="file" name="image">
                                </p>  
                                <p class="signin button"> 
                                    <input type="submit" name="submit" value="Upload"/>
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