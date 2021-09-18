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

			<h1>Form Pembayaran</h1>

			<?php 
				include('../Config/Csrf.php');  
				include '../Controllers/Controller_pegawai.php';
				$dataAll = new Controller_pegawai();
				$petugasAll = $dataAll->getPetugas();
				$siswaAll = $dataAll->getSiswa();
				$sppAll = $dataAll->getSpp();
			?>

			<?php if (base64_decode($_GET['action']) == 'add') { ?>

			<form action="../Config/Routes.php?action=insertPembayaran" method="POST">
			<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
				
				<table border="1">
					<tr>
						<td>Petugas</td>
						<td>:</td>
						<td>
							<select name="id_petugas" required="">
								<option value="">-- Pilih Petugas --</option>
								<?php while ($petugas = mysqli_fetch_array($petugasAll)) { ?>
									<option value="<?= $petugas['id_petugas'] ?>"><?= $petugas['nama_petugas'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Siswa</td>
						<td>:</td>
						<td>
							<select name="nisn" required="">
								<option value="">-- Pilih Siswa --</option>
								<?php while ($siswa = mysqli_fetch_array($siswaAll)) { ?>
									<option value="<?= $siswa['nisn'] ?>"><?= $siswa['nisn'].' - '.$siswa['nama'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Tanggal Bayar</td>
						<td>:</td>
						<td><input type="date" name="tgl_bayar" required=""></td>
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
					<tr>
						<td>Jumlah Bayar</td>
						<td>:</td>
						<td><input type="text" name="jumlah_bayar" placeholder="Masukan Jumlah Bayar" required="" class="onlyNumber"></td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<a href="pembayaran_view.php">Kembali</a>
							<input type="submit" name="proses" value="Simpan">
						</td>
					</tr>
				</table>

			</form>

			<?php 	
				}elseif (base64_decode($_GET['action']) == 'edit') { 
					$getData = $dataAll->getWherePembayaran($_GET['id']);
					while ($data = mysqli_fetch_array($getData)) {
			?>

			<form action="../Config/Routes.php?action=updatePembayaran" method="POST">
			<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
			<input type="hidden" name="id_pembayaran" value="<?= $_GET['id'] ?>"/>

				<table border="1">
					<tr>
						<td>Petugas</td>
						<td>:</td>
						<td>
							<select name="id_petugas" required="">
								<option value="">-- Pilih Petugas --</option>
								<?php while ($petugas = mysqli_fetch_array($petugasAll)) { ?>
									<option value="<?= $petugas['id_petugas'] ?>" <?= ($petugas['id_petugas'] == $data['id_petugas'] ? 'selected' : '') ?>><?= $petugas['nama_petugas'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Siswa</td>
						<td>:</td>
						<td>
							<select name="nisn" required="">
								<option value="">-- Pilih Siswa --</option>
								<?php while ($siswa = mysqli_fetch_array($siswaAll)) { ?>
									<option value="<?= $siswa['nisn'] ?>" <?= ($siswa['nisn'] == $data['nisn'] ? 'selected' : '') ?>><?= $siswa['nisn'].' - '.$siswa['nama'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Tanggal Bayar</td>
						<td>:</td>
						<td><input type="date" name="tgl_bayar" required="" value="<?= $data['tahun_dibayar'].'-'.$data['bulan_dibayar'].'-'.$data['tgl_bayar'] ?>"></td>
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
					<tr>
						<td>Jumlah Bayar</td>
						<td>:</td>
						<td><input type="text" name="jumlah_bayar" placeholder="Masukan Jumlah Bayar" required="" value="<?= $data['jumlah_bayar'] ?>" class="onlyNumber"></td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<a href="pembayaran_view.php">Kembali</a>
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