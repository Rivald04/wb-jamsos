<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminTahunModel extends Model
{
    protected $table = 'tahun';
    protected $primaryKey = 'id_tahun';
    protected $useTimestamps = true;
    protected $allowedFields = ['tahun'];

    public function get5Tahun()
    {
        $query = $this->db->table('tahun')->orderBy('id_tahun', "DESC")->limit(5)->get()->getResultArray();
        return $query;
    }
}
