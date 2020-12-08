<?php namespace App\Controllers;
use App\Models\BukuModel;

class libcontrol extends BaseController
{
	protected $bukuModel; //OOP biar bisa di panggil disemua kelas

	public function __construct(){
		$this->bukuModel = new BukuModel(); //agar penulisan bisa sekali saja
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/login');
	}

	public function index()
	{
		if(!session()->get('logged_in')){
			return redirect()->to('/login');
		} else {
			$data=[
				'title' => 'Perpustakaan Bengal',
				'buku'=>$this->bukuModel->getBuku()
			];
			echo view('layout/head',$data);
			echo view('content');
			echo view('layout/footer');
		}
	}

	public function about()
	{
		$data=[
			'title' => 'About',
			'buku'=>$this->bukuModel->getBuku()
		];
		echo view('layout/head',$data);
		echo view('about');
		echo view('layout/footer');
	}

	public function pinjam()
	{
		$keyword =$this->request->getVar('keyword');
		if($keyword){

			$buku=$this->bukuModel->search($keyword);
		}else{
			$buku=$this->bukuModel;
		}
		
		$data=[
			'title'=> 'Data Pinjam',
			'buku'=>$this->bukuModel->getBuku()
		];

		if(session()->get('logged_in')){
			if(session()->get('user_level') == 1){
				echo view('layout/head',$data);
				echo view('admin/pinjam');
				echo view('layout/footer');
			} else {
				return redirect()->to('/');
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function buku()
	{
		$keyword =$this->request->getVar('keyword');
		if($keyword){
			$buku=$this->bukuModel->search($keyword);
		}else{
			$buku=$this->bukuModel;
		}
		
		$data=[
			'title'=> 'Lihat Buku',
			'buku'=>$this->bukuModel->getBuku()
		];

		echo view('layout/head',$data);
		echo view('/buku/buku');
		echo view('layout/footer');
	}
	
	public function bukusearch()
	{
		$keyword =$this->request->getVar('keyword');
		if($keyword){

			$buku=$this->bukuModel->search($keyword);
		}else{
			$buku=$this->bukuModel;
		}
		
		$data=[
			'title'=> 'Lihat Buku',
			'buku'=>$buku->getBuku()
		];

		echo view('layout/head',$data);
		echo view('buku/bukusearch');
		echo view('layout/footer');
	}

	public function admsearch()
	{
		$keyword =$this->request->getVar('keyword');
		if($keyword){

			$buku=$this->bukuModel->search($keyword);
		}else{
			$buku=$this->bukuModel;
		}
		
		$data=[
			'title'=> 'Lihat Buku',
			'buku'=>$buku->getBuku()
		];

		echo view('layout/head',$data);
		echo view('admin/admsearch');
		echo view('layout/footer');
	}
	
	public function detail($slug)
	{
		$data = [
			'title'=>'Detail Buku',
			'buku'=> $this->bukuModel->getBuku($slug)
		];
		
		if(empty($data['buku']))
		{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Buku "'. $slug. '" tidak ditemukan.');
		}
		
		echo view('layout/head',$data);
		echo view ('/buku/detail',$data);
		echo view('layout/footer');
	}

	public function detailadm($slug)
	{
		$data = [
			'title'=>'Detail Peminjaman',
			'buku'=> $this->bukuModel->getBuku($slug)
		];
		
		if(empty($data['buku']))
		{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Buku "'. $slug. '" tidak ditemukan.');
		}
		
		echo view('layout/head',$data);
		echo view ('/admin/detailadm',$data);
		echo view('layout/footer');
	}
	
	public function create()
	{
		$data = [
			'title'=>'Tambah Data',
			'validation'=>\Config\Services::validation()
		];
		echo view('layout/head',$data);
		echo view ('admin/create',$data);
		echo view('layout/footer');
	}
	
	public function save() //input
	{
		if (!$this->validate([
			'judul' => 'required|is_unique[buku.judul]',
			'penulis' => 'required[buku.penulis]',
			'penerbit' => 'required[buku.penerbit]',
			'sinopsis' => 'required[buku.sinopsis]',
			'status' => 'required[buku.status]',
			'cover' => 'max_size[cover,5000]|is_image[cover]'
		])){
			return redirect()->to ('/admin/create')->withInput();
		}
		//ambil gambar
		$filecover= $this->request->getFile('cover');
		//apakah tidak ada gambar?
		if($filecover->getError() == 4) {
			$namacover= 'nobook.jpg';
		} else {
			//file ke folder img
			$filecover->move('img');
			//ambil nama file
			$namacover = $filecover->getname();
		}
		$slug= url_title($this->request->getVar('judul'),'-',true);
		$this->bukuModel->save([
			'judul'=> $this->request->getVar('judul'),
			'slug'=> $slug,
			'penulis'=> $this->request->getVar('penulis'),
			'penerbit'=> $this->request->getVar('penerbit'),
			'sinopsis'=> $this->request->getVar('sinopsis'),
			'nomor_pinjam'=> $this->request->getVar('nomor_pinjam'),
			'nama_pinjam'=> $this->request->getVar('nama_pinjam'),
			'status'=> $this->request->getVar('status'),
			'cover'=> $namacover
			]);
		session()->setFlashdata('pesan','Data berhasil ditambahkan.');
		return redirect()->to('/admin');
	}
		
	public function delete ($id){
		//cari gambar
		$buku=$this->bukuModel->find($id);
		//cek gambar default atau bukan
		if($buku['cover']!= 'nobook.jpg'){
			//hapus gambar
			unlink('img/' . $buku['cover']);
		}
		$this->bukuModel->delete($id);
		session()->setFlashdata('pesan','Data berhasil dihapus.');
		return redirect()->to('/admin');
	}
	
	public function edit ($slug){
		$data = [
			'title'=>'Edit Data',
			'validation'=>\Config\Services::validation(),
			'buku'=>$this->bukuModel->getBuku($slug)
		];
		echo view('layout/head',$data);
		echo view ('admin/edit',$data);
		echo view('layout/footer');
	}

	public function update ($id)
	{
		//cek judul
		$bukuOld= $this->bukuModel->getBuku($this->request->getVar('slug'));
		if($bukuOld['judul']== $this-> request->getVar('judul')){
			$rule_judul ='required';
		} else {
			$rule_judul ='required|is_unique[buku.judul]';
		}
		if(!$this->validate([
			'judul' => [
				'rules'=> $rule_judul
			],
			'penulis' => 'required[buku.penulis]',
			'penerbit' => 'required[buku.penerbit]',
			'sinopsis' => 'required[buku.sinopsis]',
			'status' => 'required[buku.status]',
			'cover' => 'max_size[cover,5000]|is_image[cover]'
			])){
				return redirect()->to ('/admin/edit/' . $this->request->getVar('slug'))->withInput();
			}
		$filecover =$this->request->getFile('cover');
		//cek gambar, tetap atau tidak
		if($filecover->getError()==4){
			$namacover=$this->request->getVar('coverLama');
		} else {
			//ambil nama file
			$namacover = $filecover->getname();
			//file ke folder img
			$filecover->move('img', $namacover);
			unlink('img/' . $this->request->getVar('coverLama'));
		}
		
		$slug= url_title($this->request->getVar('judul'),'-',true);
		$this->bukuModel->save([
			'id'=> $id,
			'judul'=> $this->request->getVar('judul'),
			'slug'=> $slug,
			'penulis'=> $this->request->getVar('penulis'),
			'penerbit'=> $this->request->getVar('penerbit'),
			'sinopsis'=> $this->request->getVar('sinopsis'),
			'nomor_pinjam'=> $this->request->getVar('nomor_pinjam'),
			'nama_pinjam'=> $this->request->getVar('nama_pinjam'),
			'status'=> $this->request->getVar('status'),
			'cover'=> $namacover
			]);
		session()->setFlashdata('pesan','Data berhasil diubah.');
			return redirect()->to('/admin');
	}
}