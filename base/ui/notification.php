<?php
/**
 * Description of notification
 *
 * @author Rohmad
 * required variables
 * $links : array
 * $texts : array
 * $icons : array
 * $class : string
 * $message : string
 * 
 */
?>
<div class="<?= $class ?>">
    <span><?= $message ?></span>
    <br /><br />
    <table cellpadding="3">
        <tr>
            <?php
            $i = 0;
            foreach ($links as $link)
            {
                ?>
                <td width="50">
                    <a href="<?= $link ?>" title="<?= $texts[$i] ?>"><img src="<?= $icons[$i] ?>" width="32" alt="<?= $texts[$i] ?>"/></a>
                </td>
            <br /><br /><br /><br />
            <?php
            $i++;
        }
        ?>
        </tr>
    </table>
</div>