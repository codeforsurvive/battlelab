<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Blogs & E-Learning Template</title>
        <?php
        include_once '../tools/CommonVariabels.php';
        include_once '../tools/Session.php';
        include_once '../config/Setting.class.php';
        include_once '../tools/TextField.class.php';
        include_once '../tools/TextEditor.class.php';
        include_once '../tools/Paginator.php';
        include_once '../tools/FormValidator.class.php';
        Setting::config();
        ?>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.8.20.custom.min.js"></script>
        <script type="text/javascript" src="../js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="../js/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
            $(function(){

                // Accordion
                $("#accordion").accordion({ header: "h3" });

                // Tabs
                $('#tabs').tabs();

                // Dialog
                $('#dialog').dialog({
                    autoOpen: false,
                    width: 600,
                    buttons: {
                        "Ok": function() {
                            $(this).dialog("close");
                        },
                        "Cancel": function() {
                            $(this).dialog("close");
                        }
                    }
                });

                // Dialog Link
                $('#dialog_link').click(function(){
                    $('#dialog').dialog('open');
                    return false;
                });

                // Datepicker
                $('#datepicker').datepicker({
                    inline: true
                });

                // Slider
                $('#slider').slider({
                    range: true,
                    values: [17, 67]
                });

                // Progressbar
                $("#progressbar").progressbar({
                    value: 20
                });

                //hover states on the static widgets
                $('#dialog_link, ul#icons li').hover(
                function() { $(this).addClass('ui-state-hover'); },
                function() { $(this).removeClass('ui-state-hover'); }
            );

            });
        </script>
    </head>
    <body>
        <div class="menu-container">
            <table width="100%" valign="bottom" align="center">
                <tr>
                    <td width="100">&nbsp</td>
                    <td width="150">
                        <div class="menubuton">
                            <div class="menu"><a href="index.php" class="menu">Home</a></div>
                        </div>
                    </td>
                    <?php
                    if ($_SESSION[CommonVariabels::$LOGIN_STATUS] == 'login')
                    {
                        ?>
                        <td width="150">
                            <div class="menubuton">
                                <div class="menu"><a href="barang.php" class="menu">Barang</a></div>
                            </div>
                        </td>
                        <td width="150">
                            <div class="menubuton">
                                <div class="menu"><a href="sertifikat.php" class="menu">Sertifikat</a></div>
                            </div>
                        </td>
                        <td width="150">
                            <div class="menubuton">
                                <div class="menu"><a href="perusahaan.php" class="menu">Perusahaan</a></div>
                            </div>
                        </td>
                        <td width="150">
                            <div class="menubuton">
                                <div class="menu"><a href="auditor.php" class="menu">Auditor</a></div>
                            </div>
                        </td>
                        <td width="150">
                            <div class="menubuton">
                                <div class="menu"><a href="pelaksanaan.php" class="menu">Pelaksanaan</a></div>
                            </div>
                        </td>
                    <?php } ?>
                    <td>&nbsp</td>
                </tr>
            </table>
        </div>

        <div class="menu-border"></div>
        <div id="main">
            <div style="height: 50px; width: 100%"></div>
            <table align="center" width="1000" style="border: 0px; border-collapse: collapse; background:  url(images/test.png) repeat;">
                <tr>
                    <td style="padding: 7px;" valign="top">
                        <div id="content">