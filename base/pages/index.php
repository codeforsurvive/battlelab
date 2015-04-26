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
        
    </body>
</html>
