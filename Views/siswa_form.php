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

			<h1>Form Siswa</h1>

			<?php 
				include('../Config/Csrf.php'); 
				include '../Controllers/Controller_pegawai.php';
				$dataAll = new Controller_pegawai();
				$kelasAll = $dataAll->getKelas();
				$sppAll = $dataAll->getSpp();
			?>

			<?php if (base64_decode($_GET['action']) == 'add') { ?>

			<form action="../Config/Routes.php?action=insertSiswa" method="POST">
			<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
				
				<table border="1">
					<tr>
						<td>NISN</td>
						<td>:</td>
						<td><input type="text" name="nisn" placeholder="Masukan NISN" required="" class="onlyAlphabet" maxlength="10"></td>
					</tr>
					<tr>
						<td>NIS</td>
						<td>:</td>
						<td><input type="text" name="nis" placeholder="Masukan NIS" class="onlyNumber" maxlength="10" required=""></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="nama" placeholder="Masukan Nama" class="onlyAlphabet" required=""></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td>
							<select name="id_kelas" required="">
								<option value="">-- Pilih Kelas --</option>
								<?php while ($kelas = mysqli_fetch_array($kelasAll)) { ?>
									<option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><textarea type="text" name="alamat" placeholder="Masukan Alamat" required=""></textarea></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td>:</td>
						<td><input type="text" name="no_telp" placeholder="Masukan No Telp" class="onlyNumber" required="" maxlength="13"></td>
					</tr>
					<tr>
						<td>SPP</td>
						<td>:</td>
						<td>
							<select name="id_spp" required="">
								<option value="">-- Pilih SPP --</option>
								<?php while ($spp = mysqli_fetch_array($sppAll)) { ?>
									<option value="<?= $spp['id_spp'] ?>"><?= $spp['tahun'].' - '.$spp['nominal'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<a href="siswa_view.php">Kembali</a>
							<input type="submit" name="proses" value="Simpan">
						</td>
					</tr>
				</table>

			</form>

			<?php 	
				}elseif (base64_decode($_GET['action']) == 'edit') { 
					$getData = $dataAll->getWhereSiswa($_GET['id']);
					while ($data = mysqli_fetch_array($getData)) {
			?>

			<form action="../Config/Routes.php?action=updateSiswa" method="POST">
			<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
			<input type="hidden" name="id_siswa" value="<?= $_GET['id'] ?>"/>

				<table border="1">
					<tr>
						<td>NISN</td>
						<td>:</td>
						<td><input type="text" name="nisn" placeholder="Masukan NISN" required="" value="<?= $data['nisn'] ?>" class="onlyAlphabet" maxlength="10"></td>
					</tr>
					<tr>
						<td>NIS</td>
						<td>:</td>
						<td><input type="text" name="nis" placeholder="Masukan NIS" required="" value="<?= $data['nis'] ?>" class="onlyNumber" maxlength="10"></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="nama" placeholder="Masukan Nama" required="" value="<?= $data['nama'] ?>" class="onlyAlphabet"></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td>
							<select name="id_kelas" required="">
								<option value="">-- Pilih Kelas --</option>
								<?php while ($kelas = mysqli_fetch_array($kelasAll)) { ?>
									<option value="<?= $kelas['id_kelas'] ?>" <?= ($kelas['id_kelas'] == $data['id_kelas'] ? 'selected' : '') ?>><?= $kelas['nama_kelas'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><textarea type="text" name="alamat" placeholder="Masukan Alamat" required=""><?= $data['alamat'] ?></textarea></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td>:</td>
						<td><input type="text" name="no_telp" placeholder="Masukan No Telp" required="" class="onlyNumber" value="<?= $data['no_telp'] ?>" maxlength="13"></td>
					</tr>
					<tr>
						<td>SPP</td>
						<td>:</td>
						<td>
							<select name="id_spp" required="">
								<option value="">-- Pilih SPP --</option>
								<?php while ($spp = mysqli_fetch_array($sppAll)) { ?>
									<option value="<?= $spp['id_spp'] ?>" <?= ($spp['id_spp'] == $data['id_spp'] ? 'selected' : '') ?>><?= $spp['tahun'].' - '.$spp['nominal'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<a href="siswa_view.php">Kembali</a>
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