<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryaModel extends Model
{
    protected $table = 'karya';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_pembuat', 'nama_karya', 'tanggal_dibuat', 'deskripsi', 'foto'];

    public function getKaryaHome()
    {
        return $this->limit(2)->findAll(); // Mengambil semua data dari tabel users
    }

    public function getKarya()
    {
        return $this->findAll(); // Mengambil semua data dari tabel karya
    }
}
