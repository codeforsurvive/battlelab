<?php

/**
 * Description of post
 *
 * @author Rohmad
 */
$post = new Post();
$post->construct();

if (FormValidator::validate(array($post->TITLE, $post->CONTENT_FORM)))
{
    $id = (!isset($_GET['id'])) ? 0 : $_GET['id'];
    $now = date('Y/m/d');
    $post->setAttributes(
            array
                (
                $post->ID              => $id,
                $post->TITLE           => $_POST[$post->TITLE],
                $post->CONTENT         => $_POST[$post->CONTENT_FORM],
                $post->DATE            => $now,
                $post->AUTHOR_ID       => $_SESSION[CommonVariabels::$CURRENT_USER],
                $post->HITS            => 0
            )
    );
    if ($id == 0)
        $post->insert();
    else
        $post->save($id);
    if ($post->getStatus())
    {
        $message = 'Penambahan/perubahan data berhasil';
        $links = array('?module=view');
        $icons = array(CommonVariabels::$HOME_ICON);
        $texts = array('Kembali ke daftar post aktif');
        $class = 'succeed';
        echo '<div class="separator"></div>';
        include '../ui/notification.php';
    }
    else
    {
        $message = 'Penambahan/perubahan data gagal';
        $links = array('?module=view');
        $icons = array(CommonVariabels::$HOME_ICON);
        $texts = array('Kembali ke daftar post aktif');
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
    $texts = array('Kembali ke daftar post aktif');
    $class = 'failed';
    echo '<div class="separator"></div>';
    include '../ui/notification.php';
}
?>
