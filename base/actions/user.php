<?php

/**
 * Description of user
 *
 * @author Rohmad
 */
$user = new User();
$user->construct();

if (FormValidator::validate(array($user->USERNAME, $user->PASSWORD)))
{
    $id = (!isset($_GET['id'])) ? 0 : $_GET['id'];
    $profile_picture = CommonVariabels::$DEFAULT_USER_ICON;
    if (FormValidator::validate(array($user->PROFILE_PICTURE), 'FILES'))
    {
        $uploader = new FileUploader();
        $uploader->prepare($_FILES[$user->PROFILE_PICTURE], '../uploads/user');
        if ($uploader->upload())
        {
            $profile_picture = $uploader->getPath();
        }
    }
    $user->setAttributes(
            array
                (
                $user->ID              => $id,
                $user->USERNAME        => $_POST[$user->USERNAME],
                $user->PASSWORD        => md5($_POST[$user->PASSWORD]),
                $user->NAME            => FormValidator::setDefault($user->NAME),
                $user->ADDRESS         => FormValidator::setDefault($user->ADDRESS),
                $user->PHONE           => FormValidator::setDefault($user->PHONE),
                $user->EMAIL           => FormValidator::setDefault($user->EMAIL),
                $user->WEBSTITE        => FormValidator::setDefault($user->WEBSITE),
                $user->PROFILE_PICTURE => $profile_picture
            )
    );
    if ($id == 0)
        $user->insert();
    else
        $user->save($id);
    if ($user->getStatus())
    {
        $message = 'Penambahan/perubahan data berhasil';
        $links = array('?module=view');
        $icons = array(CommonVariabels::$HOME_ICON);
        $texts = array('Kembali ke daftar user aktif');
        $class = 'succeed';
        echo '<div class="separator"></div>';
        include '../ui/notification.php';
    }
    else
    {
        $message = 'Penambahan/perubahan data gagal';
        $links = array('?module=view');
        $icons = array(CommonVariabels::$HOME_ICON);
        $texts = array('Kembali ke daftar user aktif');
        $class = 'failed';
        echo '<div class="separator"></div>';
        include '../ui/notification.php';
    }
}
else
{
    $message = 'Form yang anda kirim tidak valid';
    $links = array('?module=view');
    $icons = array(CommonVariabels::$BACK_ICON);
    $texts = array('Kembali ke daftar user aktif');
    $class = 'failed';
    echo '<div class="separator"></div>';
    include '../ui/notification.php';
}
?>

