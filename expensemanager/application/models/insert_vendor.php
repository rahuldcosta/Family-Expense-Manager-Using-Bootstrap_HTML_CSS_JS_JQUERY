<?php
class insert_vendor extends CI_Model{
function __construct() {
parent::__construct();
}
function form_insert($data){
   $this->load->database();
// Inserting in  Table(vendor) of Database(expensemanager)
$this->db->insert('vendor', $data);


}
}
?>