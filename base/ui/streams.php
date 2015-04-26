<?php
/**
 * Description of streams
 *
 * @author Rohmad
 */
include_once '../models/User.class.php';
include_once '../models/Post.class.php';
$posts = new Post();
$posts->construct();
$posts->getRecentPosts(0, 5);
$allData = $posts->getResultArray();
?>

<h2 class="head-style">Postingan Terbaru</h2>
<?php
if (count($allData) <= 0)
{
    echo '<span>Data tidak ditemukan</span><br />';
}
else
{
    ?>
    <table width="100%">
        <?php
        for ($i = 1; $i <= count($allData); $i++)
        {
            ?>
            <tr>
                <td class="label" style="font-size: 14px"><a href="../details/post.php" target="_blank" style="color: darkgreen"><?= Converter::normalizeName($allData[$i][$posts->TITLE]) ?></a></td>
            </tr>
            <tr>
                <td class="label" style="font-size: 12">Posted by: <?= Converter::normalizeName($allData[$i][$posts->AUTHOR]) ?></td>
            </tr>
            <tr>
                <td class="label" style="font-size: 12px"><?= Converter::strToLongDate($allData[$i][$posts->DATE]) ?></td>
            </tr>

        <?php } ?>       
    </table>
<?php }
?>
