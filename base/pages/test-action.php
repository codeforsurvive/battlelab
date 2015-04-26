<?php

/**
 * Description of test-action
 *
 * @author Rohmad
 */
include_once '../tools/TextField.class.php';
include_once '../tools/FormValidator.class.php';
include_once '../tools/FileUploader.class.php';

//print_r($_FILES['filename']);

if(!FormValidator::validate(array('filename'), 'FILES'))
    echo 'Not Okay<br />';
else
{
    $uploader = new FileUploader();
    $data = $_FILES['filename'];
    $uploader->prepare($data, '../uploads/images');
    if($uploader->upload())
        echo 'Ok<br />';
}

?>
