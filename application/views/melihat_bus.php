
    <div class="row">
        <?php foreach($data_bus as $row){?>
        <div class="col-sm-6 col-lg-3">
            <a href="<?=base_url("penyewa/melihat_bus_detail/".$row->id_bus)?>">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span><?=$row->jenis_bus?></span>
                        </h4>
                        <ul style="list-style: none;">
                            <li class="d-flex"><span style="width:50%">Fasilitas </span><span>: <?=$row->fasilitas_bus?></span></li>
                            <li class="d-flex"><span style="width:50%">Tempat Duduk </span><span>: <?=$row->jumlah_tempatduduk?>Kursi</span></li>
                            <li class="d-flex"><span style="width:50%">Jumlah Bus </span><span>: <?=$row->jumlah_bus?></span></li>
                        </ul>
                    </div>

                </div>
            </a>
        </div>
        <?php }?>
    </div>
