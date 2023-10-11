<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table            = 'toko';
    protected $primaryKey       = 'id_toko';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_toko','nama_toko','alamat_toko','bujur','lintang','fitur_minuman_dingin','fitur_es_krim','fitur_gas_galon','fitur_bensin','fitur_pulsa', 'tampilan_jalan'];
    
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getData()
    {
        $this->builder->select('id_toko,nama_toko,alamat_toko,bujur,lintang');
        $query = $this->builder->get();

        return $query->getResultArray();
    }

    public function getDataById($id)
    {
        $this->builder->select('id_toko,nama_toko,alamat_toko,bujur,lintang,fitur_minuman_dingin,fitur_es_krim,fitur_gas_galon,tampilan_jalan,fitur_bensin,fitur_pulsa');
        $query = $this->builder->getWhere(['id_toko' => $id]);

        return $query->getResultArray();
    }

    public function insertData($data)
    {
        $this->builder->insert($data);

        return $this->db->affectedRows();
    }

    public function updateData($data, $id)
    {
        $this->builder->update($data, ['id_toko' => $id]);

        return $this->db->affectedRows();
    }

    public function deleteData($id)
    {
        $this->builder->delete(['id_toko' => $id]);

        return $this->db->affectedRows();
    }

}
