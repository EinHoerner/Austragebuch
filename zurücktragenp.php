<?php
session_start();
if(!isset($_SESSION['uid'])){
    header("Location: logout.php");
} 
else {
    $role = $_SESSION['role'];
    if($role == 'admin' || $role == 'sozpaed'){
        header("Location: logout.php");
    } 
    else{
        include 'dbh.php';
        $uid = $_SESSION['uid'];
        $sql = "UPDATE eintrag SET isback=1 WHERE uid='$uid' AND isback IS NULL";
        $result = mysqli_query($conn, $sql);
        
        $sql = "UPDATE schueler SET ausgetragen=NULL WHERE uid='$uid'";
        $result = mysqli_query($conn, $sql);
        
        header("Location: schueler.php?src=zurücktragen");
    }
}
?>