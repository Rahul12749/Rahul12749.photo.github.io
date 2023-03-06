<?php 
include('connection.php');

if(isset($_GET['id'])){
    $deleteid = $_GET['id'];
    $delete = "DELETE FROM videos WHERE  videos = '$deleteid'";
    $resultdelete = mysqli_query($conn,$delete);
    if($resultdelete){
        unlink("../upload/".$deleteid);
        echo "<script> window.open('./videos.php','_self')</script>";
    }
}
?>