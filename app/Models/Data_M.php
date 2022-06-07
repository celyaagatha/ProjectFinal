<?php

namespace App\Models;

use CodeIgniter\Model;

class Data_M extends Model
{
    protected $table = 'list_data';

    public function getdata_divisi1() 
    {
        $query = $this->db->query("SELECT * FROM list_data WHERE divisi_id LIKE 1 ORDER BY tanggal DESC");
        $result = [];
        if ($query) {
            $result = $query->getResult();
        }
        return $result;
    }

    public function getdata_divisi2() 
    {
        $query = $this->db->query("SELECT * FROM list_data WHERE divisi_id LIKE 2 ORDER BY tanggal DESC");
        $result = [];
        if ($query) {
            $result = $query->getResult();
        }
        return $result;
    }

    public function getdata_divisi3() 
    {
        $query = $this->db->query("SELECT * FROM list_data WHERE divisi_id LIKE 3 ORDER BY tanggal DESC");
        $result = [];
        if ($query) {
            $result = $query->getResult();
        }
        return $result;
    }

    public function getdata_divisi4() 
    {
        $query = $this->db->query("SELECT * FROM list_data WHERE divisi_id LIKE 4 ORDER BY tanggal DESC");
        $result = [];
        if ($query) {
            $result = $query->getResult();
        }
        return $result;
    }

    public function getdata_divisi5() 
    {
        $query = $this->db->query("SELECT * FROM list_data WHERE divisi_id LIKE 5 ORDER BY tanggal DESC");
        $result = [];
        if ($query) {
            $result = $query->getResult();
        }
        return $result;
    }

    public function simpanData($table,$data)
    {
        $simpan = $this->db->table($table)->insert($data);

        return true;
    }

    public function findData($table,$id)
    {
        $this->db->table($table)->find($id);
        return true;
    }

    public function hapusData($table,$where)
    {
        $this->db->table($table)->delete($where);
        return true;
    }

    function detailData($id)
    {
        $sql = "SELECT * FROM list_data WHERE id='$id'";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();

        return $data;
    }

    public function cari($keyword) {
        return $this->table('list_data')->like('data_name', $keyword);
    }
}