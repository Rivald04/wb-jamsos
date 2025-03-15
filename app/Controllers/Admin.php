<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

use App\Models\AdminJamsosModel;
use App\Models\AdminTahunModel;
use App\Models\UsersModel;

class Admin extends BaseController
{
    protected $adminJamsosModel;
    protected $adminTahunModel;
    protected $userModel;


    public function __construct()
    {
        $this->userModel = new UsersModel();
        $this->adminJamsosModel = new AdminJamsosModel();
        $this->adminTahunModel = new AdminTahunModel();
    }

    public function index()
    {
        $hitungJamsos = $this->adminJamsosModel->countAllResults();
        $hitungTahun = $this->adminTahunModel->countAllResults();
        $hitungUsers = $this->userModel->countAllResults();

        $data = [
            'title' => 'Halaman Admin',
            'jamsos' => $this->adminJamsosModel->get5Jamsos(),
            'tahun' => $this->adminTahunModel->get5Tahun(),
            'users' => $this->userModel->get5Users(),
            'hitungjamsos' => $hitungJamsos,
            'hitungtahun' => $hitungTahun,
            'hitungusers' => $hitungUsers
        ];
        return view('admin/index', $data);
    }

    public function user()
    {
        $data = [
            'title' => 'Halaman Data User',
            'users' => $this->userModel->getUsers()
        ];
        return view('admin/users/user', $data);
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        return view('admin/profile/profile', $data);
    }

    public function profileEdit()
    {
        $dataUser = $this->userModel->getUsersId(user_id());
        $data = [
            'title' => 'Edit My Profile',
            'users' => $dataUser,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/profile/editProfile', $data);
    }

    public function profileUpdate($id)
    {
        if (!$this->validate([
            'fullname' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => '{field} harus diisi!',
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
            return redirect()->to('/admin/profile/profileEdit')->withInput();
        }

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
            if ($this->request->getVar('imageLama') != 'Pdefault.svg') {
                unlink('img/' . $this->request->getVar('imageLama'));
            }
        }

        $this->userModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'user_image' => $namaImage
        ]);

        session()->setFlashdata('pesan', 'Berhasil Mengubah Profile');
        return redirect()->to('/admin/profile/profile');
    }

    public function createU()
    {
        $data = [
            'title' => 'Halaman Tambah Data User',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/users/create', $data);
    }

    public function saveU()
    {
        // validasi input
        if (!$this->validate([
            'fullname' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar!'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password harus diisi!',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/admin/users/create')->withInput();
        }

        $userMyth = new UserModel();
        $userMyth->withGroup($this->request->getVar('role'))->save([
            'fullname' => $this->request->getVar('fullname'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password_hash' => Password::hash($this->request->getVar('password')),
            'active' => 1
        ]);

        session()->setFlashdata('pesan', 'Berhasil Menambahkan User');
        return redirect()->to('/admin/users');
    }

    public function deleteU($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(' /admin/users');
    }

    public function editU($id)
    {
        $data = [
            'title' => 'Halaman Edit Data User',
            'users' => $this->userModel->getUsersId($id),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/users/edit', $data);
    }

    public function updateU($id)
    {
        $usernameLama = $this->userModel->getUsersId($this->request->getVar('id'));
        if ($usernameLama['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[users.username]';
        }

        // validasi input
        if (!$this->validate([
            'fullname' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar!'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password harus diisi!',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/admin/users/edit/' . $this->request->getVar('id'))->withInput();
        }

        $passwordLama = $this->userModel->getUsersId($this->request->getVar('id'));
        if ($this->request->getVar('password') == $passwordLama['password_hash']) {
            $rule_password = $passwordLama['password_hash'];
        } else {
            $rule_password = Password::hash($this->request->getVar('password'));
        }
        $userMyth = new UserModel();
        $userMyth->withGroup($this->request->getVar('role'))->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password_hash' => $rule_password,
            'active' => 1
        ]);

        session()->setFlashdata('pesan', 'Berhasil Mengubah Data User');
        return redirect()->to('/admin/users');
    }
}
