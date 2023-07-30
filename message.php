<?php

if(isset($_SESSION['status']))
{?>
 
    <div class="alert alert-success " role="alert">
    <strong></strong><?= $_SESSION['status'];?>
    </div>
    <?php
    unset($_SESSION['status']);
}
?>