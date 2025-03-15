<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'username', 'email', 'password_hash', 'active', 'user_image'];

    public function getUsers()
    {
        return $this->select('users.id, fullname, username, email, user_image, gs.group_id, g.name group_name')
            ->join('auth_groups_users gs', 'users.id=gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')
            ->findAll();
    }

    public function getUsersId($id = false)
    {
        if ($id == false) {
            return $this->getUsers();
        }

        return $this->where(['users.id' => $id])->first();
    }

    public function get5Users()
    {
        $query = $this->db->table('users')->orderBy('id', "DESC")->limit(5)->get()->getResultArray();
        return $query;
    }
}
