<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Produk extends BaseController
{
    use ResponseTrait;

    public function list($id)
    {
        $data = [
            'data' => $this->ProdukModel->getDataById($id)
        ];

        return $this->respond($data, 200);
    }
    public function add()
    {
        if(!$this->validate([
            'nama_produk' => 'required',
            'foto_produk' => 'required',
            'harga_produk' => 'required',
            'id_toko' => 'required',
        ])){
            $respond = [
                'error' => $this->validator->getErrors()
            ];
            
            return $this->respond($respond, 400);

        }else{
            $data = [
                'nama_produk' => $this->request->getVar('nama_produk'),
                'foto_produk' => $this->request->getVar('foto_produk'),
                'harga_produk' => $this->request->getVar('harga_produk'),
                'id_toko' => $this->request->getVar('id_toko')
            ];

            $query = $this->ProdukModel->insertData($data);

            if($query != 0){
                $respond = [
                    'message' => 'Produk berhasil ditambahkan'
                ];

                return $this->respond($respond, 200);
            }else{
                $respond = [
                    'message' => 'Produk gagal ditambahkan'
                ];

                return $this->respond($respond, 400);
            }
        }
    }
    public function update()
    {
        if(!$this->validate([
            'id_produk' => 'required'
        ])){

            $respond = [
                'error' => $this->validator->getErrors()
            ];
            
            return $this->respond($respond, 400);

        }else{

            $data = [
                'nama_produk' => $this->request->getVar('nama_produk'),
                'foto_produk' => $this->request->getVar('foto_produk'),
                'harga_produk' => $this->request->getVar('harga_produk'),
                'id_toko' => $this->request->getVar('id_toko')
            ];

            $id = $this->request->getVar('id_produk');

            $query = $this->ProdukModel->updateData($data, $id);

            if($query != 0){
                $respond = [
                    'message' => 'Produk berhasil diupdate'
                ];

                return $this->respond($respond, 200);
            }else{
                $respond = [
                    'message' => 'Produk gagal diupdate'
                ];

                return $this->respond($respond, 400);
            }

        }
    }
    public function delete()
    {
        if(!$this->validate([
            'id_produk' => 'required'
        ])){

            $respond = [
                'error' => $this->validator->getErrors()
            ];
            
            return $this->respond($respond, 400);

        }else{


            $id = $this->request->getVar('id_produk');

            $query = $this->ProdukModel->deleteData($id);

            if($query != 0){
                $respond = [
                    'message' => 'Produk berhasil dihapus'
                ];

                return $this->respond($respond, 200);
            }else{
                $respond = [
                    'message' => 'Produk gagal dihapus'
                ];

                return $this->respond($respond, 400);
            }

        }
    }
}
