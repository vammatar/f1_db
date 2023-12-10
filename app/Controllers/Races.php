<?php

namespace App\Controllers;

class Races extends BaseController
{
    public function __construct() {
        $this->races_model = model('RacesModel');
    }

    public function index(): string
    {
        $data = array(
            'title' => 'Races',
            'races' => $this->races_model->findAll(),
        );
        return view('races', $data);
    }

    function add() {
        helper('form');
        $data = array(
            'title' => 'Add race',
            'edit' => FALSE,
        );

        if ($this->request->is('post')) {
            $rules = $this->races_model->validationRules;
            if ($this->validate($rules)) {
                $insert_data = array(
                    'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'date' => $this->request->getPost('date', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'circuit' => $this->request->getPost('circuit', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'winner_id' => $this->request->getPost('winner_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                );
                $result = $this->races_model->insert($insert_data);
                
                if($result){
                    $id = $this->races_model->getInsertID();
                    return redirect()->to('/races');
                } else {
                    return redirect()->to('/races');
                }

            }
        }
        return view('race', $data);
    }

    public function delete($id) {
        $this->races_model->delete($id);
        return redirect()->route('races');
    }

    function edit($id) {
        helper('form');

        $this->drivers_model = model('DriversModel');
        $data = array(
            'title' => 'Edit race',
            'edit' => TRUE,
            'race' => $this->races_model->find($id),
            'get_race_winner' => $this->drivers_model->get_race_winner($id),
            'get_not_race_winners' => $this->drivers_model->get_not_race_winners($id),
        );


        if ($this->request->is('post')) {
            $rules = $this->races_model->validationRules;
            if ($this->validate($rules)) {
                $update_data = array(
                    'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'date' => $this->request->getPost('date', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'circuit' => $this->request->getPost('circuit', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'winner_id' => $this->request->getPost('winner_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                );
                $this->races_model->update($id, $update_data);

                return redirect()->route('races');
            }
        }
        return view('race', $data);
    }

}
