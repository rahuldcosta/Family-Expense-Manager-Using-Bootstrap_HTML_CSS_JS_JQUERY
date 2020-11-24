
<?php

class Insert_branch extends MY_Model 
{
    const DB_TABLE='branch';
    const DB_TABLE_PK='contact';
    public $contact;
    public $state;
    public $city;
    public $country;
    public $username;
    public $type;
    
    function __construct() {
parent::__construct();
}
function form_insert($databranch){
   $this->load->database();
// Inserting in Table(branch) of Database(expensemanager)
$this->db->insert('branch', $databranch);


}
}