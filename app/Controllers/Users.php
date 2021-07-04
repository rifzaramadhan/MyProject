<?php

namespace App\Controllers;

use App\Models\akunModel;

class Users extends BaseController
{
    protected $akunModel;

    public function __construct()
    {
        $this->akunModel = new akunModel();
    }
    public function index()
    {
        $data['users'] = $this->akunModel->getAkun();
        return view('userView/index', $data);
    }
}
