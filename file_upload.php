<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method="post" enctype="multipart/form-data" >
        <input type="file" name="file[]" multiple id="file"/>
        <input type="submit" name="ok"  />
        </form> 
        <?php
            $destination_path = "/var/www/html/".DIRECTORY_SEPARATOR;
            if(isset($_POST['ok'])){
                // echo $_FILES;
                // var_dump($_FILES);
                $fileCount = count($_FILES["file"]["name"]);
                // echo $fileCount;
                for ($i=0; $i < $fileCount; $i++) { 
                    $name = $_FILES["file"]["name"][$i];
                    $file = $_FILES["file"]["tmp_name"][$i];
                    // echo $name."  ".$file."<br>";
                    $result = 0;
                    $target_path = $destination_path . basename( $name);
                    if(@move_uploaded_file($file, $target_path)) {
                        $result = 1;
                    }
                    sleep(1);
                }
            }
        ?>
</body>
</html>
