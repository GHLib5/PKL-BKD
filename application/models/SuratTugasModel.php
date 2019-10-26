<?php

class SuratTugasModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getIDST()
    {
        $query = $this->db->select_max('ID_ST')
            ->from('surattugas')
            ->get();
        return $query->result();
    }
    public function insertSurattugas($data_insert, $id)
    {
        $this->db->insert('surattugas', $data_insert);
        $data_sppd = array(
            'ID_ST' => $id,
        );
        $this->db->insert('sppd', $data_sppd);
    }

    public function insertPeserta($data_insert)
    {
        $this->db->insert('peserta', $data_insert);
    }
    public function getListST()
    {
        $query = $this->db->select("surattugas.ID_ST,DASAR,DATE_FORMAT(TANGGAL,'%d-%m-%Y') as TANGGAL,NAMA")
            ->from('surattugas')
            ->join('peserta', 'surattugas.ID_ST=peserta.ID_ST')
            ->join('pegawai', 'pegawai.NIP=peserta.NIP')
            ->where('peserta.SEBAGAI', 'Kepala')
            ->get();

        return $query->result();
    }
    public function getST($id)
    {
        $query = $this->db->select("surattugas.ID_ST,DASAR,TUJUAN,TANGGAL,peserta.NIP,SEBAGAI,NAMA,PANGKAT, GOLONGAN, JABATAN")
            ->from('surattugas')
            ->join('peserta', 'surattugas.ID_ST=peserta.ID_ST')
            ->join('pegawai', 'pegawai.NIP=peserta.NIP')
            ->where('surattugas.ID_ST', $id)
            ->order_by('SEBAGAI', 'ASC')
            ->order_by('GOLONGAN', 'ASC')
            ->get();
        return $query->result();
    }
    public function getPeserta($id)
    {
        $query = $this->db->select("NAMA,peserta.NIP, peserta.ID_PESERTA,sppd.ID_SPPD,SEBAGAI")
            ->from('pegawai')
            ->join('peserta', 'peserta.NIP = pegawai.NIP')
            ->join('sppd', 'sppd.ID_ST = peserta.ID_ST')
            ->where('sppd.ID_ST', $id)
            ->get();

        return $query->result();
    }
}