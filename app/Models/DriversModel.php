<?php

namespace App\Models;

use CodeIgniter\Model;

class DriversModel extends Model
{
    protected $table          = 'drivers';
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields  = ['name', 'nationality', 'date_of_birth', 'team_id'];

    protected $validationRules = [
        'name'              => 'required',
        'nationality'       => 'required',
        'date_of_birth'     => 'required',
        'team_id'           => 'required'
    ];

    public function get_race_winner($driver_id) {
      $builder = $this->db->table($this->table.' D');
      $builder->select('*, D.id');
      $builder->join('races R', 'D.id=R.winner_id');
      $builder->where('R.winner_id', $driver_id);
      $query = $builder->get();
      return $query->getResult();
    }

    public function get_not_race_winners($driver_id) {
		$sql = "SELECT * FROM drivers WHERE id NOT IN(SELECT winner_id FROM races WHERE winner_id=?)";//do this sql
		$result = $this->query($sql, [$driver_id]);
		return $result->getResultObject();
    } 

}