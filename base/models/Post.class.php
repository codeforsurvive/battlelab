<?php

/**
 * Description of Post
 *
 * @author Rohmad
 */
include_once 'EntityBase.class.php';

class Post extends EntityBase
{

    public $TITLE = 'title';
    public $CONTENT = 'content';
    public $CONTENT_FORM = 'content1';
    public $HITS = 'hits';
    public $STATUS = 'status';
    public $DATE = 'writedate';
    public $AUTHOR_ID = 'author';
    public $AUTHOR = 'post author';
    public $ACTIVEROW = 1;

    public function construct()
    {
        parent::construct();
        $this->tableName = 'post';
        $this->ID = 'id';
    }

    public function enumerate()
    {
        parent::enumerate();
        if (!$this->resource)
            return;
        $i = 1;
        include_once 'User.class.php';
        $user = new User();
        $user->construct();
        while ($row = mysql_fetch_array($this->resource)) {
            $this->result_array[$i][$this->ID] = $row[$this->ID];
            $this->result_array[$i][$this->TITLE] = $row[$this->TITLE];
            $this->result_array[$i][$this->CONTENT] = $row[$this->CONTENT];
            $this->result_array[$i][$this->DATE] = $row[$this->DATE];
            $this->result_array[$i][$this->HITS] = $row[$this->HITS];
            $this->result_array[$i][$this->AUTHOR_ID] = $row[$this->AUTHOR_ID];
            $user->findById($row[$this->AUTHOR_ID]);
            $c_user = $user->getRowAray();
            $this->result_array[$i][$this->AUTHOR] = $c_user[$user->NAME];
            $this->result_array[$i][$this->STATUS] = $row[$this->STATUS];
            $this->row_array = $this->result_array[$i];
            $i++;
        }
    }

    public function viewed($id)
    {
        $this->findById($id);
        if (count($this->result_array > 0))
        {
            $current = $this->getRowAray();
            $this->setAttributes(array($this->HITS => $current[$this->HITS] + 1));
            parent::save($id);
        }
    }

    public function getAllMyPosts($start = 0, $limit = 10)
    {
        $this->queryString = "select * from {$this->tableName} where {$this->AUTHOR_ID} = {$_SESSION[CommonVariabels::$CURRENT_USER]} order by {$this->DATE} desc limit{$start}, {$limit}";
        $this->resource = $this->executeSQL();
        $this->enumerate();
    }

    public function getRecentPosts($start = 0, $limit = 10)
    {
        $this->queryString = "select * from {$this->tableName} order by {$this->DATE} desc limit {$start}, {$limit}";
        //print_r($this->queryString);
        $this->resource = $this->executeSQL();
        //print_r($this->resource);
        $this->enumerate();
        //print_r($this->result_array);
    }

}

?>
