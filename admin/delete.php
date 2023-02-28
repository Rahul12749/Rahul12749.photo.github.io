<?php 
include('connection.php');

// if(isset($_GET['id'])){
//     $deleteid = $_GET['id'];
//     $delete = "DELETE portfolio,images FROM portfolio INNER JOIN images ON portfolio.name = images.portfolio_id WHERE  portfolio.id = '$deleteid'";
//     $resultdelete = mysqli_query($conn,$delete);
//     echo $resultdelete;
//     if($resultdelete){
//         echo "<script> window.open('./portfolio.php','_self')</script>";
//     }
// }

if(isset($_GET['id'])){
    $deleteid = $_GET['id'];
    $delete = "DELETE FROM videos WHERE  id = '$deleteid'";
    $resultdelete = mysqli_query($conn,$delete);
    if($resultdelete){
        echo "<script> window.open('./videos.php','_self')</script>";
    }
}
?>