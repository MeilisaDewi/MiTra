<?php

namespace App\Models;

use CodeIgniter\Model;

class CustModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $useTimestamps = true;
   
}