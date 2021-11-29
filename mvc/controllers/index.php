<?php
require_once "./mvc/core/basehref.php";
use function PHPSTORM_META\type;

class index extends controller{
    public function viewAll(){
        $this->view("indexView",[
            "data" => []
        ]);
    }
}
?>