<!-- Main content -->
<div class="animated fadeIn">
  <div class='row'>
    <div class="mx-auto col-offet-2 col-md-8">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">INFO</strong> PEMESANAN
          </div>
                
          <div class='card-body'>
            <form action="<?php echo $action; ?>" method="post">
	    
              <div class="row">
                <div class="col-md-12 form-group">
                    Paket <?php echo form_error('id_paket') ?>
                    <?=form_dropdown('id_paket',$list_paket,$id_paket,'class="form-control" id="id_paket"  required')?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  Jumlah Bus <?php echo form_error('jumlah_bus') ?>
                  <input required type="text" class="form-control" name="jumlah_bus" id="jumlah_bus" value="<?php echo $jumlah_bus; ?>" />
                </div>
              </div>
	    
              <div class="row">
                <div class="col-md-12 form-group">
                  Bus <?php echo form_error('id_bus') ?>
                    <?=form_dropdown('id_bus',$list_bus,$id_bus,'class="form-control" id="id_bus"  required')?>
                </div>
              </div>
	    
              <div class="row">
                <div class="col-md-12 form-group">
                  Nama Pemesanan <?php echo form_error('nama_pemesanan') ?>
                  <input required type="text" class="form-control" name="nama_pemesanan" id="nama_pemesanan" value="<?php echo $nama_pemesanan; ?>" />
                </div>
              </div>
	    
              <div class="row">
                <div class="col-md-12 form-group">
                  Alamat <?php echo form_error('alamat') ?>
                  <input required type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat; ?>" />
                </div>
              </div>
	    
              <div class="row">
                <div class="col-md-12 form-group">
                  No. Telp <?php echo form_error('no_telp') ?>
                  <input required type="text" class="form-control" name="no_telp" id="no_telp" value="<?php echo $no_telp; ?>" />
                </div>
              </div>
	    
              <div class="row">
                <div class="col-md-12 form-group">
                  Lokasi Penjemputan <?php echo form_error('lokasi_jemput') ?>
                  <input required type="text" class="form-control" name="lokasi_jemput" id="lokasi_jemput" value="<?php echo $lokasi_jemput; ?>" />
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  Tanggal Keberangkatan <?php echo form_error('tanggal_keberangkatan') ?>
                  <input required type="text" class="form-control" name="tanggal_keberangkatan" id="tanggal_keberangkatan" value="<?php echo $tanggal_keberangkatan; ?>" />
                </div>
              </div>
	    
	            <div class="row mt-4">
                <div class="col-md-12 form-group">
                  <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	                <a href="<?php echo site_url('admin/paket') ?>" class="btn btn-default">Cancel</a>
                </div>
              </div>
	          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->