<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'matches[password]',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required'
        ];

        $data = $this->request->getJSON(); // Ambil data JSON dari request

        if (!$this->validate($rules)) {
            return $this->response->setJSON(['error' => $validation->getErrors()]);
        }

        $userModel = new UserModel();
        $userModel->insert([
            'nama' => $data->nama,
            'email' => $data->email,
            'password' => password_hash($data->password, PASSWORD_BCRYPT),
            'tempat_lahir' => $data->tempat_lahir,
            'tanggal_lahir' => $data->tanggal_lahir
        ]);

        return $this->response->setJSON(['success' => 'Registrasi berhasil, silakan login.']);
    }

    public function login()
    {
        $userModel = new UserModel();
        $data = $this->request->getJSON(); // Ambil data JSON dari request

        $email = $data->email ?? '';
        $password = $data->password ?? '';

        if (!$email || !$password) {
            return $this->response->setJSON(['error' => 'Email dan Password harus diisi!']);
        }

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'user_email' => $user['email'],
                'user_nama' => $user['nama'],
                'user_foto' => $user['foto'],
                'user_tanggal_lahir' => $user['tanggal_lahir'],
                'user_tentang' => $user['tentang'],
                'user_instagram' => $user['instagram'],
                'user_alamat' => $user['alamat'],
                'user_tempat_lahir' => $user['tempat_lahir'],
                'user_keterampilan' => $user['keterampilan'],
                'isLoggedIn' => true
            ]);
            return $this->response->setJSON(['success' => 'Login berhasil']);
        }

        return $this->response->setJSON(['error' => 'Email atau password salah']);
    }

    public function logout()
    {
        session()->destroy();
        return $this->response->setJSON(['success' => 'Logout berhasil']);
    }


    public function updateProfile()
    {
        helper(['form']);
        $session = session();
        $userModel = new UserModel();

        // Validasi input
        $rules = [
            'nama'          => 'required',
            'email'         => 'required|valid_email',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Harap isi semua bidang dengan benar.'
            ]);
        }

        try {
            // Ambil data dari form
            $data = [
                'nama'          => $this->request->getPost('nama'),
                'email'         => $this->request->getPost('email'),
                'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'instagram'     => $this->request->getPost('instagram'),
                'alamat'        => $this->request->getPost('alamat'),
                'keterampilan'  => $this->request->getPost('keterampilan'),
                'tentang'       => $this->request->getPost('tentang')
            ];

            // Jika ada upload foto baru
            $file = $this->request->getFile('foto');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads/profile_pictures/', $newName);
                $data['foto'] = $newName;
            }

            // Update data di database
            $userModel->updateUserProfile($session->get('user_id'), $data);

            // Perbarui session dengan prefix 'user_'
            $sessionData = [
                'user_nama' => $data['nama'],
                'user_email' => $data['email'],
                'user_tempat_lahir' => $data['tempat_lahir'],
                'user_tanggal_lahir' => $data['tanggal_lahir'],
                'user_instagram' => $data['instagram'],
                'user_alamat' => $data['alamat'],
                'user_keterampilan' => $data['keterampilan'],
                'user_tentang' => $data['tentang']
            ];

            if (isset($data['foto'])) {
                $sessionData['user_foto'] = $data['foto'];
            }

            $session->set($sessionData);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Profil berhasil diperbarui'
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function nampilinFormEdit()
    {
        // Ambil data user dari session
        $userData = [
            'user_foto' => session()->get('user_foto'),
            'user_nama' => session()->get('user_nama'),
            'user_email' => session()->get('user_email'),
            'user_tempat_lahir' => session()->get('user_tempat_lahir'),
            'user_tanggal_lahir' => session()->get('user_tanggal_lahir'),
            'user_instagram' => session()->get('user_instagram'),
            'user_alamat' => session()->get('user_alamat'),
            'user_keterampilan' => session()->get('user_keterampilan'),
            'user_tentang' => session()->get('user_tentang')
        ];

        $data = [
            'title' => 'Edit Profile',
            'user' => $userData
        ];

        return view('edit_profile', $data);
    }
}
