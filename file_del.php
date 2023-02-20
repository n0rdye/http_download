<form method="post">
    <input type="text" name="pass" id="pass">
    <input type="submit" value="submit">
</form>
<?php
if($_POST["pass"]=="pass"){
    // $file = $_GET["ftd"];
    $file = "../asd/widget.py";
    echo $file;
    $deletefile=unlink($file);    
    if($deletefile){  
        echo "File deleted.";    
        header("Location: index.php");
        die();
    }
}
?> 