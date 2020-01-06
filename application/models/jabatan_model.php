<?php
class jabatan_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function all(){
        $rows = $this->db
            ->from('jabatan')
            ->get()
            ->result_array();
        return $rows;
    }
}
?>