<?php

/**
 * 
 * @date May 28, 2012
 * @access public
 */
include_once 'Database.class.php';
include_once 'Setting.class.php';

class Connection {

// Atrributes
    private $link_id;

// Methods

    public function connect() {
        $this->link_id = mysql_connect(Database::$HOST, Database::$USER, Database::$PASSWORD);
        if (!$this->link_id) {
            return false;
        } else {
            mysql_select_db(Database::$DATABASE);
            return true;
        }

    }

    public function disconnect() {
        mysql_close();
    }

}

/* End of Class Connection.php */
?>