
<?php

class Insert_offer extends MY_Model 
{
    const DB_TABLE='offer';
    const DB_TABLE_PK='offerid';
    public $offerid;
    public $startdate;
    public $enddate;
    public $tag;
    public $description;
    public $branchno;
    
}