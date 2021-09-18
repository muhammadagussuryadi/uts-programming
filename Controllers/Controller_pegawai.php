<?php 

/**
 * 
 */
class Controller_pegawai
{
	
	function __construct()
	{
		include '../Models/Model_pegawai.php';
		$this->Model_pegawai = new Model_pegawai();
	}

	// ====================================================================================================
	// petugas

	public function getPetugas()
	{
		return $this->Model_pegawai->getPetugas();
	}

	public function insertPetugas($username,$password,$nama_petugas,$level)
	{
		return $this->Model_pegawai->insertPetugas($username,$password,$nama_petugas,$level);
	}

	public function getWherePetugas($id)
	{
		return $this->Model_pegawai->getWherePetugas($id);
	}

	public function updatePetugas($id,$username,$password,$nama_petugas,$level)
	{
		return $this->Model_pegawai->updatePetugas($id,$username,$password,$nama_petugas,$level);
	}

	public function deletePetugas($id)
	{
		return $this->Model_pegawai->deletePetugas($id);
	}

	// ====================================================================================================
	// kelas

	public function getKelas()
	{
		return $this->Model_pegawai->getKelas();
	}

	public function insertKelas($nama_kelas,$kompetensi)
	{
		return $this->Model_pegawai->insertKelas($nama_kelas,$kompetensi);
	}

	public function getWhereKelas($id)
	{
		return $this->Model_pegawai->getWhereKelas($id);
	}

	public function updateKelas($id,$nama_kelas,$kompetensi)
	{
		return $this->Model_pegawai->updateKelas($id,$nama_kelas,$kompetensi);
	}

	public function deleteKelas($id)
	{
		return $this->Model_pegawai->deleteKelas($id);
	}

	// ====================================================================================================
	// spp

	public function getSpp()
	{
		return $this->Model_pegawai->getSpp();
	}

	public function insertSpp($tahun,$nominal)
	{
		return $this->Model_pegawai->insertSpp($tahun,$nominal);
	}

	public function getWhereSpp($id)
	{
		return $this->Model_pegawai->getWhereSpp($id);
	}

	public function updateSpp($id,$tahun,$nominal)
	{
		return $this->Model_pegawai->updateSpp($id,$tahun,$nominal);
	}

	public function deleteSpp($id)
	{
		return $this->Model_pegawai->deleteSpp($id);
	}

	// ====================================================================================================
	// siswa

	public function getSiswa()
	{
		return $this->Model_pegawai->getSiswa();
	}

	public function insertSiswa($nisn,$nis,$nama,$id_kelas,$alamat,$no_telp,$id_spp)
	{
		return $this->Model_pegawai->insertSiswa($nisn,$nis,$nama,$id_kelas,$alamat,$no_telp,$id_spp);
	}

	public function getWhereSiswa($id)
	{
		return $this->Model_pegawai->getWhereSiswa($id);
	}

	public function updateSiswa($id,$nisn,$nis,$nama,$id_kelas,$alamat,$no_telp,$id_spp)
	{
		return $this->Model_pegawai->updateSiswa($id,$nisn,$nis,$nama,$id_kelas,$alamat,$no_telp,$id_spp);
	}

	public function deleteSiswa($id)
	{
		return $this->Model_pegawai->deleteSiswa($id);
	}

	// ====================================================================================================
	// pembayaran

	public function getPembayaran()
	{
		return $this->Model_pegawai->getPembayaran();
	}

	public function insertPembayaran($id_petugas,$nisn,$tgl_bayar,$id_spp,$jumlah_bayar)
	{
		return $this->Model_pegawai->insertPembayaran($id_petugas,$nisn,$tgl_bayar,$id_spp,$jumlah_bayar);
	}

	public function getWherePembayaran($id)
	{
		return $this->Model_pegawai->getWherePembayaran($id);
	}

	public function updatePembayaran($id,$id_petugas,$nisn,$tgl_bayar,$id_spp,$jumlah_bayar)
	{
		return $this->Model_pegawai->updatePembayaran($id,$id_petugas,$nisn,$tgl_bayar,$id_spp,$jumlah_bayar);
	}

	public function deletePembayaran($id)
	{
		return $this->Model_pegawai->deletePembayaran($id);
	}

}