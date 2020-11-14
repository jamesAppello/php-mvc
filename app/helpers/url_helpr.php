<?php
    // url redirect function to be consistent with D.R.Y.
    function redirect($page) {
        header('location: '. URLROOT . '/' . $page);
    }
    
?>