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

        $userNama = $this->session->get('user_nama'); // Ambil user_nama dari session
        $data['karya'] = $karyaModel->where('nama_pembuat', $userNama)->findAll();


        return view('detail_profile_login', $data);
    }

    public function detailUser($id)
    {
        $userModel = new UserModel();
        $karyaModel = new KaryaModel();

        // Ambil data user berdasarkan ID
        $data['users'] = $userModel->find($id);

        if (!$data['users']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Users tidak ditemukan.");
        }

        // Ambil data karya berdasarkan user yang sedang login
        $userNama = $this->session->get('user_nama'); // Ambil user_nama dari session
        $data['karya'] = $karyaModel->where('nama_pembuat', $userNama)->findAll();

        return view('detail_profile', $data);
    }
}

