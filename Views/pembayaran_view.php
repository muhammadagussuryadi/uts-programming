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

			<h1>Daftar Pembayaran</h1>

			<?php

				include '../Controllers/Controller_pegawai.php';
				$dataAll = new Controller_pegawai();
				$getData = $dataAll->getPembayaran();

			?>

				<a href="pembayaran_form.php?action=<?= base64_encode('add') ?>">Tambah</a>
				<table border="1">
					<tr>
						<th>NO</th>
						<th>Petugas</th>
						<th>Siswa</th>
						<th>Tanggal Bayar</th>
						<th>Bulan Bayar</th>
						<th>Tahun Bayar</th>
						<th>SPP</th>
						<th>Jumlah Bayar</th>
						<th>Aksi</th>
					</tr>

					<?php 
						if (!empty($getData)) {
						$no = 1;
						while ($data = mysqli_fetch_array($getData)) {
					?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $data['nama_petugas'] ?></td>
						<td><?= $data['nama'] ?></td>
						<td><?= $data['tgl_bayar'] ?></td>
						<td>
							<?php  
								if ($data['bulan_dibayar'] == '01') {
									echo "Januari";
								}elseif ($data['bulan_dibayar'] == '02') {
									echo "Februari";
								}elseif ($data['bulan_dibayar'] == '03') {
									echo "Maret";
								}elseif ($data['bulan_dibayar'] == '04') {
									echo "April";
								}elseif ($data['bulan_dibayar'] == '05') {
									echo "Mei";
								}elseif ($data['bulan_dibayar'] == '06') {
									echo "Juni";
								}elseif ($data['bulan_dibayar'] == '07') {
									echo "Juli";
								}elseif ($data['bulan_dibayar'] == '08') {
									echo "Agustus";
								}elseif ($data['bulan_dibayar'] == '09') {
									echo "September";
								}elseif ($data['bulan_dibayar'] == '10') {
									echo "Oktober";
								}elseif ($data['bulan_dibayar'] == '11') {
									echo "November";
								}elseif ($data['bulan_dibayar'] == '12') {
									echo "Desember";
								} else {
									echo "Tidak ada bulan";
								}
								
							?>		
						</td>
						<td><?= $data['tahun_dibayar'] ?></td>
						<td><?= $data['tahun'].' - '.$data['nominal'] ?></td>
						<td><?= $data['jumlah_bayar'] ?></td>
						<td>
							<a href="pembayaran_form.php?action=<?= base64_encode('edit') ?>&id=<?= $data['id_pembayaran'] ?>">Edit</a> | 
							<a href="../Config/Routes.php?action=deletePembayaran&id=<?= $data['id_pembayaran'] ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
						</td>
					</tr>
					<?php $no++; }} ?>

				</table>	

		</td>
	</tr>
</table>