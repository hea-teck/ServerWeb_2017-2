<?php
$con = mysqli_connect("localhost","root","123123","final") or die(mysqli_connect_error());
$title = $_REQUEST['title'];
$image = mysqli_query($con, "SELECT * FROM upload WHERE title='$title'");
$image = mysqli_fetch_assoc($image);
$image = $image['image_data'];
// header("Content-type: image/jpeg"); 
echo $image; 
?>