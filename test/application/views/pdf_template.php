<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="<?= CSS ?>bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?= CSS ?>bootstrap-theme.css" />
        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
                font-family: 'Calibri';
                font-size: 16px;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 10px 15px 10px 15px;
            }

            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }

            #main_form {
                background: #f0f0f0;
                width: 100%;
            }
            div
            {
                margin: auto;
            }

        </style>
    </head>
    <body>
        <div id="container">
            <div id="body">
                <div class="clearfix"></div>
                <table id="main_form" class="table-responsive">
                    <tr>
                        <td style="width: 30%">&nbsp;</td>
                        <td style="width: 30%"></td>
                        <td style="width: 10%" rowspan="3"></td>
                        <td style="height: 350px; background-color: #0099ff; padding: 25px" rowspan="3">
                            <div style="background: white; height: 100%">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="text-align: center">
                                            <img src="<?= $data['image'] ?>" alt="Picture" title="" height="250px"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center">
                                            <?= $data['barcode'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center"><?= $data['number'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; height: 25px">Nama &nbsp; :</td>
                        <td><?= $data['name'] ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; height: 25px">Nomor Induk &nbsp; :</td>
                        <td><?= $data['number'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding: 10px">
                            <div style="height: 100%; width: auto; background-color: #cccccc; padding: 15px">
                                <?= $data['file'] ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>