<?php 
include('connection.php');

if(isset($_POST['submit'])){
    $portfolio_i = $_POST['portfolio_id'];
    $pid = $_POST['p_id'];
    $imageCnt = count($_FILES['image']['name']);
    for ($i=0; $i < $imageCnt ; $i++) { 
        $imageName =  $_FILES['image']['name'][$i];
        $ext  = pathinfo($imageName, PATHINFO_EXTENSION);
        $imageName = uniqid().'.'.$ext;
        $imageTempName = $_FILES['image']['tmp_name'][$i];
        $targetPath = "../upload/".$imageName;
        if(move_uploaded_file($imageTempName, $targetPath)){
            $sql = "INSERT INTO images( p_id,portfolio_id,image) VALUES('$pid','$portfolio_i','$imageName')";
            $result = mysqli_query($conn,$sql);
        }
    }
    if($result){
        header('location:index.php?msg=ins');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>CamLens</title>
</head>
<body>
<div class="container">
        <div class="row mt-5">
            <table class="table ">
                <tbody>
                    <tr>
                        <th><a href="index.php">Gallery</a></th>
                        <th><a href="portfolio.php">Portfolio</a></th>
                        <th><a href="videos.php">Videos</a></th>
                        <th><a href="youtube.php">Youtube</a></th>
                    </tr>
                       
                </tbody>
            </table>
        </div>
</div>


    <?php
        if(isset($_GET['msg']) AND $_GET['msg'] == 'ins'){
            echo 'Uploaded success';
        }
    ?>
   <div class="container">
        <div class="row">
            <form class="row g-3 col-lg-10" action="index.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <select id="inputState" name="portfolio_id" class="form-select">   
                            <?php 
                                $sql = "SELECT * FROM portfolio";
                                $result = mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($result)>0){
                                        while($fetch = mysqli_fetch_assoc($result)){
                            ?>
                        <option value="<?php echo $fetch['name'];?>"><?php echo $fetch['name'];?></option>
                    <?php
                                }
                            }
                            ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">File</label>
                    <input type="file" name="image[]" class="form-control" multiple id=""><br>
                </div>
                <div class="col-md-6">
                    <button type="submit" name="submit" value="upload" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <table class="table ">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <?php 
                                    $sql = "SELECT * FROM images ORDER BY portfolio_id";
                                    $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($fetch = mysqli_fetch_assoc($result)){
                            ?>
                        <td> <h3><?php echo $fetch['portfolio_id']?></h3></td>
                        <td> <img src="../upload/<?php echo $fetch['image'];?>" width="100" height="100"></td>  
                    </tr>
                        <?php
                                }
                            }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>