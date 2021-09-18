<?php 

/**
 * 
 */
class Model_pegawai
{
	
	function __construct()
	{
		include '../Config/Database.php';
		$this->db = new Database();
		$this->conn = $this->db->connect();
	}

	// ====================================================================================================
	// petugas

	public function getPetugas()
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_petugas");
	}

	public function insertPetugas($username,$password,$nama_petugas,$level)
	{
		return mysqli_query($this->conn, "INSERT INTO tbl_petugas (username,password,nama_petugas,level) VALUE ('$username','$password','$nama_petugas','$level')");
	}

	public function getWherePetugas($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_petugas WHERE id_petugas = '$id'");
	}

	public function updatePetugas($id,$username,$password,$nama_petugas,$level)
	{
		return mysqli_query($this->conn, "UPDATE tbl_petugas SET username = '$username', password = '$password', nama_petugas = '$nama_petugas', level = '$level' WHERE id_petugas = '$id'");
	}

	public function deletePetugas($id)
	{
		return mysqli_query($this->conn, "DELETE FROM tbl_petugas WHERE id_petugas = '$id'");
	}

	// ====================================================================================================
	// kelas

	public function getKelas()
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_kelas");
	}

	public function insertKelas($nama_kelas,$kompetensi)
	{
		return mysqli_query($this->conn, "INSERT INTO tbl_kelas (nama_kelas,kompetensi_keahlian) VALUE ('$nama_kelas','$kompetensi')");
	}

	public function getWhereKelas($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_kelas WHERE id_kelas = '$id'");
	}

	public function updateKelas($id,$nama_kelas,$kompetensi)
	{
		return mysqli_query($this->conn, "UPDATE tbl_kelas SET nama_kelas = '$nama_kelas', kompetensi_keahlian = '$kompetensi' WHERE id_kelas = '$id'");
	}

	public function deleteKelas($id)
	{
		return mysqli_query($this->conn, "DELETE FROM tbl_kelas WHERE id_kelas = '$id'");
	}

	// ====================================================================================================
	// spp

	public function getSpp()
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_spp");
	}

	public function insertSpp($tahun,$nominal)
	{
		return mysqli_query($this->conn, "INSERT INTO tbl_spp (tahun,nominal) VALUE ('$tahun','$nominal')");
	}

	public function getWhereSpp($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_spp WHERE id_spp = '$id'");
	}

	public function updateSpp($id,$tahun,$nominal)
	{
		return mysqli_query($this->conn, "UPDATE tbl_spp SET tahun = '$tahun', nominal = '$nominal' WHERE id_spp = '$id'");
	}

	public function deleteSpp($id)
	{
		return mysqli_query($this->conn, "DELETE FROM tbl_spp WHERE id_spp = '$id'");
	}

	// ====================================================================================================
	// siswa

	public function getSiswa()
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_siswa 
			LEFT JOIN tbl_kelas ON tbl_kelas.id_kelas = tbl_siswa.id_kelas 
			LEFT JOIN tbl_spp ON tbl_spp.id_spp = tbl_siswa.id_spp");
	}

	public function insertSiswa($nisn,$nis,$nama,$id_kelas,$alamat,$no_telp,$id_spp)
	{
		return mysqli_query($this->conn, "INSERT INTO tbl_siswa (nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) VALUE ('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')");
	}

	public function getWhereSiswa($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_siswa WHERE nisn = '$id'");
	}

	public function updateSiswa($id,$nisn,$nis,$nama,$id_kelas,$alamat,$no_telp,$id_spp)
	{
		return mysqli_query($this->conn, "UPDATE tbl_siswa SET nisn = '$nisn', nis = '$nis', nama = '$nama', id_kelas = '$id_kelas', alamat = '$alamat', no_telp = '$no_telp', id_spp = '$id_spp' WHERE nisn = '$id'");
	}

	public function deleteSiswa($id)
	{
		return mysqli_query($this->conn, "DELETE FROM tbl_siswa WHERE nisn = '$id'");
	}

	// ====================================================================================================
	// pembayaran

	public function getPembayaran()
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_pembayaran 
			LEFT JOIN tbl_petugas ON tbl_petugas.id_petugas = tbl_pembayaran.id_petugas 
			LEFT JOIN tbl_siswa ON tbl_siswa.nisn = tbl_pembayaran.nisn 
			LEFT JOIN tbl_spp ON tbl_spp.id_spp = tbl_pembayaran.id_spp
			ORDER BY tbl_pembayaran.id_pembayaran DESC
		");
	}

	public function insertPembayaran($id_petugas,$nisn,$tgl_bayar,$id_spp,$jumlah_bayar)
	{
		$tgl = date("d",strtotime($tgl_bayar));
		$bln = date("m",strtotime($tgl_bayar));
		$thn = date("Y",strtotime($tgl_bayar));
		return mysqli_query($this->conn, "INSERT INTO tbl_pembayaran (id_petugas,nisn,tgl_bayar,bulan_dibayar,tahun_dibayar,id_spp,jumlah_bayar) VALUE ('$id_petugas','$nisn','$tgl','$bln','$thn','$id_spp','$jumlah_bayar')");
	}

	public function getWherePembayaran($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM tbl_pembayaran WHERE id_pembayaran = '$id'");
	}

	public function updatePembayaran($id,$id_petugas,$nisn,$tgl_bayar,$id_spp,$jumlah_bayar)
	{
		$tgl = date("d",strtotime($tgl_bayar));
		$bln = date("m",strtotime($tgl_bayar));
		$thn = date("Y",strtotime($tgl_bayar));
		return mysqli_query($this->conn, "UPDATE tbl_pembayaran SET id_petugas = '$id_petugas', nisn = '$nisn', tgl_bayar = '$tgl', bulan_dibayar = '$bln', tahun_dibayar = '$thn', id_spp = '$id_spp', jumlah_bayar = '$jumlah_bayar' WHERE id_pembayaran = '$id'");
	}

	public function deletePembayaran($id)
	{
		return mysqli_query($this->conn, "DELETE FROM tbl_pembayaran WHERE id_pembayaran = '$id'");
	}

}