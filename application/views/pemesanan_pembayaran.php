<!-- Main content -->
<div class="animated fadeIn">
  <div class='row'>
    <div class="mx-auto col-offet-2 col-md-10">
        <div class='card'>
          <div class='card-header'>
            Silahkan selesaikan pembayaran anda di ATM sebelum tanggal <strong><?=$pemesanan->tanggal_pembayaran?></strong>
            <h2>Ke No. Rekering <strong>3262732828426</strong></h2>
          </div>
                
          <div class='card-body'>
           Silahkan Hubungi No Admin Untuk Penentuan Harga
          <h4>Contact Person <strong> Admin Revaldi : <a href="https://wa.me/6281333282193">081333282193</a></strong></h4><hr>
          
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-12">
                    <table>
                      <tbody>
                        <tr>
                          <td>No Order </td>
                          <td>: <?=$pemesanan->id_pemesanan?></td>
                        </tr>
                        <tr>
                          <td>Nama Pemesanan </td>
                          <td>: <?=$pemesanan->nama_pemesanan?></td>
                        </tr>
                        <tr>
                          <td>No Telp </td>
                          <td>: <?=$pemesanan->no_telp?></td>
                        </tr>
                        <tr>
                          <td>Alamat </td>
                          <td>: <?=$pemesanan->alamat?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Berangkat </td>
                          <td>: <?= date('d-m-Y',strtotime($pemesanan->tanggal_keberangkatan))?></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
                <div class="table-container">
                    <table class="table table-bordered table-dark">
                      <thead>
                        <tr>
                          <th>Tanggal Order</th>
                          <th>Paket</th>
                          <th>Rute</th>
                          <th>Total Bayar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?=date('d-m-Y',strtotime($pemesanan->tanggal_pesan))?></td>
                          <td><?=$pemesanan->jenis_paket?></td>
                          <td><?=$pemesanan->rute1?></td>
                          <td><?=number_format($pemesanan->total_harga)?></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
      
                <div class="col-md-6 form-group">
                    Nominal Transfer
                    <input type="number" class="form-control" name="total_bayar">
                </div>
               
                <div class="col-md-6 form-group">
                    Upload Bukti Bayar
                    <input type="file" name="bukti_bayar" id="bukti_bayar">
                    <input type="hidden" name="id_pemesanan" id="id_pemesanan"  value="<?=$pemesanan->id_pemesanan?>">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary mt-1">Submit</button> 
                </div>
                <div class="col-md-12 form-group">
                    <!--<strong>NB</strong> DP 50% dari total harga sewa .--> 
                    <br>
                    <br>
                    
                </div>
              </div>
              
	    
	          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->