<?php

/**
 *
 * @date Jun 8, 2012
 * @access public
 */
class Converter
{

    public static function strToLongDate($strdate)
    {
        return self::shortToLongDate(date_create($strdate));
    }

    public static function strToShortDate($strdate)
    {
        return self::longToShortDate(date_create($strdate));
    }

    public static function shortToLongDate($shortdate)
    {
        return date_format($shortdate, 'l, d M Y');
    }

    public static function longToShortDate($longdate)
    {
        return date_format($longdate, 'Y/m/d');
    }

    public static function toCurrency($number, $sign)
    {
        return $sign . '.' . number_format($number, 2, ',', '.');
    }

    public static function toNumber($currency)
    {
        echo $currency . '<br />';
        $currency = preg_replace('/[^0-9]+/', '', $currency);
        echo $currency . '<br />';
        return (int) ($currency);
    }
    
    public static function normalizeName($name)
    {
        return ucwords(strtolower($name));
        
    }

}

/* End of Converter.php */
    ?>