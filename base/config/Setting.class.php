<?php

/**
 * 
 * @date May 28, 2012
 * @access public
 */
include_once '../tools/Converter.class.php';
class Setting {

    public static $BASE_PATH = '';
    public static $MONTHS = array(1 => 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    public static $LEAPS = array(1 => 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    public static $START_YEAR = 1990;
    public static $END_YEAR = 2099;
    public static $CSS = array('jquery.ui.all.css', 'jquery.ui.datepicker.css', 'base.css', 'custom-theme/jquery-ui-1.8.20.custom.css');
    public static $SCRIPTS = array('jquery-1.7.2.min.js', 'jquery.js', 'jquery.ui.core.js', 'jquery.ui.datepicker.js', 'jquery-ui-1.8.20.custom.min.js', 'tiny_mce/tiny_mce.js');
    

    public static function config() {
        Setting::$BASE_PATH = $_SERVER['DOCUMENT_ROOT'];
        $css_styles = '';
        foreach (self::$CSS as $css) {
            $css_styles .= '<link rel="stylesheet" href="../css/' . $css . '" />' . "\n";
        }
        $js_scripts = '';
        foreach (self::$SCRIPTS as $js){
            $js_scripts .= '<script type="text/javascript" src="../js/' . $js .'"></script>' . "\n";
        }
        
        echo $css_styles;
        //echo $js_scripts;
    }

}

/* End of Class Setting.php */
?>
