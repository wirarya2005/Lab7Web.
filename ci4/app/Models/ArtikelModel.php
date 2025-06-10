<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar', 'id_kategori'];

    public function getArtikelDenganKategori()
    {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori')
            ->get()
            ->getResultArray();
    }

    public function filterArtikel($q = '', $kategori_id = '')
    {
        $builder = $this->db->table('artikel');
        $builder->select('artikel.*, kategori.nama_kategori');
        $builder->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

        if ($q) {
            $builder->groupStart()
                ->like('judul', $q)
                ->orLike('isi', $q)
                ->groupEnd();
        }

        if ($kategori_id) {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        return $builder->get()->getResultArray();
    }

}
