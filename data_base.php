<?php
$link = mysqli_connect('localhost','root','','my_data');
if(mysqli_connect_errno()) {
	echo "Could not connect {'.mysqli_connect_errno().'}: ".mysqli_connect_error();
	exit();
}
