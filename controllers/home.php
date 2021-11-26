<?php

use function PHPSTORM_META\type;

class demo extends controller{

    public function view(){
        $demoData = $this->model('employee')->getDemo();
        $this->view("demo", [
            "demoData" => $demoData
        ]);
    }
}
?>