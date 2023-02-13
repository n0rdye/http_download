<?php
    // $file = basename($_GET['file']);
    // $file = '../'.$file;

    // if(!file_exists($file)){ // file does not exist
    //     die('file not found');
    // } else {
    //     header("Cache-Control: public");
    //     header("Content-Description: File Transfer");
    //     header("Content-Disposition: attachment; filename=$file");
    //     header("Content-Type: application/zip");
    //     header("Content-Transfer-Encoding: binary");

    //     // read the file from disk
    //     readfile($file);
    // }
    $filename = $_GET['file'];
    // Specify file path.

    // $path = '../'; // '/uplods/'
    // $download_file =  $path.$filename; 
    $download_file = $filename;

    if (pathinfo(($download_file), PATHINFO_EXTENSION)){
        if(!empty($filename)){
            // Check file is exists on given path.
            if(file_exists($download_file))
            {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' .basename($filename));  
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($download_file));
                readfile($download_file);
                flush();
                exit;
            }
            else
            {
                // echo 'File does not exists on given path';
            }
        } 
    }
    else if (!pathinfo($download_file, PATHINFO_EXTENSION)){
        
        // $zip = new ZipArchive;
        // if ($zip->open("./.temp/test.zip", ZipArchive::CREATE) === TRUE)
        // {
            //     // Add file to the zip file
            //     $zip->addFile("../a.txt");
            
            //     // All files are added, so close the zip file.
            //     $zip->close();
            // }

            $file_temp = explode ("/",$filename);
            $name = $file_temp[count($file_temp)-1];
            $filename = str_replace("//", "/", $filename); 
            ob_start();
            $zip = new ZipArchive;
            if ($zip->open('./temp/temp.zip', ZipArchive::CREATE) === TRUE){
                function r($zip,$filename,$name){
                    if ($handle = opendir($filename)){
                        while (false !== ($entry = readdir($handle))){
                            if ($entry != "." && $entry != ".." && !is_dir($filename."/" . $entry)){
                                $zip->addFile($filename."/" . $entry ,$name."/".$entry);
                                // echo $name."/_".$entry;
                                // echo "<br>";
                               
                            }
                            else if ($entry != "." && $entry != ".." && is_dir($filename."/" . $entry)){
                                // $zip->addEmptyDir($entry);
                                $arc = $filename."/".$entry;
                                $arc = str_replace("//", "/", $arc); 
                                r($zip,$arc,$name."/".$entry);
                                // echo $arc;
                                // echo $name."/".$entry;
                                // echo "<br>";
                                // r($filename."/".$entry);
                                // $zip->addFile("../".$filename."/" . $entry,$entry);
                            //     $zip->addEmptyDir($entry);
                            //     // $zip->close();
                            }
                        }
                        closedir($handle);
                    }
                }
                r($zip,$filename,$name);
                
                $zip->close();
            }

            // r($filename);
            ob_end_flush();            
            // r($name."/".$entry."/");
            // header("Location:../index.html");
            e();
        }
function e(){
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="archive.zip"');  
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize("./temp/temp.zip"));
    readfile("./temp/temp.zip"); 
    unlink("./temp/temp.zip");
}
?>