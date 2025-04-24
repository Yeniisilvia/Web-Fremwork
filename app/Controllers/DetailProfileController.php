<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KaryaModel;

class DetailProfileController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session(); // Inisialisasi session
    }

    public function index(): string
    {
        $karyaModel = new KaryaModel();
        $userModel = new UserModel();

        $userId = $this->session->get('user_id');

        // Ambil data user berdasarkan nama
        $user = $userModel->where('id', $userId)->first();

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User tidak ditemukan.");
        }

        $data['user'] = $user; // Kirim data user ke view
        $data['karya'] = $karyaModel->where('id', $userId)->findAll();

        return view('detail_profile_login', $data);
    }

    public function detailUser($id)
    {
        $userModel = new UserModel();
        $karyaModel = new KaryaModel();

        // Ambil data user berdasarkan ID
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User tidak ditemukan.");
        }

        // Ambil data karya berdasarkan nama user dari data user yang ditemukan
        $userNama = $data['user']['nama'];
        $data['karya'] = $karyaModel->where('nama_pembuat', $userNama)->findAll();

        return view('detail_profile', $data);
    }
}
