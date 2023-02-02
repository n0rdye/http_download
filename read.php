<?php
    $current_dir = '../';
    $dir = opendir($current_dir);
    while($file = readdir($dir))
    {
        echo $file,"|";
    }
    closedir($dir);



    // $ftp_server = "192.168.0.7";
    // $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
    // $login = ftp_login($ftp_conn, "ftp", "484");

    // // get file list of current directory
    // $file_list = ftp_nlist($ftp_conn, ".");
    // // var_dump($file_list);
    // foreach ($file_list as $value) {
    //     echo $value,"|";
    // }

    // // close connection
    // ftp_close($ftp_conn);
?>
