<?php

class My_View
{
    public $data;
    public $view;

    public function __set($property,$value)
{
$data[$preperty] = $value;
}

public function __get($property)
{
return $data[$preperty];
}


    public function loadView()
    {
    ob_start();
    include('my_view.phtml');
    $this->view = $ob_get_clean();

    }

public function __toString()
{
return $this->view;
}

}

?>