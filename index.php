<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once '_views/private.php';
} else {
    include_once '_views/login.php';
}
?>