<?php
/**
 * Description of post
 *
 * @author Rohmad
 */
$id = (!isset($_GET['id'])) ? 0 : $_GET['id'];
$post = new Post();
$post->construct();
$post->findById($id);

$data = array();
if (count($post->getResultArray()) > 0)
{
    $data = $post->getRowAray();
}
else
{
    $now = date('Y/m/d');
    $data = array
        (
        $post->ID       => 'NULL',
        $post->TITLE => '',
        $post->CONTENT => ''
    );
}
?>
<h2 class="head-style">Edit Post</h2>
<div class="form-container">
    <form action="?module=execute&id=<?= $id ?>" method="post">
        <table>
            <tr>
                <td width="100" class="label" align="left">Judul</td>
                <td align="left"><?= TextField::generateDefaultTextField($post->TITLE, '100', $data[$post->TITLE]) ?></td>
            </tr>
            <tr>
                <td align="left" colspan="2"><?= TextEditor::generateTextEditor($post->CONTENT_FORM, $data[$post->CONTENT]) ?></td>
            </tr>
            <tr>
                <td align="left" colspan="2"><?= TextField::generateSubmitField('Simpan', 'button') ?></td>
            </tr>
        </table>
    </form>
</div>