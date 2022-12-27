<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['judul'] = "Login";

        return view('v_register', $data);
        //return view('admin', $data);
    }
}
