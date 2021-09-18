<?php 

	include('Csrf.php');
	include '../Controllers/Controller_pegawai.php';

	$db = new Controller_pegawai();
	
	$action = $_GET['action'];

// ================================================================================================ //
	// Petugas

	if ($action == 'insertPetugas') {
		
		if(validation() == TRUE){
		    $db->insertPetugas(
		        $_POST['username'],
		        $_POST['password'],
		        $_POST['nama_petugas'],
		        $_POST['level']
			);
		}
		header("location:../Views/petugas_view.php");

	}elseif ($action == 'updatePetugas') {
		
		if(validation() == TRUE){
		    $db->updatePetugas(
		        $_POST['id_petugas'],
		        $_POST['username'],
		        $_POST['password'],
		        $_POST['nama_petugas'],
		        $_POST['level']
		    );
		}
		header("location:../Views/petugas_view.php");

	}elseif ($action == 'deletePetugas') {

		$db->deletePetugas(
		    $_GET['id']
		);
		header("location:../Views/petugas_view.php");

// ================================================================================================ //
	// Kelas

	}elseif ($action == 'insertKelas') {
		
		if(validation() == TRUE){
		    $db->insertKelas(
		        $_POST['nama_kelas'],
		        $_POST['kompetensi_keahlian']
		    );
		}
		header("location:../Views/kelas_view.php");

	}elseif ($action == 'updateKelas') {
		
		if(validation() == TRUE){
		    $db->updateKelas(
		        $_POST['id_kelas'],
		        $_POST['nama_kelas'],
		        $_POST['kompetensi_keahlian']
		    );
		}
		header("location:../Views/kelas_view.php");

	}elseif ($action == 'deleteKelas') {

		$db->deleteKelas(
		    $_GET['id']
		);
		header("location:../Views/kelas_view.php");

// ================================================================================================ //
	// SPP
	
	}elseif ($action == 'insertSpp') {
		
		if(validation() == TRUE){
		    $db->insertSpp(
		        $_POST['tahun'],
		        $_POST['nominal']
		    );
		}
		header("location:../Views/spp_view.php");

	}elseif ($action == 'updateSpp') {
		
		if(validation() == TRUE){
		    $db->updateSpp(
		        $_POST['id_spp'],
		        $_POST['tahun'],
		        $_POST['nominal']
		    );
		}
		header("location:../Views/spp_view.php");

	}elseif ($action == 'deleteSpp') {

		$db->deleteSpp(
		    $_GET['id']
		);
		header("location:../Views/spp_view.php");

// ================================================================================================ //
	// Siswa
	
	}elseif ($action == 'insertSiswa') {
		
		if(validation() == TRUE){
		    $db->insertSiswa(
		        $_POST['nisn'],
		        $_POST['nis'],
		        $_POST['nama'],
		        $_POST['id_kelas'],
		        $_POST['alamat'],
		        $_POST['no_telp'],
		        $_POST['id_spp']
		    );
		}
		header("location:../Views/siswa_view.php");

	}elseif ($action == 'updateSiswa') {
		
		if(validation() == TRUE){
		    $db->updateSiswa(
		        $_POST['id_siswa'],
		        $_POST['nisn'],
		        $_POST['nis'],
		        $_POST['nama'],
		        $_POST['id_kelas'],
		        $_POST['alamat'],
		        $_POST['no_telp'],
		        $_POST['id_spp']
		    );
		}
		header("location:../Views/siswa_view.php");

	}elseif ($action == 'deleteSiswa') {

		$db->deleteSiswa(
		    $_GET['id']
		);
		header("location:../Views/siswa_view.php");

// ================================================================================================ //
	// pembayaran
	}elseif ($action == 'insertPembayaran') {
		
		if(validation() == TRUE){
		    $db->insertPembayaran(
		        $_POST['id_petugas'],
		        $_POST['nisn'],
		        $_POST['tgl_bayar'],
		        $_POST['id_spp'],
		        $_POST['jumlah_bayar']
		    );
		}
		header("location:../Views/pembayaran_view.php");

	}elseif ($action == 'updatePembayaran') {
		
		if(validation() == TRUE){
		    $db->updatePembayaran(
		        $_POST['id_pembayaran'],
		        $_POST['id_petugas'],
		        $_POST['nisn'],
		        $_POST['tgl_bayar'],
		        $_POST['id_spp'],
		        $_POST['jumlah_bayar']
		    );
		}
		header("location:../Views/pembayaran_view.php");

	}elseif ($action == 'deletePembayaran') {

		$db->deletePembayaran(
		    $_GET['id']
		);
		header("location:../Views/pembayaran_view.php");

// ================================================================================================ //
	
	} else {
		header("location:../index.php");
	}
	
