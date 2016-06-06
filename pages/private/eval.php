<?php
if(isset($_GET['name'])) {
    $eval = $_GET['name'];
}
require ROOT . '/pages/private/eval/' . $eval . '.php';
