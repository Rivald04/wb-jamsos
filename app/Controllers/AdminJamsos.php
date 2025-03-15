<?php

namespace App\Controllers;

use App\Models\AdminJamsosModel;
use App\Models\AdminTahunModel;
use \Dompdf\Dompdf;
use TCPDF;
use \Mpdf\Mpdf;

class AdminJamsos extends BaseController
{
    protected $adminJamsosModel;
    protected $adminTahunModel;

    public function __construct()
    {
        $this->adminJamsosModel = new AdminJamsosModel();
        $this->adminTahunModel = new AdminTahunModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Data Jamsos',
            'jamsos' => $this->adminJamsosModel->getAll(),
            'tahun' => $this->adminTahunModel->findAll()
        ];
        return view('admin/jamsos/jamsos', $data);
    }

    public function filter()
    {
        $query = $this->adminTahunModel->findAll();
        $fetch = $this->request->getVar('fetchval');
        $data = [
            'title' => 'Halaman Data Jamsos',
            'jamsos' => $this->adminJamsosModel->getTahun($fetch),
            'tahun' => $query,
            'filter' => $fetch
        ];
        return view('admin/jamsos/filter', $data);
    }

    public function detailJamsos($id)
    {
        $data = [
            'title' => 'Detail Data Jaminan Sosial',
            'jamsos' => $this->adminJamsosModel->getJamsos($id)
        ];

        // jika data tidak ada di tabel
        if (empty($data['jamsos'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('id data ' . $id . ' tidak ditemukan');
        }

        return view('admin/jamsos/detailJamsos', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Jaminan Sosial',
            'tahun' => $this->adminTahunModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/jamsos/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'npp' => [
                'rules' => 'required|is_unique[jamsos.npp]',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'nama_perusahaan' => [
                'rules' => 'required|is_unique[jamsos.nama_perusahaan]',
                'errors' => [
                    'required' => 'nama perusahaan harus diisi!'
                ]
            ],
            'pembina' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'jumlah_tk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jumlah tenaga kerja harus diisi!'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,5120]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File yang anda pilih bukanlah gambar',
                    'mime_in' => 'File yang anda pilih bukanlah gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/admin/jamsos/create')->withInput();
        }

        // ambil gambar
        $fileImage = $this->request->getFile('image');
        // apakah tidak ada file yang diupload
        if ($fileImage->getError() == 4) {
            $namaImage = 'Jdefault.jpg';
        } else {
            // generate nama Image random
            $namaImage = $fileImage->getRandomName();
            // pindahkan file ke folder img
            $fileImage->move('img', $namaImage);
        }
        // ambil nama file
        // $namaImage = $fileImage->getName();

        // $id = url_title($this->request->getVar('id_jamsos'), '-', true);
        $this->adminJamsosModel->save([
            'npp' => $this->request->getVar('npp'),
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'pembina' => $this->request->getVar('pembina'),
            'alamat' => $this->request->getVar('alamat'),
            'asal_kabupaten' => $this->request->getVar('asal_kabupaten'),
            'skala' => $this->request->getVar('skala'),
            'program' => $this->request->getVar('program'),
            'jumlah_tk' => $this->request->getVar('jumlah_tk'),
            'id_tahun' => $this->request->getPost('id_tahun'),
            'image' => $namaImage
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/admin/jamsos');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $jamsos = $this->adminJamsosModel->find($id);
        // cek jika file gambarnya default
        if ($jamsos['image'] != 'Jdefault.jpg') {
            // hapus gambar
            unlink('img/' . $jamsos['image']);
        }
        $this->adminJamsosModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(' /admin/jamsos');
    }

    public function edit($id)
    {
        $jamsos = $this->adminJamsosModel->getJamsos($id);
        $data = [
            'title' => 'Form Ubah Data Jaminan Sosial',
            'jamsos' => $jamsos,
            'tahun' => $this->adminTahunModel->findAll(),
            'tampil' => $jamsos['id_tahun'],
            'validation' => \Config\Services::validation()
        ];
        return view('admin/jamsos/edit', $data);
    }

    public function update($id)
    {
        // cek npp & nama perusahaan
        $nppLama = $this->adminJamsosModel->getJamsos($this->request->getVar('id'));
        if ($nppLama['npp'] == $this->request->getVar('npp')) {
            $rule_npp = 'required';
        } else {
            $rule_npp = 'required|is_unique[jamsos.npp]';
        }

        $namaPerusahaanLama = $this->adminJamsosModel->getJamsos($this->request->getVar('id'));
        if ($namaPerusahaanLama['nama_perusahaan'] == $this->request->getVar('nama_perusahaan')) {
            $rule_namaPerusahaan = 'required';
        } else {
            $rule_namaPerusahaan = 'required|is_unique[jamsos.nama_perusahaan]';
        }

        // validasi input
        if (!$this->validate([
            'npp' => [
                'rules' => $rule_npp,
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar!'
                ]
            ],
            'nama_perusahaan' => [
                'rules' => $rule_namaPerusahaan,
                'errors' => [
                    'required' => 'nama perusahaan harus diisi!',
                    'is_unique' => 'nama perusahaan sudah terdaftar!'
                ]
            ],
            'pembina' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'jumlah_tk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jumlah tenaga kerja harus diisi!'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,5120]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File yang anda pilih bukanlah gambar',
                    'mime_in' => 'File yang anda pilih bukanlah gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/admin/jamsos/edit/' . $this->request->getVar('id'))->withInput();
        }

        // ambil gambar
        $fileImage = $this->request->getFile('image');
        // apakah tidak ada file yang diupload
        if ($fileImage->getError() == 4) {
            $namaImage = $this->request->getVar('imageLama');
        } else {
            // generate nama Image random
            $namaImage = $fileImage->getRandomName();
            // pindahkan file ke folder img
            $fileImage->move('img', $namaImage);
            // hapus file yang lama
            if ($this->request->getVar('imageLama') != 'Jdefault.jpg') {
                unlink('img/' . $this->request->getVar('imageLama'));
            }
        }
        // ambil nama file
        // $namaImage = $fileImage->getName();

        $this->adminJamsosModel->save([
            'id_jamsos' => $id,
            'npp' => $this->request->getVar('npp'),
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'pembina' => $this->request->getVar('pembina'),
            'alamat' => $this->request->getVar('alamat'),
            'asal_kabupaten' => $this->request->getVar('asal_kabupaten'),
            'skala' => $this->request->getVar('skala'),
            'program' => $this->request->getVar('program'),
            'jumlah_tk' => $this->request->getVar('jumlah_tk'),
            'id_tahun' => $this->request->getPost('id_tahun'),
            'image' => $namaImage
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/admin/jamsos');
    }

    public function printpdf()
    {
        $data = [
            'title' => 'Halaman Print Data Jamsos',
            'jamsos' => $this->adminJamsosModel->getAll()
        ];
        return view('admin/jamsos/printpdf', $data);

        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT);
        // // $pdf->SetFont('Times New Roman', '', 14, '', true);
        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        // $pdf->AddPage();
        // $pdf->writeHTML($view);
        // $this->response->setContentType('application/pdf');
        // $pdf->Output('Data_Jamsos.pdf', 'I');

        // $dompdf = new Dompdf();
        // $dompdf->loadHtml($view);
        // $dompdf->setPaper('A4', 'landscape');
        // $dompdf->render();
        // $this->response->setContentType('application/pdf');
        // $dompdf->stream("data jamsos", array("Attachment" => false));

        // $mpdf = new \Mpdf\Mpdf();
        // ini_set("pcre.backtrack_limit", "5000000");
        // $mpdf->WriteHTML($html);
        // $mpdf->Output();
    }

    public function printcsv()
    {
        $data = [
            'title' => 'Halaman Excel Data Jamsos',
            'jamsos' => $this->adminJamsosModel->getAll()
        ];
        echo view('admin/jamsos/printcsv', $data);
    }
}
