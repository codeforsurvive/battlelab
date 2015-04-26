<?php

/**
 * Description of Tags
 *
 * @author Rohmad
 */
include_once 'EntityBase.class.php';

class Tags extends EntityBase
{

    public $NAME = 'name';
    public $STATUS = 'status';

    public function construct()
    {
        parent::construct();
        $this->tableName = 'tags';
        $this->ID = 'id';
    }

    public function enumerate()
    {
        parent::enumerate();
        if (!$this->resource)
            return;
        $i = 1;
        while ($row = mysql_fetch_array($this->resource)) {
            $this->result_array[$i][$this->ID] = $row[$this->ID];
            $this->result_array[$i][$this->NAME] = $row[$this->NAME];
            $this->result_array[$i][$this->STATUS] = $row[$this->STATUS];
            $this->row_array = $this->result_array[$i];
            $i++;
        }
    }

}

?>
