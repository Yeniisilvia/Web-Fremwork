<?php

namespace App\Controllers;
use App\Models\KaryaModel;
use CodeIgniter\Controller;

class EditKaryaController extends BaseController
{
    public function index($id)
    {
        $model = new KaryaModel();
        $data['karya'] = $model->find($id);

        if (!$data['karya']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Karya tidak ditemukan.");
        }

        return view('edit_karya', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        // Validasi input
        if (!$this->validate([
            'nama_karya' => 'required',
            'tanggal_dibuat' => 'required',
            'deskripsi' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Data tidak valid!');
        }

        $model = new KaryaModel();
        $karya = $model->find($id);

        if (!$karya) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Karya tidak ditemukan.");
        }

        // Cek apakah ada file yang diunggah
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            // Hapus foto lama jika ada
            if (!empty($karya['foto']) && file_exists('uploads/karya/' . $karya['foto'])) {
                unlink('uploads/karya/' . $karya['foto']);
            }

            // Simpan foto baru
            $newName = $file->getRandomName();
            $file->move('uploads/karya', $newName);
        } else {
            // Jika tidak ada file baru, gunakan foto lama
            $newName = $karya['foto'];
        }

        // Simpan perubahan ke database
        $model->update($id, [
            'nama_karya' => $this->request->getPost('nama_karya'),
            'nama_pembuat' => $this->request->getPost('nama_pembuat'),
            'tanggal_dibuat' => $this->request->getPost('tanggal_dibuat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $newName
        ]);

        return redirect()->back()->with('success', 'Karya berhasil diperbarui!');
    }

    public function delete($id)
{
    $model = new KaryaModel();
    $karya = $model->find($id);

    if (!$karya) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Karya tidak ditemukan.");
    }

    // Hapus file gambar jika ada
    if (!empty($karya['foto']) && file_exists('uploads/karya/' . $karya['foto'])) {
        unlink('uploads/karya/' . $karya['foto']);
    }

    // Hapus data dari database
    $model->delete($id);

    return redirect()->back()->with('success', 'Karya berhasil dihapus!');
}

}
