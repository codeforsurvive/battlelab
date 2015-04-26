<?php

/**
 * Description of Images
 *
 * @author Rohmad
 */
include_once 'EntityBase.class.php';

class Images extends EntityBase
{
    public $TITLE = 'title';
    public $PATH = 'path';
    
    public function construct()
    {
        parent::construct();
        $this->ID = 'id';
        $this->tableName = 'images';
    }
    
    public function enumerate()
    {
        parent::enumerate();
        if (!$this->resource)
            return;
        $i = 1;
        while ($row = mysql_fetch_array($this->resource)) {
            $this->result_array[$i][$this->ID] = $row[$this->ID];
            $this->result_array[$i][$this->TITLE] = $row[$this->TITLE];
            $this->result_array[$i][$this->PATH] = $row[$this->PATH];            
            $this->row_array = $this->result_array[$i];
            $i++;
        }
    }
}

?>
