<table width="100%" height="100%" border="1">
	<tr height="5%">
		<td align="center">
			<a href="petugas_view.php">Petugas</a>
			<a href="kelas_view.php">Kelas</a>
			<a href="spp_view.php">SPP</a>
			<a href="siswa_view.php">Siswa</a>
			<a href="pembayaran_view.php">Pembayaran</a>
		</td>
	</tr>
	<tr height="95%">
		<td valign="top" align="center">

			<h1>Form Kelas</h1>

			<?php include('../Config/Csrf.php'); ?>

			<?php if (base64_decode($_GET['action']) == 'add') { ?>

			<form action="../Config/Routes.php?action=insertKelas" method="POST">
			<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
				
				<table border="1">
					<tr>
						<td>Nama Kelas</td>
						<td>:</td>
						<td><input type="text" name="nama_kelas" placeholder="Masukan Nama Kelas" class="onlyAlphabet" required=""></td>
					</tr>
					<tr>
						<td>Kompetensi Keahlian</td>
						<td>:</td>
						<td><input type="text" name="kompetensi_keahlian" placeholder="Masukan Kompetensi Keahlian" class="onlyAlphabet" required=""></td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<a href="kelas_view.php">Kembali</a>
							<input type="submit" name="proses" value="Simpan">
						</td>
					</tr>
				</table>

			</form>

			<?php 	
				}elseif (base64_decode($_GET['action']) == 'edit') { 
					include '../Controllers/Controller_pegawai.php';
					$dataAll = new Controller_pegawai();
					$getData = $dataAll->getWhereKelas($_GET['id']);
					while ($data = mysqli_fetch_array($getData)) {
			?>

			<form action="../Config/Routes.php?action=updateKelas" method="POST">
			<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
			<input type="hidden" name="id_kelas" value="<?= $_GET['id'] ?>"/>

				<table border="1">
					<tr>
						<td>Nama Kelas</td>
						<td>:</td>
						<td><input type="text" name="nama_kelas" placeholder="Masukan Nama Kelas" class="onlyAlphabet" required="" value="<?= $data['nama_kelas'] ?>"></td>
					</tr>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="kompetensi_keahlian" placeholder="Masukan Kompetensi Keahlian" class="onlyAlphabet" required="" value="<?= $data['kompetensi_keahlian'] ?>"></td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<a href="kelas_view.php">Kembali</a>
							<input type="submit" name="proses" value="Simpan">
						</td>
					</tr>
				</table>

			</form>

			<?php } } ?>

		</td>
	</tr>
</table>

<?php include 'js_script.php'; ?>