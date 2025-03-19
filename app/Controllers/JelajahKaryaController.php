<?php

namespace App\Controllers;
use App\Models\KaryaModel;

class JelajahKaryaController extends BaseController
{
    public function index(): string
    {
        $model = new KaryaModel();
        $data['karya'] = $model->getKarya();

        return view('jelajah_karya', $data);
    }

    
}
