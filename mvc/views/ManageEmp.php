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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/app.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .show_quantity_item{
            margin-top: -5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2a2928;">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto fontSize">
                    <li class="nav-item active mr-4 selectedMenu">
                        <a class="nav-link" href="./home">Back To Home<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 menu-right">
                <h1 style="color: blue;">Show Employee</h1> 
                <div class="search">
                    <div class="search_name">
                        <h6>Chức năng tìm nhân viên theo tên chi nhánh:</h6>
                        <form class="form-inline mt-4" id="inputName" method="GET">
                            <p>Mời nhập tên: </p>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputName" class="sr-only">Quantity</label>
                                <input type="text" class="form-control">
                            </div>
                            <button class="btn btn-primary mb-2" id="inputNameSubmit">Submit</button>
                        </form>
                    </div>
                    <div class="search_function">
                        <h6>Chức năng tìm nhân viên có số ca làm việc không ít hơn một số chỉ định:</h6>
                        <form class="form-inline mt-4" id="inputQuantity" method="GET">
                            <p>Mời nhập số ca làm việc cần tìm: </p>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputQuantity" class="sr-only">Quantity</label>
                                <input type="text" class="form-control">
                            </div>
                            <button class="btn btn-primary mb-2" id="inputQuantitySubmit">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="admin_detail">
                    <div class="admin_detail_title">
                        Quản lý nhân viên
                    </div>
                    <div class="admin_detail_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Bdate</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Eaccount</th>
                                    <th scope="col">Bnumber</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- item -->
                                <?php foreach($data as $value): ?>
                                    <tr data-id="<?=$value['ID']?>">
                                        <td class="Name_Product_value"><?=$value['ID']?></td>
                                        <td class="Type_Product_value"><?=$value['Name']?></td>
                                        <td class="Price_Product_value"><?=$value['Email']?></td>
                                        <td class="Quantity_Product_value"><?=$value['Phone']?></td>
                                        <td class="Rating_Product_value"><?=$value['Bdate']?></td>
                                        <td class="Rating_Product_value"><?=$value['Sex']?></td>
                                        <td class="Rating_Product_value"><?=$value['Address']?></td>
                                        <td class="Rating_Product_value"><?=$value['Salary']?></td>
                                        <td class="Rating_Product_value"><?=$value['Eaccount']?></td>
                                        <td class="Rating_Product_value"><?=$value['Bnumber']?></td>
                                        <td>
                                            <!-- <i class="bi bi-plus-circle-fill detail-product" data-id="<?=$value['Number']?>"></i> -->
                                            <i class="bi bi-gear-fill edit-product" data-id="<?=$value['ID']?>--<?=$value['Name']?>--<?=$value['Email']?>--<?=$value['Phone']?>--<?=$value['Bdate']?>--<?=$value['Sex']?>--<?=$value['Address']?>--<?=$value['Salary']?>--<?=$value['Eaccount']?>--<?=$value['Bnumber']?>" data-toggle="modal" data-target="#exampleModalScrollable"></i>
                                            <i class="bi bi-x-circle-fill delete-product" data-toggle="modal" data-target="#exampleModal" data-id="<?=$value['ID']?>"></i>
                                        </td>
                                    </tr>

                                    
                                <?php endforeach; ?>

                              
                            </tbody>
                        </table>
                        <div class="show_quantity">
                            <div class="show_quantity_item">
                                <button type="button" id="button_add" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">Thêm nhân viên</button>
                                <a href="Home/viewEmployeeAll" class="btn btn-primary" >Hiển thị tất cả</a>
                            </div>
                            <div class="show_quantity_page">
                                <!-- <nav aria-label="...">
                                    <ul class="pagination">
                                      <li class="page-item ">
                                        <a class="page-link" href="manage/viewProductPage/<?=$page - 1?>" tabindex="-1">Prev</a>
                                      </li>
                                      <li class="page-item active">
                                        <a class="page-link" href="manage/viewProductPage/<?=$page?>">Brand <?=$page?></a>
                                      </li>
                                      <li class="page-item">
                                        <a class="page-link" href="manage/viewProductPage/<?=$page + 1?>">Next</a>
                                      </li>
                                    </ul>
                                  </nav> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="footer">
            <div class="useful-link">
                <h3>Get To Know Us</h3>
                <div><a href="#">Facebook</a></div>
                <div><a href="#">Instagram</a></div>
                <div><a href="#">Twitter</a></div>
                <div><a href="#">Youtube</a></div>          
            </div>
            <div class="useful-link">
                <h3>Let Us Help You</h3>
                <div><a href="#">Shipping Rates & Policies</a></div>
                <div><a href="#">Returns & Replacements</a></div>
                <div><a href="#">Manage Your Content and Devices</a></div>
                <div><a href="#">Help</a></div>
            </div>
            <div class="useful-link">
                <h3>Make Money With Us</h3>
                <div><a href="#">Sell products on RedStore</a></div>
                <div><a href="#">Sell on RedStore Business</a></div>
                <div><a href="#">Advertise Your Products</a></div>
                <div><a href="#">Self-Publish with Us</a></div>
            </div>
            
    </div>
        <!-- DELETE Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="delete-confirm">Delete</button>
            </div>
            </div>
        </div>
        </div>

        <!-- EDIT MODAL -->
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">User Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_event" method="POST" class="was-validated">
                    <div class="form-group">
                        <label for="ID_Employee">ID</label>
                        <input type="text" class="form-control" id="ID_Employee" name="ID_Employee" required>
                    </div>
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" id="Email" name="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control" id="Phone" name="Phone" required>
                    </div>
                    <div class="form-group">
                        <label for="Bdate">Bdate</label>
                        <input type="text" class="form-control" id="Bdate" name="Bdate" required>
                    </div>

                    <div class="form-group">
                        <label for="Sex">Sex</label>
                        <input type="text" class="form-control" id="Sex" name="Sex" required>
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" required>
                    </div>
                    <div class="form-group">
                        <label for="Salary">Salary</label>
                        <input type="text" class="form-control" id="Salary" name="Salary" required>
                    </div>
                    <div class="form-group">
                        <label for="Eaccount">Account</label>
                        <input type="text" class="form-control" id="Eaccount" name="Eaccount" required>
                    </div>
                    <div class="form-group">
                        <label for="Bnumber">Bnumber</label>
                        <input type="text" class="form-control" id="Bnumber" name="Bnumber" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="button_form_event">Save changes</button>
            </div>
            </div>
        </div>
        </div>

    <form method="POST" id="form_delete"></form>
    <script>
        //show detail
    document.addEventListener('DOMContentLoaded', (event) => {
        var getRows = Array.from(document.querySelectorAll('.detail-product'));
        getRows.forEach(ele => {
            ele.addEventListener('click', () => {
                var dataId = ele.getAttribute('data-id');
                var eleHidden = document.getElementById(dataId);
                eleHidden.classList.toggle('hidden_modal');
            })
        })
        // delete event
        var ID;
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            ID = button.data('id');
        })
        
        var getEditRow = Array.from(document.querySelectorAll('#delete-confirm'));
        getEditRow.forEach(ele => {
            ele.addEventListener('click', () => {
                var form_delete = document.getElementById('form_delete');
                form_delete.action = `Home/deleteEmployee/${ID}`;
                form_delete.submit();
            })
        })

        //Edit & add event
        $('#exampleModalScrollable').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            productId = button.data('id');
        })
        var arr_value;
        var getRowsEdit = Array.from(document.querySelectorAll('.edit-product'));
        getRowsEdit.forEach(ele => {
            ele.addEventListener('click', () => {
                var dataId = ele.getAttribute('data-id');
                arr_value = dataId.split('--');
                document.getElementById('ID_Employee').value = arr_value[0];
                document.getElementById('Name').value = arr_value[1];
                document.getElementById('Email').value = arr_value[2];
                document.getElementById('Phone').value = arr_value[3];
                document.getElementById('Bdate').value = arr_value[4];
                document.getElementById('Sex').value = arr_value[5];
                document.getElementById('Address').value = arr_value[6];
                document.getElementById('Salary').value = arr_value[7];
                document.getElementById('Eaccount').value = arr_value[8];
                document.getElementById('Bnumber').value = arr_value[9];
            })
        })
        document.getElementById('button_add').addEventListener('click',()=>{
                document.getElementById('ID_Employee').value = '';
                document.getElementById('Name').value = '';
                document.getElementById('Email').value = '';
                document.getElementById('Phone').value = '';
                document.getElementById('Bdate').value = '';
                document.getElementById('Sex').value = '';
                document.getElementById('Address').value = '';
                document.getElementById('Salary').value = '';
                document.getElementById('Eaccount').value = '';
                document.getElementById('Bnumber').value = '';
        })
        document.getElementById('button_form_event').addEventListener('click', () => {
            var form_event = document.getElementById('form_event');
            if(arr_value) form_event.action = `Home/editEmployee/1}`;
            else form_event.action = `Home/editEmployee/-1`
            if(document.getElementById('Name').value&&document.getElementById('Email').value&&document.getElementById('Phone')&&document.getElementById('Bdate').value&&document.getElementById('Sex').value&&document.getElementById('Address').value&&document.getElementById('Salary').value&&document.getElementById('Bnumber').value)
                form_event.submit();
        })

        // search quantity
        document.getElementById('inputQuantitySubmit').addEventListener('click', () => {
            var input = document.querySelector('#inputQuantity input').value;
            if(input){
                document.getElementById('inputQuantity').action = `Home/viewShift/${input}`;
                document.getElementById('inputQuantity').submit();
            }else{
                alert('Mời nhập số lượng')
            }
        })
        // search name
        document.getElementById('inputNameSubmit').addEventListener('click', () => {
            var input = document.querySelector('#inputName input').value;
            if(input){
                document.getElementById('inputName').action = `Home/viewEmployee/${input}`;
                document.getElementById('inputName').submit();
            }else{
                alert('Mời nhập tên')
            }
        })

        

    });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
