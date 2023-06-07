<?php

namespace App\Controllers;

class todolist extends BaseController
{
    protected $todolistModel;

    public function __construct()
    {
        $this->todolistModel = new \App\Models\ToDoListModel();
    }

    public function index()
    {
        $todolist = $this->todolistModel->findAll();
        $data = [
            'title' => 'Daftar Kegiatan',
            'todolist' => $todolist
        ];

        return view('todolist/hai', $data);
    }

    public function save()
    {
        $this->todolistModel->save([
            'produkid' => $this->request->getVar('produkid'),
            'kegiatan' => $this->request->getVar('kegiatan'),
            'status' => $this->request->getVar('status')
        ]);
        return redirect()->to('/todolist');
    }
}
