<?php
######configuration######
$store_folder=$_POST['dir_path'];
$input=$_POST['inputID'];
#########################

if(isset($_POST))
{
    //check $_FILES['DOC'] NOT EMPTY
    if(!isset($_FILES))
    {
        die('File is missing!');
    }

    //if the same file name exist, then...

    //if no file with the same name, then  ...

    //upload file info
    $fname=$_FILES[$input]['name'];
    $ftemp=$_FILES[$input]['tmp_name'];
    $ftype=$_FILES[$input]['type'];
    $fsize=$_FILES[$input]['size'];

    if ($ftype=='image/jpeg' || $ftype=='image/png')
    {
        if ($fsize>10000000) die("The size of the file you are trying to upload is too high");

        move_uploaded_file($ftemp,$store_folder.$fname);
        {
            echo "Uploaded File :".$_FILES[$input]["name"];
        }
    }else
    {
        echo "file type should be in JPG/PNG type";
    }
}


?>
