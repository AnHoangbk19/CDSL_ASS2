<?php
    session_start();
    $url = $_SERVER['REQUEST_URI'];
    require_once('mvc/controllers/dish-controller.php');
    $DishController = new DishController();

    $output = "";

    if (strpos($url,'ctrl=') == true){  
        $ctrl = $_GET['ctrl'];
        switch ($ctrl) {
            case 'dish':
                
                if (strpos($url,'act=') == true)
                    $output = $DishController->Edit($ctrl, $_GET['act']);
                else
                    $output = $DishController->View($ctrl);
                 
                break;

            case 'filter':
            
                $output = $DishController->View($ctrl);
                    
                break;

            case 'available':
        
                $output = $DishController->View($ctrl);
                    
                break;
        }
    }    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    
    <link rel="shortcut icon" type="image/x-icon" href="./images/logo.svg" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />    
    <link type="text/css" rel="stylesheet" href="assets/css/dish.css" />
    <link rel="stylesheet" href="./assets/css/scrollbar.css" />    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>DISH</title>
</head>

<body>

    <div class="admin">

        <nav class="navbar navbar-expand admin-nav">

            <ul class="navbar-nav admin-manage-list">

                <li class="admin-manage-item nav-item dropdown">
                    <a class="admin-manage-item_btn nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown">Dish Table</a>
                    <ul class="admin-manage-item_list dropdown-menu">
                        <li><a href="dish.php?ctrl=dish">Show Dish</a></li>
                        <li><a href="dish.php?ctrl=dish&act=insert">Insert Dish</a></li>
                    </ul>
                </li>

                <li class="admin-manage-item nav-item dropdown">
                    <a class="admin-manage-item_btn nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown">Dish Price Filter</a>
                    <ul class="admin-manage-item_list dropdown-menu">
                        <li><a href="dish.php?ctrl=filter">Call Procedure</a></li>
                    </ul>
                </li>

                <li class="admin-manage-item nav-item dropdown">
                    <a class="admin-manage-item_btn nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown">Available Dish</a>
                    <ul class="admin-manage-item_list dropdown-menu">
                        <li><a href="dish.php?ctrl=available">Call Procedure</a></li>
                    </ul>
                </li>                

            </ul>
        </nav>

        <div class="container content-container">
            <div id="mess"></div>
                      
            <?php
                echo $output;
            ?>
        </div>
    </div>
</body>

</html>