<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>

        <link rel="stylesheet" type="text/css" href="<?= CSS ?>bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?= CSS ?>bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="<?= CSS ?>bootstrap-modal-bs3patch.css" />
        <link rel="stylesheet" type="text/css" href="<?= CSS ?>bootstrap-modal.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="<?= JS ?>jquery.js"></script>
        <script type="text/javascript" src="<?= JS ?>jquery.validate.js"></script>
        <script type="text/javascript" src="<?= JS ?>jquery.mask.min.js"></script>
        <script type="text/javascript" src="<?= JS ?>bootstrap.js"></script>
        <script type="text/javascript" src="<?= JS ?>bootstrap-modalmanager.js"></script>
        <script type="text/javascript" src="<?= JS ?>bootstrap-modal.js"></script>
        <script type="text/javascript" src="<?= JS ?>npm.js"></script>
        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
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
                margin: 0 15px 0 15px;
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
        </style>
    </head>
    <body>
        <script>
            $(document).ready(function() {
                $('#name').mask('AAAAAAAAAA');
                $('#reg_number').mask('XXX-XXXX', {
                    translation:
                            {
                                'X': {
                                    pattern: /[1-9]/
                                }
                            }
                });

            });
        </script>
        <div id="container">
            <h1>Welcome to CodeIgniter!</h1>

            <div id="body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Registration Number</label>
                        <div class="col-md-5">
                            <input type="text" value="" placeholder="Registration Number" class="form-control" id="reg_number" name="reg_number"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-5">
                            <input type="text" value="" placeholder="Name" class="form-control" id="name" name="name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Input File</label>
                        <div class="col-md-2">
                            <input type="file" accept=".txt" name="file_upload" id="file_upload" class="btn btn-md btn-info"/>
                        </div>

                    </div>

                </div>            
            </div>
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </div>

    </body>
</html>