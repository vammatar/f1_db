<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamsModel extends Model
{
    protected $table          = 'teams';
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields  = ['name', 'country', 'engine_supplier'];

    protected $validationRules = [
        'name'              => 'required',
        'country'           => 'required',
        'engine_supplier'   => 'required'
    ];

    public function get_drivers_teams($team_id) {
      $builder = $this->db->table($this->table.' T');
      $builder->select('*, T.id');
      $builder->join('drivers D', 'T.id=D.team_id');
      $builder->where('D.team_id', $team_id);
      $query = $builder->get();
      return $query->getResult();
    }

    public function get_not_drivers_teams($team_id) {
		$sql = "SELECT * FROM teams WHERE id NOT IN(SELECT team_id FROM drivers WHERE team_id=?)";//do this sql
		$result = $this->query($sql, [$team_id]);
		return $result->getResultObject();
    }
}