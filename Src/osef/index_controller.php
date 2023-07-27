<?php

// Include the model
require_once('index_model.php');
// Check if class exists
if (!class_exists('index_model')) 
    echo 'model doesn\'t exist</br>';
else
    echo 'model exist</br>';
// Get the id from model
$ids[] = index_model::get_id(3);
// Output the view
include('index_view.php');

?>

