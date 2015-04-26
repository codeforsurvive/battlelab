<?php

/**
 * Description of FormValidator
 *
 * @author Rohmad
 */
class FormValidator
{
    public static function validate($requiredFields = array(), $method = 'POST')
    {
        foreach ($requiredFields as $value)
        {
            switch ($method)
            {
                case 'POST':
                    if(!isset($_POST[$value]) || (string)$_POST[$value] == '')
                        return false;
                    break;
                case 'GET':
                    if(!isset($_GET[$value]) || (string)$_GET[$value] == '')
                        return false;
                    break;
                case 'FILES':
                    if(!isset($_FILES[$value]))
                        return false;
                    break;
            }
        }
        return true;
    }
    
    public static function setDefault($name, $default_value = '')
    {
        return (!isset($_POST[$name])) ? $default_value : $_POST[$name];
    }
}

?>
