<?php
session_start();
unset($_SESSION['cbt_session']);
if(!isset($_SESSION['cbt_session'])){
    echo 'Session cleared';
}
unset($_SESSION['vret_session']);
if(!isset($_SESSION['vret_session'])){
    echo 'VRET session cleared';
}

?>