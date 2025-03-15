<?php

namespace App\Controllers;

use App\Models\PesanModel;
use mysqli;

class Pesan extends BaseController
{
    protected $pesanModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
    }

    public function simpanPesan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'n_perusahaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Perusahaan tidak boleh kosong'
                    ]
                ],
                'no_hp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Hp tidak boleh kosong'
                    ]
                ],
                'subjek' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Subjek tidak boleh kosong'
                    ]
                ],
                'isi_pesan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Isi Pesan tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'n_perusahaan' => $validation->getError('n_perusahaan'),
                        'no_hp' => $validation->getError('no_hp'),
                        'subjek' => $validation->getError('subjek'),
                        'isi_pesan' => $validation->getError('isi_pesan'),
                    ]
                ];
            } else {

                $simpandata = [
                    'n_perusahaan' => $this->request->getVar('n_perusahaan'),
                    'no_hp' => $this->request->getVar('no_hp'),
                    'subjek' => $this->request->getVar('subjek'),
                    'isi_pesan' => $this->request->getVar('isi_pesan'),
                ];

                $this->pesanModel->insert($simpandata);

                $msg = [
                    'sukses' => 'Pesan Berhasil Dikirim !'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Tidak Dapat Diproses');
        }
    }
}
