<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    private $users = 'users';
    private $users_level = 'users_level';

    // GLOBAL
    public function full_users()
    {
        $this->db->select('
            ul.id, ul.name AS level_name,
            u.id AS users_id, u.username, u.password, u.level_id, u.status
        ');
        $this->db->from('users_level AS ul');
        $this->db->join('users AS u', 'u.level_id = ul.id');
        return $this->db->get();
    }
    // GLOBAL

    // USERS
    public function get_users($id)
    {
        if($id == null)
        {
            $this->db->select('*');
            $this->db->from($this->users);
            return $this->db->get();
        }
        else
        {
            $this->db->select('
                ul.id, ul.name AS level_name,
                u.id AS users_id, u.username, u.password, u.level_id, u.status, u.created, u.updated
            ');
            $this->db->from('users_level AS ul');
            $this->db->join('users AS u', 'u.level_id = ul.id');
            $this->db->where('u.id', $id);
            return $this->db->get();
        }
    }

    public function add_users()
    {
        $post = $this->input->post();
        $data = [
            'username'          => $post['username_add'],
            'password'          => password_hash($post['password_add'], PASSWORD_BCRYPT),
            'level_id'          => $post['level_add'],
            'status'            => $post['status_add']
        ];
        return $this->db->insert($this->users, $data);
    }

    public function update_users($id)
    {
        $post   = $this->input->post();
        if($post['password_update'] == null)
        {
            $data   = [
                'username'      => $post['username_update'],
                'level_id'      => $post['level_update'],
                'status'        => $post['status_update']
            ];
            $this->db->where('id', $id);
            return $this->db->update($this->users, $data);
        }
        else
        {
            $data   = [
                'username'      => $post['username_update'],
                'password'      => password_hash($post['password_update'], PASSWORD_BCRYPT),
                'level_id'      => $post['level_update'],
                'status'        => $post['status_update']
            ];
            $this->db->where('id', $id);
            return $this->db->update($this->users, $data);
        }
    }

    public function delete_users($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->users);
    }
    // USERS

    // USERS - LEVEL
    public function get_level()
    {
        $this->db->select('id, name');
        $this->db->from($this->users_level);
        return $this->db->get();
    }
    // USERS - LEVEL
}
