<?php  
    session_start();  
    echo 'Id user saya adalah' .$_SESSION['logged_in_user_id'];  
    echo '<br/>';
    echo 'Username saya adalah' .$_SESSION['logged_in_user_name'];  
?> 