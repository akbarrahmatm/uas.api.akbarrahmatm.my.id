<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_produk','nama_produk','foto_produk','harga_produk','id_toko'];
    
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getDataById($id)
    {
        $this->builder->select('id_produk,nama_produk,foto_produk,harga_produk,id_toko');
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
        $this->builder->update($data, ['id_produk' => $id]);

        return $this->db->affectedRows();
    }

    public function deleteData($id)
    {
        $this->builder->delete(['id_produk' => $id]);

        return $this->db->affectedRows();
    }
}
