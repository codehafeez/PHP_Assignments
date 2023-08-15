<?php
    session_start();
    session_destroy();
    
    //Reset OAuth access token
    // $gClient->revokeToken();

    header('Location: ../index.php'); 
?>
