
<?php

class Insert_expense extends MY_Model 
{
    const DB_TABLE='expenses';
    const DB_TABLE_PK='exp_id';
    public $exp_id;
    public $date_id;
    public $price;
    public $description;
    public $end_date;
    public $rstatus;
    
}