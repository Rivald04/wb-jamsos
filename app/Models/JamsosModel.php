<?php

namespace App\Models;

use CodeIgniter\Model;

class JamsosModel extends Model
{
    protected $table = 'jamsos';
    protected $primaryKey = 'id_jamsos';
    protected $useTimestamps = true;

    public function getAll()
    {
        $builder = $this->db->table('jamsos'); //->where('tahun', 2022);
        $builder->join('tahun', 'tahun.id_tahun = jamsos.id_tahun');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getJamsos($id = false)
    {
        if ($id == false) {
            return $this->getAll();
        }

        return $this->where(['id_jamsos' => $id])->first();
    }

    public function getTahun($fetch)
    {
        $builder = $this->db->table('jamsos')->where('tahun', $fetch);
        $builder->join('tahun', 'tahun.id_tahun = jamsos.id_tahun');
        $query = $builder->get();
        return $query->getResult();
    }

    // public function getFilter($builder, $request)
    // {
    //     if ($request->tahun)
    //         $builder->where('tahun', $request->tahun);
    // }
}
