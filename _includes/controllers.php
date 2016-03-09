<?php if(!empty($_GET['control'])){
    if(is_file('_controllers/'.$_GET['control'].'.php')){
        include('_controllers/'.$_GET['control'].'.php');
    }
}
else{
    include('_controllers/???.php');
} ?>
