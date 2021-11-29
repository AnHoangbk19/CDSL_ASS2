<?php
require_once "./mvc/core/basehref.php";
$home_url = getUrl().'/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
            echo "<base href='${home_url}'>";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action"><h1>Thành Viên Nhóm</h1></a>

        
        <a href="manage/viewBranchAll" class="list-group-item list-group-item-action list-group-item-primary">Nguyễn Minh Bảo</a>
        <a href="dish.php" class="list-group-item list-group-item-action list-group-item-secondary">Phạm Ngọc Tân</a>
        <a href="home/viewEmployeeAll" class="list-group-item list-group-item-action list-group-item-success">Phạm Đại Hoàng An</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-danger">#</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-warning">#</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-info">#</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>