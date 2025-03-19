<?php

namespace App\Controllers;
use App\Models\UserModel; 
use App\Models\KaryaModel;

class Home extends BaseController
{
    public function index(): string
    {

        // Membuat objek model UserModel
        $model = new UserModel();
        
        // Mengambil data users dari database
        $data['users'] = $model->getUserHome();


        $model2 = new KaryaModel();
        $data['karya'] = $model2->getKaryaHome();


        return view('home', $data);
    }
}
