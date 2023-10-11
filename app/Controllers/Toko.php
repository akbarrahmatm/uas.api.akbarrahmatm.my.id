<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Toko extends BaseController
{

    use ResponseTrait;

    public function list()
    {
        $data = [
            'data' => $this->TokoModel->getData()
        ];

        return $this->respond($data, 200);
    }
    public function detail($id)
    {
        $data = [
            'data' => $this->TokoModel->getDataById($id)
        ];

        return $this->respond($data, 200);
    }
    public function add()
    {
        if(!$this->validate([
            'nama_toko' => 'required',
            'alamat_toko' => 'required',
            'bujur' => 'required',
            'lintang' => 'required',
            'fitur_minuman_dingin' => 'required',
            'fitur_es_krim' => 'required',
            'fitur_gas_galon' => 'required',
            'fitur_bensin' => 'required',
            'fitur_pulsa' => 'required'
        ])){
            $respond = [
                'error' => $this->validator->getErrors()
            ];
            
            return $this->respond($respond, 400);

        }else{
            $data = [
                'nama_toko' => $this->request->getVar('nama_toko'),
                'alamat_toko' => $this->request->getVar('alamat_toko'),
                'bujur' => $this->request->getVar('bujur'),
                'lintang' => $this->request->getVar('lintang'),
                'fitur_minuman_dingin' => $this->request->getVar('fitur_minuman_dingin'),
                'fitur_es_krim' => $this->request->getVar('fitur_es_krim'),
                'fitur_gas_galon' => $this->request->getVar('fitur_gas_galon'),
                'fitur_bensin' => $this->request->getVar('fitur_bensin'),
                'fitur_pulsa' => $this->request->getVar('fitur_pulsa'),
            ];

            $query = $this->TokoModel->insertData($data);

            if($query != 0){
                $respond = [
                    'message' => 'Toko berhasil ditambahkan'
                ];

                return $this->respond($respond, 200);
            }else{
                $respond = [
                    'message' => 'Toko gagal ditambahkan'
                ];

                return $this->respond($respond, 400);
            }
            

        }


    }
    public function update()
    {
        if(!$this->validate([
            'id_toko' => 'required'
        ])){

            $respond = [
                'error' => $this->validator->getErrors()
            ];
            
            return $this->respond($respond, 400);

        }else{

            $data = [
                'nama_toko' => $this->request->getVar('nama_toko'),
                'alamat_toko' => $this->request->getVar('alamat_toko'),
                'bujur' => $this->request->getVar('bujur'),
                'lintang' => $this->request->getVar('lintang'),
                'fitur_minuman_dingin' => $this->request->getVar('fitur_minuman_dingin'),
                'fitur_es_krim' => $this->request->getVar('fitur_es_krim'),
                'fitur_gas_galon' => $this->request->getVar('fitur_gas_galon'),
                'fitur_bensin' => $this->request->getVar('fitur_bensin'),
                'fitur_pulsa' => $this->request->getVar('fitur_pulsa'),
            ];

            $id = $this->request->getVar('id_toko');

            $query = $this->TokoModel->updateData($data, $id);

            if($query != 0){
                $respond = [
                    'message' => 'Toko berhasil diupdate'
                ];

                return $this->respond($respond, 200);
            }else{
                $respond = [
                    'message' => 'Toko gagal diupdate'
                ];

                return $this->respond($respond, 400);
            }

        }
    }

    public function delete()
    {
        if(!$this->validate([
            'id_toko' => 'required'
        ])){

            $respond = [
                'error' => $this->validator->getErrors()
            ];
            
            return $this->respond($respond, 400);

        }else{


            $id = $this->request->getVar('id_toko');

            $query = $this->TokoModel->deleteData($id);

            if($query != 0){
                $respond = [
                    'message' => 'Toko berhasil dihapus'
                ];

                return $this->respond($respond, 200);
            }else{
                $respond = [
                    'message' => 'Toko gagal dihapus'
                ];

                return $this->respond($respond, 400);
            }

        }
    }
    public function streetview($id)
    {
        $data = [
            'data' => $this->TokoModel->getDataById($id)[0]
        ];

        return view('streetview', $data);
    }

}
