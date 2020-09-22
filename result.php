<?php
    session_start();
    if(isset($_SESSION['attempt'])){
        echo '
        <h1>You got ' . $_SESSION['score'] . ' right out of '. $_SESSION['attempt'] . ' tweets</h1>';
        session_unset();
        session_destroy();
    } else{
        echo '<h1>Please play the game first!</h1>';
        
    }
    

?>