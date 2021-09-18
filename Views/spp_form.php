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

			<h1>Form SPP</h1>

			<?php include('../Config/Csrf.php'); ?>

			<?php if (base64_decode($_GET['action']) == 'add') { ?>

			<form action="../Config/Routes.php?action=insertSpp" method="POST">
			<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
				
				<table border="1">
					<tr>
						<td>Tahun</td>
						<td>:</td>
						<td><input type="text" name="tahun" placeholder="Masukan Tahun" class="onlyNumber" required="" maxlength="4"></td>
					</tr>
					<tr>
						<td>Nominal</td>
						<td>:</td>
						<td><input type="text" name="nominal" placeholder="Masukan Nominal" class="onlyNumber" required=""></td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<a href="spp_view.php">Kembali</a>
							<input type="submit" name="proses" value="Simpan">
						</td>
					</tr>
				</table>

			</form>

			<?php 	
				}elseif (base64_decode($_GET['action']) == 'edit') { 
					include '../Controllers/Controller_pegawai.php';
					$dataAll = new Controller_pegawai();
					$getData = $dataAll->getWhereSpp($_GET['id']);
					while ($data = mysqli_fetch_array($getData)) {
			?>

			<form action="../Config/Routes.php?action=updateSpp" method="POST">
			<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
			<input type="hidden" name="id_spp" value="<?= $_GET['id'] ?>"/>

				<table border="1">
					<tr>
						<td>Tahun</td>
						<td>:</td>
						<td><input type="text" name="tahun" placeholder="Masukan Tahun" class="onlyNumber" required="" value="<?= $data['tahun'] ?>" maxlength="4"></td>
					</tr>
					<tr>
						<td>Nominal</td>
						<td>:</td>
						<td><input type="text" name="nominal" placeholder="Masukan Nominal" class="onlyNumber" required="" value="<?= $data['nominal'] ?>"></td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<a href="spp_view.php">Kembali</a>
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