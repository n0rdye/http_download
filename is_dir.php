<?php
$path = $_GET["p"];
if(is_dir($path)){
    echo $path;
}
?>