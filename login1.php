<?php 

include("connect.php"); 

$use_requ = $_REQUEST['usr'];
$pass = $_REQUEST['pwd'];
$pwd_requ = md5($pass);
$sql ="SELECT * FROM tbl_users WHERE user ='$use_requ' AND password='$pwd_requ';";
$result = $conn->query($sql);
 
if(!empty($result) && mysqli_num_rows($result)==1){
	session_start();
	$_SESSION['usr'] = $use_requ;
	echo '<meta http-equiv="Refresh" content="0;URL=./index.php">';
}else{
	echo '<meta http-equiv="Refresh" content="0;URL=./login.php">';
} 

$conn->close();
?>