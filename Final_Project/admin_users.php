<!DOCTYPE html>

<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>Final Project</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <link href="css/abc.css" rel="stylesheet"> 


        <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #4CAF50;
            color: white;
        }
        </style>

    </head>
    <body>
        <div class="container">
           
            <header>
                <h1></h1> <br><br><br>
            </header>
            <section>               
                <div id="container_demo" >                                        
                    <a class="hiddenanchor" id="toadmin_users"></a>
                    
                    <div id="wrapper">

                        <div id="login" class="animate form">   

                            <form action="login.php" method="POST"> 
                                <h1>Users Management</h1> 



            <table border="2">
                <tr bgcolor="yellow" align="center">
                    <th> id </th>
                    <th> Name </th>
                    <th> Password </th>
                    <th> E-mail </th>
                    <th> Delete </th>
                </tr>

                <?php 
                $con = mysqli_connect('localhost', 'root', '123123', 'final');
                $query = "SELECT * FROM users";
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($result)){
                    $id = $row[0];
                    $username = $row[1];
                    $password = $row[2];
                    $email = $row[3];
                ?>

                
                <tr>
                    <td> <?php echo $id; ?> </td> 
                    <td> <?=$username ?> </td>
                    <td> <?=$password ?> </td>
                    <td> <?=$email ?> </td>
                    <td> <a href="delete.php?del=<?=$id?>">delete</a></td>
                </tr>
                <?php
                }
                ?>
            </table><br><hr><br>



            <table border="2">
                <tr bgcolor="yellow" align="center">
                    <th> id </th>
                    <th> Name </th>
                    <th> Password </th>
                    <th> E-mail </th>
                    <th> Change </th>
                </tr>

                <?php 
                $con = mysqli_connect('localhost', 'root', '123123', 'final');
                $query = "SELECT * FROM users";
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($result)){
                    $id = $row[0];
                    $username = $row[1];
                    $password = $row[2];
                    $email = $row[3];
                ?>

                
                <tr>
                    <td> <?php echo $id; ?> </td> 
                    <td> <?=$username ?> </td>
                    <td> <?=$password ?> </td>
                    <td> <?=$email ?> </td>
                    <td> <a href="change.php?cha=<?=$id?>">change</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
                                <p class="change_link">
                                    
                                    <a href="admin_login.php">Back</a>

                                </p>
                            </form>
                        </div>                                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
