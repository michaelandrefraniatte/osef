<?php
    //Assuming that the database has already been connected

    //Include the model
    require('members_model.php');
    //Get the posts made by a particular user from the database)
    $posts = $this->members_model->get_posts($_POST['member_id']);
    //Output the view
    require('members_view.php');
?>