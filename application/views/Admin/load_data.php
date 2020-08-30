<?php
function tanggal_indo($tanggal, $cetak_hari = false){
  $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
      );
      
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  
  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class="row">
  <div class="col-xl-8 col-lg-7" id="post">
  <?php
    foreach ($posting as $listposting) {
  ?>
    <div class="card shadow mb-4" id="posting<?php echo $listposting->id_posting ?>">

      <div class="modal fade" id="pelapor<?php echo $listposting->id_posting ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Pelapor</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <?php $jumlah=0; foreach ($pelapor as $user){
                if ($user->id_posting == $listposting->id_posting) {?>
                  <div class="row mb-2">
                    <div class="col-2">
                      <img width="50" height="50" src="<?php echo base_url('assets/img/profile/'.$user->foto_user) ?>" alt="" class="rounded-circle">
                    </div>
                    <div class="d-flex col-10 align-items-center text-primary">
                      <b><?php echo $user->nama_user; ?></b>
                    </div>
                  </div>
              <?php $jumlah++;}}?>
              <br>
              Anda dapat menghapus kiriman yang dilaporkan jika sudah ada 10 atau lebih pelapor.
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Header Posting -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
        <table>
          <tbody>
            <tr>
              <td rowspan="2" style="width: 50px; padding-right: 10px">
                <img class="rounded-circle" src="<?php echo base_url ('assets/img/profile/' . $listposting->foto_user) ?>" style="width: 50px; height:50px;">
              </td>
              <td>
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $listposting->nama_user; ?></h6>
              </td>
            </tr>
            <tr>
              <td style="font-size: 10pt">
                <?php 
                $tanggal = date("Y-m-d", strtotime($listposting->waktu_posting));
                echo tanggal_indo($tanggal, true) . ' pukul ' . date("H.i", strtotime($listposting->waktu_posting)) ?>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="dropdown no-arrow">
          <small class="text-secondary"><?php echo $edited = ($listposting->edit_status == 1) ? 'Telah disunting' : '' ; ?></small>
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-dark"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <?php if ($jumlah > 2){?>
              <a class="dropdown-item" id="hapus<?php echo $listposting->id_posting ?>" href="#">Hapus</a>
            <?php } ?>
            <a class="dropdown-item" data-toggle="modal" data-target="#pelapor<?php echo $listposting->id_posting ?>" href="#">Lihat Pelapor</a>
          </div>
        </div>
      </div>
      <!-- Header Posting -->

      <!-- Isi Posting -->
      <div class="card-body">
        <?php if (isset($listposting->video)) { ?>
          <video style="width: 100%; height: auto;" controls>
            <source src="<?php echo base_url('uploads/home/'.$listposting->video) ?>" type="video/webm">
          </video>
        <?php } ?>
        <div style="word-wrap: break-word;">
          <?php echo $listposting->isi_posting; ?>
        </div>
      </div>
    </div>
  <?php
    }
  ?>
  </div>

  <div class="col-xl-4 col-lg-5">
              
  </div>
</div>

<script>
    <?php foreach ($posting as $listposting) { ?>
      $('#hapus<?php echo $listposting->id_posting ?>').on('click', function(event){
        event.preventDefault();
        var konfirmasi = confirm('Apakah Anda yakin akan menghapus kiriman ini?');
        if (konfirmasi) {
          $.ajax({
            url:"<?php echo site_url('Controller_home/hapuspost') ?>",
            method:"POST",
            data:{id:<?php echo $listposting->id_posting; ?>},
            cache: false,
            dataType:"JSON",
            success:function(data){
              if (data.error == ''){
                $('#posting<?php echo $listposting->id_posting ?>').fadeOut('slow');
              }else{
                alert(data.error);
              }
            }
          });
        }
      });
    <?php } ?>
</script>
</body>
</html>