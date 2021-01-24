<!-- Main content -->
<div class="animated fadeIn">
  <div class='row'>
    <div class="mx-auto col-offet-2 col-md-8">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">INFO</strong> DATA DIRI
          </div>
                
          <div class='card-body'>
                    <form method="post" action="<?=base_url('penyewa/data_diri_action')?>">
                        <input type="hidden" name="id_user" id="id_user" value="<?=$data_diri->id_user?>"> 
                        <div class="form-group">
                            <label>Username</label>
                            <input value="<?=$data_diri->username?>" id="username" name="username" autofocus type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password <small class="Isi password jika ingin mengubah password"></small></label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input value="<?=$data_diri->nama_lengkap?>" type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>No. Telp</label>
                            <input value="<?=$data_diri->no_telp?>" type="text" id="no_telp" name="no_telp" class="form-control" placeholder="No. Telp">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input value="<?=$data_diri->alamat?>" type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Update Data Diri</button>
                    </form>
                    
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->