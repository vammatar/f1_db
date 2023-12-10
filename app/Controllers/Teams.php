<?php

namespace App\Controllers;

class Teams extends BaseController
{
    public function __construct() {
        $this->teams_model = model('TeamsModel');
    }

    public function index(): string
    {
        $data = array(
            'title' => 'Teams',
            'teams' => $this->teams_model->findAll(),
        );
        return view('teams', $data);
    }

    function add() {
        helper('form');
        $data = array(
            'title' => 'Add team',
            'edit' => FALSE,
        );

        if ($this->request->is('post')) {
            $rules = $this->teams_model->validationRules;
            if ($this->validate($rules)) {
                $insert_data = array(
                    'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'country' => $this->request->getPost('country', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'engine_supplier' => $this->request->getPost('engine_supplier', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                );
                $result = $this->teams_model->insert($insert_data);
                
                if($result){
                    $id = $this->teams_model->getInsertID();
                    return redirect()->to('/teams');
                } else {
                    return redirect()->to('/teams');
                }

            }
        }
        return view('team', $data);
    }

    public function delete($id) {
        $this->teams_model->delete($id);
        return redirect()->route('teams');
    }

    function edit($id) {
        helper('form');

        $data = array(
            'title' => 'Edit team',
            'edit' => TRUE,
            'team' => $this->teams_model->find($id),
        );

        if ($this->request->is('post')) {
            $rules = $this->teams_model->validationRules;
            if ($this->validate($rules)) {
                $update_data = array(
                    'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'country' => $this->request->getPost('country', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'engine_supplier' => $this->request->getPost('engine_supplier', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                );
                $this->teams_model->update($id, $update_data);

                return redirect()->route('teams');
            }
        }
        return view('team', $data);
    }
}
