<?php
if(isset($_GET['name'])) {
    $form = $_GET['name'];
}
require ROOT . '/pages/private/form/' . $form . '.php';
