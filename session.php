<?php
session_start();
require_once "code.php";

if(!isset($_SESSION['userid']) || trim($_SESSION['userid']) == ''){
    header("location: login_admin.php");
}
$sql ="SELECT * FROM admin WHERE id='".$_SESSION['userid']."'";
$query=$dbh->prepare($sql);
$query->execute();
$row=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0){
    foreach($row as $userresult);
}

?>