<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'nama', 'foto', 'tanggal_lahir', 'ketrampilan', 'tentang', 'instagram', 'created_at', 'alamat', 'tempat_lahir'];

    // Fungsi untuk mengambil 
    // 
    // semua data pengguna

    public function getUserHome()
    {
        return $this->limit(3)->findAll(); // Mengambil semua data dari tabel users
    }

    public function getUser()
    {
        return $this->findAll(); // Mengambil semua data dari tabel users
    }

    public function updateUserProfile($id, $data)
{
    return $this->update($id, $data);
}

}
