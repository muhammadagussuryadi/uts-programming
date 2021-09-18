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

			<h1>Daftar Kelas</h1>

			<?php

				include '../Controllers/Controller_pegawai.php';
				$dataAll = new Controller_pegawai();
				$getData = $dataAll->getKelas();

			?>

				<a href="kelas_form.php?action=<?= base64_encode('add') ?>">Tambah</a>
				<table border="1">
					<tr>
						<th>NO</th>
						<th>Nama Kelas</th>
						<th>Kompetensi Keahlian</th>
						<th>Aksi</th>
					</tr>

					<?php 
						if (!empty($getData)) {
						$no = 1;
						while ($data = mysqli_fetch_array($getData)) {
					?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $data['nama_kelas'] ?></td>
						<td><?= $data['kompetensi_keahlian'] ?></td>
						<td>
							<a href="kelas_form.php?action=<?= base64_encode('edit') ?>&id=<?= $data['id_kelas'] ?>">Edit</a> | 
							<a href="../Config/Routes.php?action=deleteKelas&id=<?= $data['id_kelas'] ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
						</td>
					</tr>
					<?php $no++; }} ?>

			</table>	

		</td>
	</tr>
</table>