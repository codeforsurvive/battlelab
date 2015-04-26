<?php

/**
 * Description of post
 *
 * @author Rohmad
 */
include '../templates/header.php';
include_once '../models/Post.class.php';
include_once '../tools/FileUploader.class.php';
include_once '../tools/TextField.class.php';
include_once '../tools/CommonVariabels.php';

$page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
$limit = 5;
$module = (!isset($_GET['module'])) ? 'view' : $_GET['module'];
$id = (!isset($_GET['id'])) ? 0 : $_GET['id'];
if ($_SESSION[CommonVariabels::$PREVILEGE] == CommonVariabels::$ADMIN || $_SESSION[CommonVariabels::$PREVILEGE] == CommonVariabels::$USER)
{
    $post = new Post();
    $post->construct();
    if ($module == 'view')
    {
        include '../listings/post.php';
        echo '<div class="separator"></div>';
        echo Paginator::paginate($post->getTotalData(), $limit, $page, '?module=view&');
        include '../forms/post.php';
    }
    else if ($module == 'edit')
    {
        include '../forms/post.php';
    }
    else if ($module == 'execute')
    {
        include '../actions/post.php';
    }
}
else
{
    $message = 'Anda tidak memiliki hak akses ke halaman ini';
    $links = array('../index.php');
    $icons = array(CommonVariabels::$HOME_ICON);
    $texts = array('Kembali ke halaman utama');
    $class = 'failed';
    echo '<div class="separator"></div>';
    include '../ui/notification.php';
}
include '../templates/footer.php';
?>