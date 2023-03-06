<?php 
include('connection.php');

if(isset($_GET['id'])){
    $deleteid = $_GET['id'];
    $delete = "DELETE FROM youtube WHERE  id = '$deleteid'";
    $resultdelete = mysqli_query($conn,$delete);
    if($resultdelete){
        echo "<script> window.open('./youtube.php','_self')</script>";
    }
}
?>