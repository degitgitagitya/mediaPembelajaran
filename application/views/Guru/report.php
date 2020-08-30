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
					<th>Tahap Create & Play</th>
					<th>Tahap Share</th>
					<th>Tahap Reflect</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach ($siswa as $datsiswa) {
						$totalimagine = 0;
						$totalcreateplay = 0;
						$totalshare = 0;
						$totalreflect = 0;
						foreach ($materi as $datmateri) {
							if ($datmateri->nama_materi != 'Pengertian & Manfaat') {
								$id = $datmateri->id_materi;
								$materi_no_space = str_replace('-', '', $datmateri->nama_materi);
								foreach ($submateri as $datsub) {
									if ($id == $datsub->id_materi) {
										$imagine = 0;
										$nonton = 0;
										$create = 0;
										$play = 0;
										foreach ($aktivitas[$datsiswa->id_user] as $dataktivitas) {
											if ($dataktivitas->id_user == $datsiswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'playvideo') {
												$nonton++;
											}
											if ($dataktivitas->id_user == $datsiswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'rekam') {
												$create++;
											}
											if ($dataktivitas->id_user == $datsiswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'playrecord') {
												$play++;
											}
										}

										if ($nonton == 1) {
											$imagine = 25;
										}else if ($nonton == 2){
											$imagine = 50;
										}else if ($nonton == 3){
											$imagine = 75;
										}else if ($nonton == 4){
											$imagine = 100;
										}

										$nilaipengertian = $status[$datsiswa->id_user]['Pengertian'];
										$nilaipengertianhuruf = $status[$datsiswa->id_user][$materi_no_space];
										$nilaisoalhuruf = $nilai[$datsiswa->id_user][$datsub->id_submateri];
										$nilaiimagine = ($imagine * 30 / 100) + ($nilaipengertian * 10 / 100) + ($nilaipengertianhuruf * 10 / 100) + ($nilaisoalhuruf * 50 / 100);
										$totalimagine = $totalimagine + $nilaiimagine;

										$tempat = 0;
										$sifat = 0;
										$suara = 0;
										foreach ($createplay[$datsiswa->id_user] as $datcreateplay) {
                							if ($datcreateplay->id_user == $datsiswa->id_user && $datcreateplay->id_materi == $datmateri->id_materi && $datcreateplay->id_submateri == $datsub->id_submateri) {
                								$tempat =  $datcreateplay->tempat;
                								$sifat = $datcreateplay->sifat;
                								$suara = $datcreateplay->suara;
                							}
                						}
                						$hasil = ($create+$play+$tempat+$sifat+$suara) / 5;
                						$totalcreateplay = $totalcreateplay + $hasil;

                						$postshare = 0;
										$idpost = array();
										$rowtempatshare = 0;
										$rowsifatshare = 0;
										$rowsuarashare = 0;
										$row = 0;
										$totalavgpost = 0;
										$totalpenilai = 0;
										$avg = 0;
										foreach ($forum[$datsiswa->id_user] as $datforum) {
											if ($datforum->status_posting == 0 && $datforum->username_user == $datsiswa->username_user && $datforum->video_materi == $datmateri->nama_materi && $datforum->video_submateri == $datsub->nama_submateri) {
												$postshare++;
												$idpost[$datforum->id_posting] = $datforum->id_posting;
											}
										}
										foreach ($idpost as $postid) {
											$totalnilaipost[$postid] = 0;
											$penilai[$postid] = 0;
											$avgpost[$postid] = 0;
										}
										foreach ($share[$datsiswa->id_user] as $datshare) {
											foreach ($idpost as $postid) {
												if ($postid == $datshare->id_posting && $datshare->video_materi == $datmateri->nama_materi && $datshare->video_submateri == $datsub->nama_submateri) {
														$rowtempatshare = $datshare->tempat;
														$rowsifatshare = $datshare->sifat;
														$rowsuarashare = $datshare->suara;
														$row = ($rowtempatshare+$rowsifatshare+$rowsuarashare) / 3;
														$totalnilaipost[$postid] += $row;
														$penilai[$postid]++;
														$totalpenilai++;
												}
												if ($totalnilaipost[$postid] != 0 && $penilai[$postid] != 0) {
													$avgpost[$postid] = $totalnilaipost[$postid] / $penilai[$postid];
												}
											}
										}

										foreach ($idpost as $postid) {
											$totalavgpost += $avgpost[$postid];
										}

										if ($totalavgpost == 0 || $postshare == 0) {
											$avg = 0;
										}else{
											$avg = $totalavgpost / $postshare;
										}
										$totalshare = $totalshare + $avg;
										
										/*$post = 0;
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
										}*/
										$idreflect = array();
										$jumlahreflect = 0;
										$tempatreflect = 0;
										$sifatreflect = 0;
										$suarareflect = 0;
										$totalavgreflect = 0;
										$refflect = 0;
										foreach ($reflect[$datsiswa->id_user] as $datreflect) {
											if ($datreflect->video_materi == $datmateri->nama_materi && $datreflect->video_submateri == $datsub->nama_submateri) {
												$idreflect[$datreflect->id] = $datreflect->id;
												$jumlahreflect++;
											}
										}
										foreach ($idreflect as $reflectid) {
											$totalnilairowreflect[$reflectid] = 0;
										}
										foreach ($reflect[$datsiswa->id_user] as $datreflect) {
											foreach ($idreflect as $reflectid) {
												if ($datreflect->id == $reflectid && $datreflect->video_materi == $datmateri->nama_materi && $datreflect->video_submateri && $datsub->nama_submateri) {
													$tempatreflect = $datreflect->tempat;
													$sifatreflect = $datreflect->sifat;
													$suarareflect = $datreflect->suara;
													$totalnilairowreflect[$reflectid] = ($tempatreflect+$sifatreflect+$suarareflect) / 3;
													$totalavgreflect += $totalnilairowreflect[$reflectid];
												}
												/*echo "<br>row".$reflectid.'='.$totalavgreflect;*/
											}
										}

										if ($totalavgreflect == 0 || $jumlahreflect == 0) {
											$refflect = 0;
										}else{
											$refflect = $totalavgreflect / $jumlahreflect;
										}
										$totalreflect = $totalreflect + $refflect;
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
								/*echo $totalimagine;*/
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
								
								$totalcreateplay = $totalcreateplay / 33;
								/*echo $totalcreateplay;*/
								if ($totalcreateplay >= 0 && $totalcreateplay <= 1.2) {
        							echo "Kurang";
        						}elseif ($totalcreateplay > 1.2 && $totalcreateplay <= 2.2) {
        							echo "Cukup";
        						}elseif ($totalcreateplay > 2.2 && $totalcreateplay <= 3.2) {
        							echo "Bagus";
        						}elseif ($totalcreateplay > 3.2 && $totalcreateplay <= 4.2) {
        							echo "Sangat Bagus";
        						}
							?>
						</td>
						<td>
							<?php
								
								$totalshare = $totalshare / 33;
								/*echo $totalshare;*/
								if ($totalshare >= 0 && $totalshare <= 1) {
									echo "Kurang";
								}else if ($totalshare > 1 && $totalshare <= 2){
									echo "Cukup";
								}else if ($totalshare > 2 && $totalshare <= 3){
									echo "Bagus";
								}else if ($totalshare > 3 && $totalshare <= 4){
									echo "Sangat bagus";
								}
							?>
						</td>
						<td>
							<?php
								
								$totalreflect = $totalreflect / 33;
								/*echo $totalreflect;*/
								if ($totalreflect >= 0 && $totalreflect <= 1) {
									echo "Kurang";
								}else if ($totalreflect > 1 && $totalreflect <= 2){
									echo "Cukup";
								}else if ($totalreflect > 2 && $totalreflect <= 3){
									echo "Bagus";
								}else if ($totalreflect > 3 && $totalreflect <= 4){
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