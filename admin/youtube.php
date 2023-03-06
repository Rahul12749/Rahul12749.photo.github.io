<?php 
include('connection.php');

if(isset($_POST['submit'])){
    $ylink = $_POST['ylink'];
            $sql = "INSERT INTO youtube(ylink) VALUES('$ylink')";
            $resulte = mysqli_query($conn,$sql);
    }
    if(isset($resulte)){
        header('location:youtube.php?msg=ins');
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
            <form class="row g-3 col-lg-10" action="youtube.php" method="post" enctype="multipart/form-data">
                
                <div class="col-md-6">
                    <label class="form-label">Youtube Link</label>
                    <input type="text" name="ylink" class="form-control" multiple id=""><br>
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
                    <th scope="col">Youtube</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <?php 
                                    $sql = "SELECT * FROM youtube";
                                    $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($fetch = mysqli_fetch_assoc($result)){
                            ?>
                        <td>
                        <?php echo $fetch['ylink'];?>
                        </td>
                        <td><a href="ydelete.php?id=<?php echo $fetch['id']; ?>" class="fa fa-trash"></a></td>
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