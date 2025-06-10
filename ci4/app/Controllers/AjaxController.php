<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArtikelModel;

class AjaxController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Halaman AJAX'
        ];
        return view('ajax/index', $data);
    }


    public function getData()
    {
        $model = new \App\Models\ArtikelModel();
        $q = $this->request->getGet('q');
        $kategori_id = $this->request->getGet('kategori_id');

        $data = $model->filterArtikel($q, $kategori_id);
        return $this->response->setJSON($data);
    }



    public function delete($id)
    {
        $model = new \App\Models\ArtikelModel();
        $model->delete($id);
        return $this->response->setJSON(['status' => 'OK']);
    }



    public function create()
    {
        $model = new \App\Models\ArtikelModel();

        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'status' => $this->request->getPost('status'),
            'id_kategori' => $this->request->getPost('id_kategori')
        ];

        $model->insert($data);

        return redirect()->to(base_url('/admin/artikel'));
    }


    public function update($id)
    {
        $model = new \App\Models\ArtikelModel();

        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'status' => $this->request->getPost('status'),
            'id_kategori' => $this->request->getPost('id_kategori')
        ];

        $model->update($id, $data);
        return $this->response->setJSON(['status' => 'updated']);
    }

    public function formTambah()
    {
        $kategori = model('KategoriModel')->findAll(); 
        return view('ajax/form', ['kategori' => $kategori]);
    }

    public function formEdit($id)
    {
        $model = new \App\Models\ArtikelModel();
        $kategori = model('KategoriModel')->findAll();
        $artikel = $model->find($id);

        return view('ajax/form', ['kategori' => $kategori, 'artikel' => $artikel]);
    }


}
