<?php

class My_Controller {
public function __construct()
{
  $view = new My_View();
$view->username = "jason bouren";
$view->loadView();
echo $view;
}
}

?>