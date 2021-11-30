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
                        <a class="nav-link" href="./index">Back To Home<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 menu-right">
                <h1 style="color: blue;">Danh sách đơn hàng món ăn</h1> 
                <div class="search">
                    <div class="search_name">
                        <h6>Nhập món ăn để tìm hóa đơn</h6>
                        <form class="form-inline mt-4" id="inputName" method="GET">
                            <p>Mời nhập tên: </p>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputName" class="sr-only">Quantity</label>
                                <input type="text" class="form-control">
                            </div>
                            <button class="btn btn-primary mb-2" id="inputNameSubmit">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="admin_detail">
                    <div class="admin_detail_title">
                        Danh sách đơn hàng  
                    </div>
                    <div class="admin_detail_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Tên món ăn</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- item -->
                                <?php foreach($data as $value): ?>
                                    <tr data-id="<?=$value['Onum']?>">
                                        <td class="Name_Product_value"><?=$value['Onum']?></td>
                                        <td class="Type_Product_value"><?=$value['Dname']?></td>
                                        <td class="Price_Product_value"><?=$value['Ord_quantity']?></td>
                                        <td class="Quantity_Product_value"><?=$value['Listed_price']?></td>
                                        <td class="Rating_Product_value"><?=$value['Status']?></td>
                                        <td>
                                            <!-- <i class="bi bi-plus-circle-fill detail-product" data-id="<?=$value['Number']?>"></i> -->
                                            <!-- <i class="bi bi-gear-fill edit-product" data-id="<?=$value['Onum']?>--<?=$value['Dname']?>--<?=$value['Ord_quantity']?>--<?=$value['Listed_price']?>--<?=$value['Status']?>" data-toggle="modal" data-target="#exampleModalScrollable"></i> -->
                                            <i class="bi bi-x-circle-fill delete-product" data-toggle="modal" data-target="#exampleModal" data-id="<?=$value['Number']?>"></i>
                                        </td>
                                    </tr>

                                    <tr class="hidden_modal" id="<?=$value['Number']?>">
                                        <td colspan="8">
                                            <div class="table_payment">
                                                <div class="table_payment_title">Name</div>
                                            </div>
                                            <div class="table_payment_detail">
                                                <p><?=$value['product_name']?></p>
                                            </div>
                                            <div class="table_payment">
                                                <div class="table_payment_title">Description</div>
                                            </div>
                                            <div class="table_payment_detail">
                                                <p><?=$value['product_detail']?></p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                        <div class="show_quantity">
                            <div class="show_quantity_item">
                                <!-- <button type="button" id="button_add" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">ADD BRANCH</button> -->
                                <a href="order/viewBranchAll" class="btn btn-primary" >Toàn bộ đơn hàng</a>
                            </div>
                            <div class="show_quantity_page">
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
                        <label for="Number">Mã đơn hàng</label>
                        <input type="text" class="form-control" id="Number" name="Number" required>
                    </div>
                    <div class="form-group">
                        <label for="Name">Tên món ăn</label>
                        <input type="text" class="form-control" id="Name" name="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="Quantity">Số lượng</label>
                        <input type="text" class="form-control" id="Quantity" name="Quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="Price">Thành tiền</label>
                        <input type="text" class="form-control" id="Price" name="Price" required>
                    </div>
                    <div class="form-group">
                        <label for="Status">Trạng thái</label>
                        <input type="text" class="form-control" id="Status" name="Status" required>
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
                form_delete.action = `order/deleteBranch/${ID}`;
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
                document.getElementById('Number').value = arr_value[0];
                document.getElementById('Name').value = arr_value[1];
                document.getElementById('Quantity').value = arr_value[2];
                document.getElementById('Price').value = arr_value[3];
                document.getElementById('Status').value = arr_value[4];
            })
        })
        // document.getElementById('button_add').addEventListener('click',()=>{
        //         document.getElementById('Number').value = '';
        //         document.getElementById('Name').value = '';
        //         document.getElementById('Quantity').value = '';
        //         document.getElementById('Price').value = '';
        //         document.getElementById('Status').value = '';
        // })
        document.getElementById('button_form_event').addEventListener('click', () => {
            var form_event = document.getElementById('form_event');
            if(arr_value) form_event.action = `order/editBranch/${arr_value[0]}`;
            else form_event.action = `order/editBranch/-1`
            if(document.getElementById('Name').value&&document.getElementById('Quantity').value&&document.getElementById('Price')&&document.getElementById('Status').value)
                form_event.submit();
        })

        // search quantity
        // document.getElementById('inputQuantitySubmit').addEventListener('click', () => {
        //     var input = document.querySelector('#inputQuantity input').value;
        //     if(input){
        //         document.getElementById('inputQuantity').action = `manage/viewBranch/${input}`;
        //         document.getElementById('inputQuantity').submit();
        //     }else{
        //         alert('Mời nhập số lượng')
        //     }
        // })
        // search name
        document.getElementById('inputNameSubmit').addEventListener('click', () => {
            var input = document.querySelector('#inputName input').value;
            if(input){
                document.getElementById('inputName').action = `order/viewBranchName/${input}`;
                document.getElementById('inputName').submit();
            }else{
                alert('Mời nhập tên món ăn')
            }
        })

        

    });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>