
    <div class="row">
        <?php foreach($data_paket as $row){?>
        <div class="col-sm-6 col-lg-4">
            <a href="<?=base_url('pemesanan')?>">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span><?=$row->jenis_paket?></span>
                        </h4>
                        <ul style="list-style: none;">
                            <li class="d-flex"><span style="width:50%">Paket </span><span>: <?=$row->jenis_paket?></span></li>
                            <li class="d-flex"><span style="width:50%">Jumlah Hari </span><span>: <?=$row->jumlah_hari?></span></li>
                            <li class="d-flex"><span style="width:50%">Rute </span><span>: <?=$row->rute1?></span></li>
                            <li class="d-flex"><span style="width:50%">Harga Sewa </span><span>: <?=number_format($row->harga_paket)?></span></li>
                            <!-- <li class="d-flex"><span style="width:50%">Jenis Bus </span><span>: <?=$row->jenis_bus?></span></li> -->
                        </ul>
                    </div>

                </div>
            </a>
        </div>
        <?php }?>
    </div>
