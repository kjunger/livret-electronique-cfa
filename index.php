<?php
if (isset($_GET['private'])) {
    include_once '_views/private.php';
} else {
    include_once '_views/login.php';
}
?>