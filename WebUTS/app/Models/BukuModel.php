<?php
namespace App\Models;
use CodeIgniter\Model;

class BukuModel extends Model{
    protected $table = 'buku';
    protected $primary = 'id';
    protected $useTimestamps = True;
    protected $allowedFields = ['judul','slug','penulis','penerbit','sinopsis','cover','nomor_pinjam','nama_pinjam','status'];
    
    public function search ($keyword)
    {
      return $this->table('buku')->like('judul',$keyword)-> orLike('nomor_pinjam',$keyword);
    }

    public function getBuku ($slug = false)
    {
        if($slug == false){
            return $this ->findAll();
        }
        return $this->where(['slug'=>$slug])->first();
    }
}