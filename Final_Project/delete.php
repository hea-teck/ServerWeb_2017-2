<?php
$con = mysqli_connect('localhost', 'root', '123123', 'final');
$delete_id = $_GET['del'];
$query = "DELETE FROM users WHERE id='$delete_id'";

if (mysqli_query($con, $query)) {
	header("Location: admin_users.php");
}

?>