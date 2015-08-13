<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mLogAktivitas extends MY_Model {

    // constants, column definition
    const ID = 'LOG_ID';
    const NAME = 'LOG_NAME';
    const USER = 'LOG_USER';
    const MENU = 'LOG_MENU';
    const COMMAND = 'LOG_COMMAND';
    const MODEL = 'LOG_MODEL';
    const DETAIL = 'LOG_DETAIL';
    const KUNCI = 'LOG_KEY';
    const TANGGAL = 'LOG_DATE';
    const TABLE = "log_activity";

    public function __construct() {
        parent::__construct();
        $this->tableName = 'log_activity';
        $this->idField = mLogAktivitas::ID;
    }

    public function getLogAktivitas($user) {
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $order = $this->input->post('order');
        $search = $this->input->post('search');

        //print_r($order);
        $a_order = array('l.LOG_ID', 'l.LOG_COMMAND', 'l.LOG_MENU', 'l.LOG_MODEL', 'l.LOG_DATE');
        $a_search = array('l.LOG_ID', 'l.LOG_COMMAND', 'l.LOG_MENU', 'l.LOG_MODEL', 'l.LOG_DATE', 'l.LOG_DETAIL', 'l.LOG_KEY');
        //$my_order = array();
        $my_order = ' order by ';
        $my_search = ' and ( ';
        $sep = '';
        $key_word = '';
        foreach ($order as $ord) {
            $my_order.=$sep . $a_order[$ord['column']] . ' ' . $ord['dir'];
            $sep = ',';
        }
        $sep = '';
        foreach ($a_search as $srch) {
            $my_search.= $sep . $srch . " like '%" . $search['value'] . "%'";
            $sep = ' or ';
        }
        $my_search .= ')';
        if (strlen($search['value']) > 0) {
            $key_word = $my_search;
        }
        $sql = "select count(*) as jumlah from log_activity l where l.LOG_USER='$user' $key_word";
        $query = $this->db->query($sql)->result_array();
        $jumlah = (int) $query[0]['jumlah'];
        $sql = "select l.* from log_activity l where l.LOG_USER='$user' $key_word $my_order limit $start,$length";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $row) {
            $baris = array();
            foreach ($row as $cell) {
                $baris[] = $cell;
            }
            $hasil[] = $baris;
        }
        return json_encode(array('data' => $hasil, 'draw' => $draw, 'recordsTotal' => $jumlah, 'recordsFiltered' => $jumlah));
    }

}
