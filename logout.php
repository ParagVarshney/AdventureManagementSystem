
<?php
{
    session_start();
    session_destroy();
  
    header("Cache-Control", "no-cache, no-store, must-revalidate");
    
    // header("location:home.php");
    echo '<script>window.close();</script>';



   
   

}
?>
	



