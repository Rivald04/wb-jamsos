<?php

namespace App\Controllers;

use App\Models\AdminTahunModel;

class AdminTahun extends BaseController
{
    protected $adminTahunModel;

    public function __construct()
    {
        $this->adminTahunModel = new AdminTahunModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Data Tahun',
            'tahun' => $this->adminTahunModel->findAll(),
        ];
        return view('admin/tahun/tahun', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Tahun',
            'tahun' => $this->adminTahunModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/tahun/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'tahun' => [
                'rules' => 'required|is_unique[tahun.tahun]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar!'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/admin/tahun/create')->withInput();
        }

        $this->adminTahunModel->save([
            'tahun' => $this->request->getVar('tahun')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/admin/tahun');
    }

    public function delete($id)
    {
        $this->adminTahunModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(' /admin/tahun');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Tahun',
            'tahun' => $this->adminTahunModel->findAll($id),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/tahun/edit', $data);
    }

    public function update($id)
    {

        // validasi input
        if (!$this->validate([
            'tahun' => [
                'rules' => 'required|is_unique[tahun.tahun]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar!'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/admin/tahun/edit' . $this->request->getVar('id_tahun'))->withInput();
        }

        $this->adminTahunModel->save([
            'id_tahun' => $id,
            'tahun' => $this->request->getVar('tahun')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/admin/tahun');
    }
}
