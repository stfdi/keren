<?php

namespace App\Models;

use CodeIgniter\Model;

class ToDoListModel extends Model
{

    protected $table = 'todolist';
    protected $primaryKey = 'produkid';
    protected $allowedFields = ['produkid', 'kegiatan'];
}
