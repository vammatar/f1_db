<?php

namespace App\Controllers;

class Drivers extends BaseController
{
    public function __construct() {
        $this->drivers_model = model('DriversModel');
    }

    public function index(): string
    {
        $data = array(
            'title' => 'Drivers',
            'drivers' => $this->drivers_model->findAll(),
        );
        return view('drivers', $data);
    }

    function add() {
        helper('form');
        $data = array(
            'title' => 'Add driver',
            'edit' => FALSE,
        );

        if ($this->request->is('post')) {
            $rules = $this->drivers_model->validationRules;
            if ($this->validate($rules)) {
                $insert_data = array(
                    'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'nationality' => $this->request->getPost('nationality', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'date_of_birth' => $this->request->getPost('date_of_birth', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'team_id' => $this->request->getPost('team_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                );
                $result = $this->drivers_model->insert($insert_data);
                
                if($result){
                    $id = $this->drivers_model->getInsertID();
                    return redirect()->to('/drivers');
                } else {
                    return redirect()->to('/drivers');
                }

            }
        }
        return view('driver', $data);
    }

    public function delete($id) {
        $this->drivers_model->delete($id);
        return redirect()->route('drivers');
    }

    function edit($id) {
        helper('form');

        $this->teams_model = model('TeamsModel');
        $data = array(
            'title' => 'Edit driver',
            'edit' => TRUE,
            'driver' => $this->drivers_model->find($id),
            'get_drivers_teams' => $this->teams_model->get_drivers_teams($id),
            'get_not_drivers_teams' => $this->teams_model->get_not_drivers_teams($id),
        );


        if ($this->request->is('post')) {
            $rules = $this->drivers_model->validationRules;
            if ($this->validate($rules)) {
                $update_data = array(
                    'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'nationality' => $this->request->getPost('nationality', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'date_of_birth' => $this->request->getPost('date_of_birth', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'team_id' => $this->request->getPost('team_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                );
                $this->drivers_model->update($id, $update_data);

                return redirect()->route('drivers');
            }
        }
        return view('driver', $data);
    }

}
