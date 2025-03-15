<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id_pesan';
    protected $useTimestamps = true;
    protected $allowedFields = ['n_perusahaan', 'no_hp', 'subjek', 'isi_pesan'];
}
