</div>
</td>
<td><div class="vert-line"></div></td>
<td valign="top">
    <div id="side">
        <div style="height: 25px"></div>
        <?php
        if ($_SESSION['status'] != 'login')
        {
            ?>
            <div class="post">
                <div class="head-style">Login</div>
                <div class="horz-line"></div>
                <div class="post-body">
                    <form action="../controls/Login.php" method="post">
                        <table>
                            <tr>
                                <td width="100" class="label">Username</td>
                                <td width="100"><?= TextField::generateDefaultTextField('username') ?></td>
                            </tr>
                            <tr>
                                <td width="100" class="label">Password</td>
                                <td width="100"><?= TextField::generateDefaultPasswordField('password') ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Login" class="button"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <?php
        }
        else
            echo '<div class="button"><a href="../controls/Logout.php" title="Logout">Logout</a></div>';
        ?>
        <div style="height: 25px"></div>
        <div class="post">
            <div class="post-body">
                <?php
                include '../ui/streams.php';
                ?>
                <br />
                <br />
                <a href="reminder.php"><img src="icons/add-icon.png" width="32" title="Tambah Reminder" alt="reminder"/></a>
            </div>
        </div>
    </div>
</td>
</tr>
</table>
</div>
<div id="footer">
    <div>Copyrights &copy; | 2012</div>
</div>
<?php
// put your code here
?>
</body>
</html>
