<?php

require_once "../functions.php" ;
initSession();
if(($_SESSION['login'])){
    endSession();
}
    header("Location: ../../index.php");
?>