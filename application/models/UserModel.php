<?php

class UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function regist()
    {
        $data = [
            // 'ID_BIDANG' => htmlspecialchars(''),
            // 'NAMA_BIDANG' => htmlspecialchars($this->input->post('fullName', true)),
            'ID_ADM' => htmlspecialchars($this->input->post('fullName', true)),
            'PASSWORD' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        ];
        $this->db->insert('admin', $data);
    }

    public function datalogin()
    {
        $data = $this->db->get_where('bidang', ['NAMA_BIDANG' => $this->session->userdata('username')])->row_array();
        return $data;
    }
    function getPassword($idbidang)
    {
        $query = $this->db->select("PASSWORD")
            ->from('bidang')
            ->where('ID_BIDANG', $idbidang)
            ->get();
        $pass = $query->result();
        return $pass[0]->PASSWORD;
    }
    public function update($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function read($where, $table)
    {
        return $this->db->get_where($table, $where)->result();
    }

    function insertData($table, $data_insert)
    {
        $this->db->insert($table, $data_insert);
    }

}