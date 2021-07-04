<?php

namespace App\Models;

use CodeIgniter\Model;

class akunModel extends Model
{

    protected $useTimestamps = true;


    public function getAkun()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get()->getResult();

        return $query;
    }
}
