<?php 
include('connection.php');

if(isset($_POST['submite'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $imagep = $_FILES['image']['name'];
    $target = "../upload/".$imagep;
    move_uploaded_file($_FILES["image"]["tmp_name"],$target);
            $sql = "INSERT INTO portfolio(name,location,image) VALUES('$name','$location','$imagep')";
            $resulte = mysqli_query($conn,$sql);
    }
    if(isset($resulte)){
        header('location:portfolio.php?msg=ins');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">

    <title>Camlens</title>
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
        <form class="row g-3 col-lg-10" action="portfolio.php" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="col-md-6">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" id="">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Location</label>
                <input type="file" name="image" class="form-control" id=""><br>
            </div>
            <div class="col-12">
                <button type="submit" name="submite" class="btn btn-primary">Submit</button>
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
                    <th scope="col">Location</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <?php 
                                    $sql = "SELECT * FROM portfolio ORDER BY name";
                                    $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($fetch = mysqli_fetch_assoc($result)){
                            ?>
                        <td> <h3><?php echo $fetch['name'];?></h3></td>
                        <td> <h3><?php echo $fetch['location'];?></h3></td>
                        <td> <img src="../upload/<?php echo $fetch['image'];?>" width="100" height="100"></td>
                        <td> <a href="delete.php?id=<?php echo $fetch['id']; ?>" class="fa fa-trash"></a> </td>
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