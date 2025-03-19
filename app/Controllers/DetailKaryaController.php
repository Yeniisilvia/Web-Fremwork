<?php

namespace App\Controllers;
use App\Models\KaryaModel;

class DetailKaryaController extends BaseController
{
    public function index($id)
    {
        $model = new KaryaModel();
        $data['karya'] = $model->find($id);

        if (!$data['karya']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Karya tidak ditemukan.");
        }

        return view('detail_karya', $data);
    }
}
