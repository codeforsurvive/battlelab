<?php

/**
 * Description of TextField
 *
 * @author Rohmad
 */
class TextField
{

    public static function generateDefaultTextField($name, $size = '25', $value = '', $readonly = '')
    {
        echo '<input type="text" name="' . $name . '" id="' . $name . '" size="' . $size . '" value="' . $value . '" ' . $readonly .'/>';
    }

    public static function generateDefaultPasswordField($name, $size = '25', $value = '')
    {
        echo '<input type="password" name="' . $name . '" id="' . $name . '" size="' . $size . '" value="' . $value . '"/>';
    }

    public static function generateDefaultHiddenField($name,  $value = '')
    {
        echo '<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '"/>';
    }

    public static function generateCustomTextField($attributes = array())
    {
        
    }
    
    public static function generateFileField($name, $size = '25')
    {
        echo '<input type="file" name="' . $name . '" id="' . $name . '" size="' . $size . '" />';
    }
    
    public static function generateSubmitField($text, $class)
    {
        echo '<input type="submit" value="' . $text . '" class="' . $class .'" />';
    }

}

?>
