<!-- Main content -->
<div class="animated fadeIn">
  <div class='row'>
    <div class="mx-auto col-offet-2 col-md-10">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">VERIFIKASI</strong> PEMESANAN
          </div>
                
          <div class='card-body'>
            <form action="<?php echo $action; ?>" method="post">
	    
              <div class="row">
                <div class="col-md-12 form-group">
                  Input Kode OTP <small class="text-warning">Kami telah mengirim kode OTP ke nomor telp anda</small>
                  <input required autofocus type="text" class="form-control" name="otp_user" id="otp_user"/>
                  <input type="hidden" name="id_pemesanan" id="id_pemesanan" value="<?=$pemesanan->id_pemesanan?>">
                </div>
              </div>
	    
              <div class="row">
                <div class="col-md-12">
                    <table>
                      <tbody>
                        <tr>
                          <td>Tujuan</td>
                          <td>: <?=$pemesanan->jenis_paket?></td>
                        </tr>

                        <tr>
                          <td>Keterangan Paket</td>
                          <td>: <?=$pemesanan->jumlah_hari?> hari, Rp. <?=$pemesanan->harga_paket?></td>
                        </tr>

                        <tr>
                          <td>Bus</td>
                          <td>: <?=$pemesanan->jenis_bus?>, fasilitas :<?=$pemesanan->fasilitas_bus?>,</td>
                        </tr>

                        <tr>
                          <td>Jumlah Bus</td>
                          <td>: <?=$pemesanan->jumlah_bus?></td>
                        </tr>

                      </tbody>
                    </table>
                </div>
              </div>
              
              <button type="submit" class="btn btn-primary mt-1">Submit</button> 
	    
	          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->