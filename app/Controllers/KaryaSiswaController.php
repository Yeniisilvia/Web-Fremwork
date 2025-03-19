<?php

namespace App\Controllers;

use App\Models\UserModel; // Pastikan menggunakan UserModel

class KaryaSiswaController extends BaseController
{
    public function index(): string
    {
        // Membuat objek model UserModel
        $model = new UserModel();
        
        // Mengambil data users dari database
        $data['users'] = $model->getUser();

        // Menampilkan view 'karya_siswa' dan mengirimkan data pengguna
        return view('karya_siswa', $data);
    }
}
