<!-- product-view.php sẽ render ra phần lõi nội dung, frontend sẽ sửa thêm phần này -->

<?php

class DishView{

    public function showOneDish($dish){
        echo $dish['Name'];
        echo '<br>';
        echo $dish['Price'];
        echo '<br>';
    }

    public function showAllDishes_adminpage($dishes){
        $output = "";
        /*$output .= '<h1 class="admin-view-product">Dish Table <i class="far fa-eye"></i></h1>
                      <table>
                        <tr>
                          <th>NAME</th>
                          <th>PRICE</th>
                          <th>OPERATION</th>
                        </tr>';
        foreach ($dishes as $dish):
            $output .= '<tr>
                          <td class="admin-product-ID">' . $dish['Name'] . '</td>
                          <td class="admin-product-price">'. $dish['Price'] .'</td>
                          <td>
                                  <form method="post" class="admin-product-btn-group"> 
                                      <button name="updateDish" type="submit" value="' . $dish['Name'] . '">UPDATE</button>
                                      <button name="deleteDish" type="submit" value="' . $dish['Name'] . '">DELETE</button>
                                  </form>
                                </td>
                        </tr>';
        endforeach;
        $output .=    '</table>';*/

        $item = 1;
        $output .= '<div class="row top-content">
        <h1 class="admin-view-product col-4">Dishes <i class="far fa-eye"></i></h1>

        <div class="organic-filter-search col-8 d-flex">
            <h2 class="organic-filter-search_heading text-left">Search Dish</h2>
            <form class="organic-filter-search_form d-flex" method="post">
                <input class="organic-filter-search_input" type="text" placeholder="Search Here" name="search">
                <button class="organic-filter-search_btn" type="submit">
                  <i class="material-icons">search</i>
                </button>
            </form>
        </div>
        </div>

                    <div class="organic-items row">';
        foreach ($dishes as $dish):
            $output .= '<div class="col-xl-4 col-sm-6 col-12 organic-item-col">
                          <div class="organic-card">
                            <div class="organic-item">

                              <div class="organic-item-front">
                                <img class="organic-item-front_img" src="'. $dish['Image_Link'] .'" alt="Product image" style="width: 100%" />
                                <div class="organic-item-front_text">
                                  <p class="organic-item-front_name">'. $dish['Name'] .'</p>
                                  <p class="organic-item-front_price">'. (int)$dish['Price']/1000 . '.000đ</p>
                                </div>
                              </div>

                              <div class="organic-item-back" style="background-image: url('. $dish["Image_Link"] .');">
                                <div class="organic-item-back_overlay">

                                  <div class="organic-item-back_text">
                                    <a class="organic-item-back_name" href="#">'. $dish['Name'] .'</a>
                                    <p class="organic-item-back_price">'. (int)$dish['Price']/1000 . '.000đ</p>
                                  </div>
                                  
                                  <div class="organic-item-add_to_cart justify-content-center">
                                    <form method="post">
                                      <button name="updateDish" type="submit" value="' . $dish['Name'] . '">UPDATE</button>
                                      <button name="deleteDish" type="submit" value="' . $dish['Name'] . '">DELETE</button>
                                    </form>
                                  </div>

                                </div>
                              </div>

                            </div>
                          </div>
                        </div>';
            $item++;
        endforeach;   
        $output .= '</div>';     
        return $output;
    }

    public function showFormDish_adminpage($action){
        $output = "";
        if ($action == "insert")
        {
            $output .= '<h1 class="admin-add-product">Insert Dish <i class="material-icons">library_add</i></h1>
                          <form method="post" action="" class="add-product-form">
                          <div class="add-product-info row">
                            <label for="add-product-name" class="col-3">NAME</label>
                            <input id="add-product-name" class="col-9" name="Name" type="text">
                          </div>

                          <div class="add-product-info row">
                            <label for="add-product-price" class="col-3">PRICE</label>
                            <input id="add-product-price" class="col-9" name="Price" type="number" step="any" min="0">
                          </div>

                          <div class="add-product-info row">
                            <label for="add-product-img" class="col-3">IMAGE LINK</label>
                            <input id="add-product-img" class="col-9" name="Image_Link" type="text">
                          </div>                          

                          <div class="add-product-info row">
                            <button class="offset-3" name="submit" type="submit">SAVE</button>
                          </div>
                        </form>';
        }
        else if ($action == "update")
        {
            $output .= '<h1 class="admin-add-product">Update Dish <i class="fas fa-edit edit-icon"></i></h1>
                        <form method="post" action="" class="add-product-form">

                          <div class="add-product-info row">
                            <label for="add-product-name" class="col-3">NAME</label>
                            <input id="add-product-name" class="col-9" name="Name" type="text" value="'. $_SESSION['Name'] .'">
                          </div>

                          <div class="add-product-info row">
                            <label for="add-product-price" class="col-3">PRICE</label>
                            <input id="add-product-price" class="col-9" name="Price" type="number" step="any" min="0" value="'. $_SESSION['Price'] .'">
                          </div>

                          <div class="add-product-info row">
                            <label for="add-product-img" class="col-3">IMAGE LINK</label>
                            <input id="add-product-img" class="col-9" name="Image_Link" type="text" value="'. $_SESSION['Image_Link'] .'">
                          </div>                          

                          <div class="add-product-info row">
                            <button class="offset-3" name="submit" type="submit">SAVE</button>
                          </div>
                        </form>';
        }
        return $output;
    }

    public function showFormFilter(){
      $check = true;
      $output = "";
      $output .= '<h1 class="admin-add-product">Dish Price Filter <i class="fas fa-filter"></i></h1>
                    <form method="post" action="" class="add-product-form">
                    <div class="add-product-info row">
                      <label for="add-product-name" class="col-4">COMPARED PRICE</label>
                      <input id="add-product-price" class="col-8" name="Compared_Price" type="number" step="1000" min="0">
                    </div>

                    <div class="add-product-info row">
                      <label for="add-product-price" class="col-4">BRANCH NUMBER</label>
                      <input id="add-product-price" class="col-8" name="Branch_Num" type="number" step="1" min="0">
                    </div>

                    <div class="add-product-info row">
                      <button class="offset-4" name="submit" type="submit">VIEW RESULT</button>
                    </div>
                  </form>';
      return $output;
    }

    public function showDishesFilter($dishes){
      $output = "";
      $output .= '<h1 class="admin-view-product">Result <span>(' . count($dishes);
      if (count($dishes) == 0 || count($dishes) == 1) $output .= ' record';
      else $output .= ' records';
      $output .= ')</span></h1>
                    <table>
                      <tr>
                        <th>BRANCH NUMBER</th>
                        <th>DISH IMAGE</th>
                        <th>DISH NAME</th>
                        <th>PRICE</th>
                      </tr>';
      foreach ($dishes as $dish):
          $output .= '<tr>
                        <td class="admin-product-ID">' . $dish['Branch_Num'] . '</td>
                        <td class="admin-product-img">
                          <img src="' . $dish['Image_Link'] . '" alt="Dish Image">
                        </td>
                        <td class="admin-product-price">'. $dish['Dish_Name'] .'</td>
                        <td class="admin-product-price">'. (int)$dish['Price']/1000 . '.000đ</td>

                      </tr>';
      endforeach;
      $output .=    '</table>';
      return $output;
  }    

  public function showInvalidFilter($err){
    if ($err == 0)
      $output = '<div class="alert-filter row">
      <p>This Number of BRANCH does not exist. Please try again!</p>
      </div>';
    
      if ($err == 1)
      $output = '<div class="alert-filter row">
      <p>You must enter Compared Price!</p>
      </div>';   
      
      if ($err == 2)
      $output = '<div class="alert-filter row">
      <p>You must enter Branch Number!</p>
      </div>';    

    return $output;
  }    





  public function showFormAvailable(){
    $output = "";
    $output .= '<h1 class="admin-add-product">Available Dish <i class="far fa-check-circle"></i></h1>
                  <form method="post" action="" class="add-product-form">

                  <div class="add-product-info row">
                    <label for="add-product-price" class="col-4">TOTAL QUANTITY</label>
                    <input id="add-product-price" class="col-8" name="Total_Qty" type="number" step="any" min="0">
                  </div>

                  <div class="add-product-info row">
                    <button class="offset-4" name="submit" type="submit">VIEW RESULT</button>
                  </div>
                </form>';
    return $output;
  }

  public function showDishesAvailable($dishes){
    $output = "";
    $output .= '<h1 class="admin-view-product">Result <i class="far fa-eye"></i></h1>
                  <table>
                    <tr>
                      <th>DISH NAME</th>
                      <th>PRICE</th>
                      <th>NO. OF BRANCHES</th>
                      <th>TOTAL QUANTITY</th>
                    </tr>';
    foreach ($dishes as $dish):
        $output .= '<tr>
                      <td class="admin-product-price">'. $dish['Dish_Name'] .'</td>
                      <td class="admin-product-price">'. (int)$dish['Price']/1000 . '.000đ</td>
                      <td class="admin-product-price">'. $dish['Num_of_Branches'] .'</td>
                      <td class="admin-product-price">'. $dish['Total_Quantity'] .'</td>                      
                    </tr>';
    endforeach;
    $output .=    '</table>';
    return $output;
}    



    public function deleteDish($result) {
      $output = "";
      if ($result == true)
      {
          $output .= '<script>
          var txt;
          txt = "You pressed Cancel!";
          document.getElementById("mess").innerHTML = txt;
                      </script>';
      }
      else
      {
        echo '<div class="mess">Faild!</div>';
      }
      return $output;
    }




    public function confirmPopUp($mess, $Name){
      echo '<script>
      var result = confirm("' . $mess . '");
      var url = window.location.href;  
      if (result){
          url = "dish.php?ctrl=dish&confirm=true&deleteDish='.$Name.'";
          location.href = url;
      }
      else{
          url = "dish.php?ctrl=dish&confirm=false&deleteDish='.$Name.'";
          location.href = url;
      }
      </script>';
    }





    public function alertResultPopUp($ctrl, $result) {
        $output = "";
        if ($result == true)
        {
            $output .= '<script>
                          var result = confirm("Successfully");
                          if (result)
                              location.href = "dish.php?ctrl='. $ctrl .'";
                          else
                              location.href = "dish.php?ctrl='. $ctrl .'";
                        </script>';
        }
        else
        {
            $output .= '<script>
                          alert("Failed");
                        </script>';
        }
        return $output;
    }
}

?>