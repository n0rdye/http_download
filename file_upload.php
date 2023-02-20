<style>
        #file{
            display:none;
        }
        #label{
            cursor:pointer;
            padding-inline:10px;
            padding-block:5px;
            border:1px black solid;
            /* margin:5px;
            margin-inline:5px; */
        }
        #label:hover{
            background-color:gray;
        }
    </style>
        <form id="form" method="POST" enctype="multipart/form-data">
        <label id="label" for="file">select file</label>
        <input id="file" type="file" name="file[]" multiple onchange="form.submit()">
        <input id="dirr" type="hidden" name="dir" value="../"></input>
        <!-- <iframe name="output_frame" src="" id="output_frame" width="0" height="0"></iframe>   -->
        </form> 
        <script>
            document.getElementById("file").onchange = () => {
                document.getElementById("dirr").value =  localStorage.getItem("files/dir?/");
                document.getElementById("label").innerHTML =  "loading";
                document.getElementById("form").submit();
            };
        </script>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $dir = $_POST["dir"];
                if($dir!=null){
                    $dir = str_replace("../", "", $dir); 
                    $destination_path = ("/var/www/html/".$dir).DIRECTORY_SEPARATOR;
                    // echo $destination_path;
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
            }
        ?>