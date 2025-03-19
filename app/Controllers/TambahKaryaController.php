<?php

namespace App\Controllers;
use App\Models\KaryaModel;
use CodeIgniter\Controller;

class TambahKaryaController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session(); // Inisialisasi session
    }

    public function index(): string
    {
        return view('tambah_karya');
    }

    public function simpan()
    {
        helper(['form', 'url']);

        // Validasi input
        if (!$this->validate([
            'nama_karya' => 'required',
            'tanggal_dibuat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'uploaded[foto]|is_image[foto]|max_size[foto,2048]',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Data tidak valid!');
        }

        // Proses upload file
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/karya', $newName);
        } else {
            return redirect()->back()->with('error', 'Gagal mengunggah foto.');
        }

        // Ambil nama pembuat dari session
        $namaPembuat = $this->session->get('user_nama');

        // Pastikan session tidak kosong untuk menghindari error
        if (empty($namaPembuat)) {
            return redirect()->back()->with('error', 'User tidak terautentikasi.');
        }

        // Simpan ke database
        $model = new KaryaModel();
        $model->save([
            'nama_karya' => $this->request->getPost('nama_karya'),
            'nama_pembuat' => $namaPembuat,
            'tanggal_dibuat' => $this->request->getPost('tanggal_dibuat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $newName
        ]);

        return redirect()->back()->with('success', 'Karya berhasil disimpan!');
    }
}
