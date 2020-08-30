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
							if ($datmateri->nama_materi != 'Pengertian & Manfaat') {
								$id = $datmateri->id_materi;
								$materi_no_space = str_replace('-', '', $datmateri->nama_materi);
								foreach ($submateri as $datsub) {
									if ($id == $datsub->id_materi) {
										$imagine = 0;
										foreach ($aktivitas as $dataktivitas) {
											if ($dataktivitas->id_user == $datsiswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'playvideo') {
												$imagine++;
											}
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

										if ($imagine == 1) {
											$imagine = 25;
										}else if ($imagine == 2){
											$imagine = 50;
										}else if ($imagine == 3){
											$imagine = 75;
										}else if ($imagine == 4){
											$imagine = 100;
										}

										$nilaipengertian = $status[$datsiswa->id_user]['Pengertian'];
										$nilaipengertianhuruf = $status[$datsiswa->id_user][$materi_no_space];
										$nilaisoalhuruf = $nilai[$datsiswa->id_user][$datsub->id_submateri];
										$nilaiimagine = ($imagine * 30 / 100) + ($nilaipengertian * 10 / 100) + ($nilaipengertianhuruf * 10 / 100) + ($nilaisoalhuruf * 50 / 100);
										$totalimagine = $totalimagine + $nilaiimagine;

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
						<td>
							<?php
								$totalimagine = $totalimagine / 33;
								
								if ($totalimagine <= 25) {
									echo "Kurang";
								}else if ($totalimagine > 25 && $totalimagine <= 50) {
									echo "Cukup";
								}else if ($totalimagine > 50 && $totalimagine <= 75) {
									echo "Bagus";
								}else if ($totalimagine > 75 && $totalimagine <= 100) {
									echo "Sangat Bagus";
								}
							?>
						</td>
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