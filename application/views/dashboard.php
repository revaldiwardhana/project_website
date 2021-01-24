<!-- 
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <a href="<?=base_url("pemesanan/create_nonpaket")?>">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span>Buat Pesanan Non Paket</span>
                        </h4>
                        <p class="text-light">Sesuai kebutuhan anda</p>
                    </div>

                </div>
            </a>
        </div>
        <?php foreach($data_perjalanan as $row){?>
        <div class="col-sm-6 col-lg-3">
            <a href="<?=base_url('pemesanan/?id_paket='.$row->id_paket)?>">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span><?=$row->jenis_paket?></span>
                        </h4>
                        <p class="text-light"><?=$row->jumlah_hari?> Hari</p>
                    </div>

                </div>
            </a>
        </div>
        <?php }?>
    </div> -->
