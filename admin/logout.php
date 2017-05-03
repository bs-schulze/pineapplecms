<?php
session_start(); 
unset($_SESSION['user']);

?>
Ausgeloggt.
<script>
 window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "http://localhost/pineapplecms/";

    }, 5000);
</script>
