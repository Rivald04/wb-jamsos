<?php

namespace App\Controllers;

use App\Models\JamsosModel;
use App\Models\TahunModel;

class Jamsos extends BaseController
{
    protected $jamsosModel;
    protected $tahunModel;

    public function __construct()
    {
        $this->jamsosModel = new JamsosModel();
        $this->tahunModel = new TahunModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Data Jaminan Sosial',
            'jamsos' => $this->jamsosModel->getAll(),
            'tahun' => $this->tahunModel->findAll()
        ];

        return view('jamsos/index', $data);
    }

    public function filter()
    {
        $query = $this->tahunModel->findAll();
        $fetch = $this->request->getVar('fetchval');
        $data = [
            'title' => 'Halaman Data Jamsos',
            'jamsos' => $this->jamsosModel->getTahun($fetch),
            'tahun' => $query,
            'filter' => $fetch
        ];
        return view('jamsos/filter', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Jaminan Sosial',
            'jamsos' => $this->jamsosModel->getJamsos($id)
        ];

        // jika data tidak ada di tabel
        if (empty($data['jamsos'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('id data ' . $id . ' tidak ditemukan');
        }

        return view('jamsos/detail', $data);
    }


    // public function custom_filter()
    // {
    //     $db = db_connect();
    //     $builder = $db->table('jamsos')->select('nama_perusahaan, tahun');

    //     return DataTable::of($builder)
    //         ->filter(function ($builder, $request) {

    //             if ($request->tahun)
    //                 $builder->where('tahun', $request->tahun);
    //         })
    //         ->toJson();
    // }
}
