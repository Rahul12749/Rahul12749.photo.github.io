<?php 
include('connection.php');

if(isset($_GET['id'])){
    $deleteid = $_GET['id'];
    $deletegallery = "DELETE FROM images WHERE images.p_id = '$deleteid'";
    $result = mysqli_query($conn,$deletegallery);
    $delete = "DELETE FROM portfolio WHERE portfolio.id = '$deleteid'";
    $resultdelete = mysqli_query($conn,$delete);
    if($resultdelete){
        echo "<script> window.open('./portfolio.php','_self')</script>";
    }
    if($result){
        echo "123";
    }
   
}
?>