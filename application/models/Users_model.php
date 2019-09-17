<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    private $users = 'users';
    private $users_level = 'users_level';

    // GLOBAL
    public function full_users()
    {
        $this->db->select('
            u.id, u.kode, u.username, u.status,
            ul.name
        ');
        $this->db->from('users AS u');
        $this->db->join('users_level AS ul', 'ul.kode = u.level_kode');
        return $this->db->get();
    }
    // GLOBAL

    // USERS
    public function get_users($kode)
    {
        if($kode == null)
        {
            $this->db->select('*');
            $this->db->from($this->users);
            return $this->db->get();
        }
        else
        {
            $this->db->select('
                u.id, u.`kode` AS users_kode, u.`username`, u.`password`, u.`status`, u.`created`, u.`updated`,
                ul.`kode` AS level_kode, ul.`name`
            ');
            $this->db->from('users AS u');
            $this->db->join('users_level AS ul', 'ul.kode = u.level_kode');
            $this->db->where('u.kode', $kode);
            return $this->db->get();
        }
    }

    public function add_users()
    {
        $post = $this->input->post();
        $this->db->set('kode', 'UUID()', FALSE);
        $data = [
            'username'          => $post['username_add'],
            'password'          => password_hash($post['password_add'], PASSWORD_BCRYPT),
            'level_kode'        => $post['level_add'],
            'status'            => $post['status_add']
        ];
        return $this->db->insert($this->users, $data);
    }

    public function update_users($kode)
    {
        $post   = $this->input->post();
        if($post['password_update'] == null)
        {
            $data   = [
                'username'      => $post['username_update'],
                'level_kode'    => $post['level_update'],
                'status'        => $post['status_update']
            ];
            $this->db->where('kode', $kode);
            return $this->db->update($this->users, $data);
        }
        else
        {
            $data   = [
                'username'      => $post['username_update'],
                'password'      => password_hash($post['password_update'], PASSWORD_BCRYPT),
                'level_kode'    => $post['level_update'],
                'status'        => $post['status_update']
            ];
            $this->db->where('kode', $kode);
            return $this->db->update($this->users, $data);
        }
    }

    public function delete_users($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->delete($this->users);
    }
    // USERS

    // USERS - LEVEL
    public function get_level($kode = NUll)
    {
        if($kode == NULL)
        {
            $this->db->select('*');
            $this->db->from($this->users_level);
            return $this->db->get();
        }
        else
        {
            $this->db->select('*');
            $this->db->from($this->users_level);
            $this->db->where('kode', $kode);
            return $this->db->get();    
        }
    }

    public function add_level()
    {
        $post   = $this->input->post();
        $this->db->set('kode', 'UUID()', FALSE);
        $data   = [
            'name'      => $post['level_add'],
        ];
        return $this->db->insert($this->users_level, $data);
    }

    public function update_level($kode)
    {
        $post   = $this->input->post();
        $data   = [
            'name'      => $post['level_update'],
        ];
        $this->db->where('kode', $kode);
        return $this->db->update($this->users_level, $data);
    }

    public function delete_level($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->delete($this->users_level);
    }
    // USERS - LEVEL
}
