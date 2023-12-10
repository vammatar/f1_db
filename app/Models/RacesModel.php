<?php

namespace App\Models;

use CodeIgniter\Model;

class RacesModel extends Model
{
    protected $table          = 'races';
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields  = ['name', 'date', 'circuit', 'winner_id'];

    protected $validationRules = [
        'name'          => 'required',
        'date'          => 'required',
        'circuit'       => 'required',
        'winner_id'     => 'required'
    ];
}