<?php 
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>
<body>
	<div>
		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Tahap Imagine</th>
					<th>Tahap Create</th>
					<th>Tahap Play</th>
					<th>Tahap Share</th>
					<th>Tahap Reflect</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach ($siswa as $datsiswa) {
						$totalimagine = 0;
						$totalcreate = 0;
						$totalplay = 0;
						$totalshare = 0;
						$totalreflect = 0;
						foreach ($materi as $datmateri) {
							if ($datmateri->nama_materi != 'Pengertian') {
								$id = $datmateri->id_materi;
								foreach ($submateri as $datsub) {
									if ($id == $datsub->id_materi) {
										foreach ($aktivitas as $dataktivitas) {
											if ($dataktivitas->id_user == $datsiswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'rekam') {
												$totalcreate++;
											}
											if ($dataktivitas->id_user == $datsiswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'playrecord') {
												$totalplay++;
											}
											if ($dataktivitas->id_user == $datsiswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'bagikan') {
												$totalshare++;
											}
										}

										$post = 0;
										$comment = 0;
										$reflect = 0;
										foreach ($forum as $datforum) {
											if ($datforum->username_user == $datsiswa->username_user && $datforum->status_posting == 0 && $datforum->video_materi == $datmateri->nama_materi && $datforum->video_submateri == $datsub->nama_submateri) {
												$post++;
											}
											if ($datforum->username_user == $datsiswa->username_user && $datforum->status_posting != 0 && $datforum->video_materi == $datmateri->nama_materi && $datforum->video_submateri == $datsub->nama_submateri) {
												$comment++;
											}
										}
										if ($comment != 0) {
											$reflect = $comment / $post;
											$totalreflect = $totalreflect + $reflect;
										}
									}
								}
							}
						}
				?>
					<tr>
						<td class="text-center"><?php echo $no; $no++; ?></td>
						<td><?php echo $datsiswa->nama_user; ?></td>
						<td><?php echo $datsiswa->username_user; ?></td>
						<td><?php echo $totalimagine / 33; ?></td>
						<td>
							<?php
								$totalcreate = $totalcreate / 33;
								if ($totalcreate <= 7) {
									echo "Kurang";
								}else if ($totalcreate >= 8 && $totalcreate <= 13){
									echo "Cukup";
								}else if ($totalcreate >= 14 && $totalcreate <= 20){
									echo "Bagus";
								}else if ($totalcreate >= 21 && $totalcreate <= 26){
									echo "Sangat bagus";
								}
							?>
						</td>
						<td>
							<?php
								$totalplay = $totalplay / 33;
								if ($totalplay <= 13) {
									echo "Kurang";
								}else if ($totalplay >= 14 && $totalplay <= 20){
									echo "Cukup";
								}else if ($totalplay >= 21 && $totalplay <= 26){
									echo "Bagus";
								}else if ($totalplay >= 27 && $totalplay <= 33){
									echo "Sangat bagus";
								}
							?>
						</td>
						<td>
							<?php
								$totalshare = $totalshare / 33;
								if ($totalshare >= 0) {
									echo "Kurang";
								}else if ($totalshare >= 1 && $totalshare <= 7){
									echo "Cukup";
								}else if ($totalshare >= 8 && $totalshare <= 13){
									echo "Bagus";
								}else if ($totalshare >= 14 && $totalshare <= 20){
									echo "Sangat bagus";
								}
							?>
						</td>
						<td>
							<?php
								$totalreflect = $totalreflect / 33;
								if ($totalreflect <= 7) {
									echo "Kurang";
								}else if ($totalreflect > 8 && $totalreflect <= 13){
									echo "Cukup";
								}else if ($totalreflect > 14 && $totalreflect <= 20){
									echo "Bagus";
								}else if ($totalreflect > 21 && $totalreflect <= 26){
									echo "Sangat bagus";
								}
							?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>