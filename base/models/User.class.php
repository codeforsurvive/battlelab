<?php

/**
 * Description of User
 *
 * @author Rohmad
 */
include_once 'EntityBase.class.php';

class User extends EntityBase
{

    public $USERNAME = 'username';
    public $PASSWORD = 'pwd';
    public $NAME = 'name';
    public $ADDRESS = 'address';
    public $PHONE = 'phone';
    public $EMAIL = 'email';
    public $WEBSITE = 'url';
    public $PROFILE_PICTURE = 'profile';
    public $PREVILEGE = 'previlege';

    private $login_status;
    private $previlege;
    private $current_user;
    public function construct()
    {
        parent::construct();
        $this->tableName = 'blogger';
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
            $this->result_array[$i][$this->USERNAME] = $row[$this->USERNAME];
            $this->result_array[$i][$this->NAME] = $row[$this->NAME];
            $this->result_array[$i][$this->ADDRESS] = $row[$this->ADDRESS];
            $this->result_array[$i][$this->PHONE] = $row[$this->PHONE];
            $this->result_array[$i][$this->EMAIL] = $row[$this->EMAIL];
            $this->result_array[$i][$this->PROFILE_PICTURE] = $row[$this->PROFILE_PICTURE];
            $this->result_array[$i][$this->PREVILEGE] = $row[$this->PREVILEGE];
            $this->row_array = $this->result_array[$i];
            $i++;
        }
    }

    public function login($username, $password)
    {
        $this->login_status = false;
        $this->previlege = 0;
        $data = array(
            $this->USERNAME => $username,
            $this->PASSWORD => md5($password)
        );
        $this->selectWhere($data);
        $this->login_status = (count($this->result_array) > 0);
        if($this->login_status)
        {
            $this->previlege = $this->row_array[$this->PREVILEGE];
            $this->current_user = $this->row_array[$this->ID];
        }
    }
    
    public function getLoginResult()
    {
        return $this->login_status;
    }
    
    public function getPrevilege()
    {
        return $this->previlege;
    }
    
    public function getCurrentUser()
    {
        return $this->current_user;
    }
}

?>
