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

			<h1>Daftar Siswa</h1>

			<?php

				include '../Controllers/Controller_pegawai.php';
				$dataAll = new Controller_pegawai();
				$getData = $dataAll->getSiswa();

			?>

				<a href="siswa_form.php?action=<?= base64_encode('add') ?>">Tambah</a>
				<table border="1">
					<tr>
						<th>NO</th>
						<th>NISN</th>
						<th>NIS</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Alamat</th>
						<th>No Telp</th>
						<th>Jumlah SPP</th>
						<th>Aksi</th>
					</tr>

					<?php 
						if (!empty($getData)) {
						$no = 1;
						while ($data = mysqli_fetch_array($getData)) {
					?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $data['nisn'] ?></td>
						<td><?= $data['nis'] ?></td>
						<td><?= $data['nama'] ?></td>
						<td><?= $data['nama_kelas'] ?></td>
						<td><?= $data['alamat'] ?></td>
						<td><?= $data['no_telp'] ?></td>
						<td><?= $data['nominal'] ?></td>
						<td>
							<a href="siswa_form.php?action=<?= base64_encode('edit') ?>&id=<?= $data['nisn'] ?>">Edit</a> | 
							<a href="../Config/Routes.php?action=deleteSiswa&id=<?= $data['nisn'] ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
						</td>
					</tr>
					<?php $no++; }} ?>

				</table>	

		</td>
	</tr>
</table>