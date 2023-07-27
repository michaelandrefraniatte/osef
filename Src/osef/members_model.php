<?php
    class members_model {

        //Function to get all the posts made by a particular member
        public function get_posts($member_id) {
            $query = mysql_query("
                SELECT *
                FROM Posts
                WHERE author = ".$member_id
            );
            return mysql_fetch_array($query);
        }

    }
?>