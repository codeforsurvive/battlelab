<?php

/**
 * Description of EntityBase
 *
 * @author Rohmad
 */
include_once '../config/Connection.class.php';

//die($_SERVER['DOCUMENT_ROOT'] . '/config/Connection.class.php');
class EntityBase
{

    //put your code here
    protected $connection;
    protected $tableName;
    protected $columnCount;
    protected $columnIdentifiers;
    protected $attributes;
    protected $queryString;
    protected $status;
    protected $result_array;
    protected $row_array;
    protected $resource;
    protected $last_id;
    public $ID = 'id';

    public function construct()
    {
        $this->connection = new Connection();
        $this->status = false;
    }

    private function insertOrUpdate()
    {
        $this->connection->connect();
        $result = mysql_query($this->queryString);
        if (!$result)
        {
            $this->connection->disconnect();
            return false;
        }
        else
        {
            $this->last_id = mysql_insert_id();
            $this->connection->disconnect();
            return true;
        }
    }

    private function excecuteQuery()
    {
        $this->connection = new Connection();
        $this->connection->connect();
        $result = mysql_query($this->queryString);
        if (!$result)
        {
            $this->connection->disconnect();
            return false;
        }
        else
        {
            $this->connection->disconnect();
            return $result;
        }
    }

    protected function executeSQL()
    {
        return $this->excecuteQuery();
    }

    protected function enumerate()
    {
        $this->result_array = array();
        $this->row_array = array();
    }

    public function setAttributes($values)
    {
        $this->attributes = array();
        foreach ($values as $key => $value)
        {
            $this->attributes[$key] = $value;
        }
    }

    public function insert()
    {
        $columns = "";
        $values = "";
        $i = 0;
        $this->last_id = 0;
        foreach ($this->attributes as $key => $value)
        {
            $columns .= $key;
            $values .= '\'' . addslashes($value) . '\'';
            if ($i < count($this->attributes) - 1)
            {
                $columns .= ', ';
                $values .= ', ';
            }
            $i++;
        }

        $this->queryString = "insert into " . $this->tableName . "({$columns}) values({$values})";
        //die($this->queryString);

        $this->status = $this->insertOrUpdate();
    }

    public function save($id)
    {
        $this->queryString = "update " . $this->tableName . " set ";
        $i = 0;
        foreach ($this->attributes as $key => $value)
        {
            $this->queryString .= $key . " = '" . addslashes($value) . "'";
            if ($i < count($this->attributes) - 1)
                $this->queryString .= ", ";
            $i++;
        }
        $this->queryString .= " where {$this->ID} = {$id}";
        //echo $this->queryString;
        $this->status = $this->insertOrUpdate();
    }

    public function delete($id)
    {
        $this->queryString = "delete from " . $this->tableName . " where {$this->ID} = {$id}";
        $this->status = $this->insertOrUpdate();
    }

    public function select($start = 0, $limit = 10)
    {
        $this->queryString = "select * from " . $this->tableName . " order by {$this->ID} asc limit {$start}, {$limit}";
        // echo $this->queryString . '<br />';
        $this->resource = $this->excecuteQuery();
        $this->enumerate();
    }

    public function selectActiveRow($start = 0, $limit = 10, $colname = 'status', $activerow = 1)
    {
        $this->queryString = "select * from " . $this->tableName . " where {$colname} = {$activerow} order by {$this->ID} asc limit {$start}, {$limit}";
        // echo $this->queryString . '<br />';
        $this->resource = $this->excecuteQuery();
        $this->enumerate();
    }

    public function findAll($order = 'id', $sort = 'asc')
    {
        $this->queryString = "select * from " . $this->tableName . " order by {$order} {$sort}";
        $this->resource = $this->excecuteQuery();
        $this->enumerate();
    }

    public function findById($id)
    {
        $this->queryString = "select * from " . $this->tableName . " where {$this->ID} = {$id}";
        //echo $this->queryString . '<br />';
        $this->resource = $this->excecuteQuery();
        $this->enumerate();
    }

    public function selectWhere($column)
    {
        //print_r($column);
        $this->queryString = "select * from " . $this->tableName . " where ";
        $i = 0;
        foreach ($column as $key => $value)
        {
            $this->queryString .= $key .= " = '{$value}'";
            if ($i < (count($column) - 1))
                $this->queryString .= " and ";
            $i++;
        }
        //echo $this->queryString;
        $this->resource = $this->excecuteQuery();
        $this->enumerate();
    }

    public function getTotalData()
    {
        $this->queryString = "select * from " . $this->tableName;
        $this->resource = $this->excecuteQuery();
        return mysql_num_rows($this->resource);
    }

    public function getStatus()
    {

        return $this->status;
    }

    public function getResultArray()
    {
        return $this->result_array;
    }

    public function getRowAray()
    {
        return $this->row_array;
    }

    public function getLastInsertedId()
    {
        return $this->last_id;
    }

}

?>
