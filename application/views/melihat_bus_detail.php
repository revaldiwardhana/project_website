
    <div class="row">
        <!-- <div class="col-sm-4 col-lg-4">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span><?=$data_bus->jenis_bus?></span>
                        </h4>
                        
                    </div>

                </div>
        </div> -->
        <div class="col-sm-8 col-lg-8">
            <div class="row">
            <?php if(isset($foto_bus->gambar1)){ ?>
                <div class="col-sm-6 col-lg-6 p-3">
                <label for="">Bus 1</label>
                     <a href="<?=base_url('upload/bus/'.$foto_bus->gambar1)?>"><img height="auto" width='100%' src="<?=base_url('upload/bus/'.$foto_bus->gambar1)?>"></a>
                     <ul style="list-style: none;">
                            <li class="d-flex"><span style="width:50%">Fasilitas </span><span>: <?=$data_bus->fasilitas_bus?></span></li>
                            <li class="d-flex"><span style="width:50%">Tempat Duduk </span><span>: <?=$data_bus->jumlah_tempatduduk?> Kursi</span></li>
                    </ul>
                </div>
            <?php }?>
            <?php if(isset($foto_bus->gambar2)){ ?>
                <div class="col-sm-6 col-lg-6 p-3">
                <label for="">Bus 2</label>
                     <a href="<?=base_url('upload/bus/'.$foto_bus->gambar2)?>"><img  height="auto" width='100%' src="<?=base_url('upload/bus/'.$foto_bus->gambar2)?>"></a>
                     <ul style="list-style: none;">
                            <li class="d-flex"><span style="width:50%">Fasilitas </span><span>: <?=$data_bus->fasilitas_bus?></span></li>
                            <li class="d-flex"><span style="width:50%">Tempat Duduk </span><span>: <?=$data_bus->jumlah_tempatduduk?> Kursi</span></li>
                    </ul>
                </div>
            <?php }?>
            <?php if(isset($foto_bus->gambar3)){ ?>
                <div class="col-sm-6 col-lg-6 p-3">
                <label for="">Bus 3</label>
                     <a href="<?=base_url('upload/bus/'.$foto_bus->gambar3)?>"><img  height="auto" width='100%' src="<?=base_url('upload/bus/'.$foto_bus->gambar3)?>"></a>
                     <ul style="list-style: none;">
                            <li class="d-flex"><span style="width:50%">Fasilitas </span><span>: <?=$data_bus->fasilitas_bus?></span></li>
                            <li class="d-flex"><span style="width:50%">Tempat Duduk </span><span>: <?=$data_bus->jumlah_tempatduduk?> Kursi</span></li>
                    </ul>
                 </div>
            <?php }?>
            <?php if(isset($foto_bus->gambar4)){ ?>
                <div class="col-sm-6 col-lg-6 p-3">
                <label for="">Bus 4</label>
                     <a href="<?=base_url('upload/bus/'.$foto_bus->gambar4)?>"><img  height="auto" width='100%' src="<?=base_url('upload/bus/'.$foto_bus->gambar4)?>"></a>
                     <ul style="list-style: none;">
                            <li class="d-flex"><span style="width:50%">Fasilitas </span><span>: <?=$data_bus->fasilitas_bus?></span></li>
                            <li class="d-flex"><span style="width:50%">Tempat Duduk </span><span>: <?=$data_bus->jumlah_tempatduduk?> Kursi</span></li>
                    </ul>
                </div>
            <?php }?>
            <?php if(isset($foto_bus->gambar5)){ ?>
                <div class="col-sm-6 col-lg-6 p-3">
                <label for="">Bus 5</label>
                     <a href="<?=base_url('upload/bus/'.$foto_bus->gambar5)?>"><img  height="auto" width='100%' src="<?=base_url('upload/bus/'.$foto_bus->gambar5)?>"></a>
                     <ul style="list-style: none;">
                            <li class="d-flex"><span style="width:50%">Fasilitas </span><span>: <?=$data_bus->fasilitas_bus?></span></li>
                            <li class="d-flex"><span style="width:50%">Tempat Duduk </span><span>: <?=$data_bus->jumlah_tempatduduk?> Kursi</span></li>
                    </ul>
                </div>
            <?php }?>
            <?php if(isset($foto_bus->gambar7)){ ?>
                <div class="col-sm-6 col-lg-6 p-3">
                <label for="">Bus 6</label>
                     <a href="<?=base_url('upload/bus/'.$foto_bus->gambar7)?>"><img  height="auto" width='100%' src="<?=base_url('upload/bus/'.$foto_bus->gambar7)?>"></a>
                     <ul style="list-style: none;">
                            <li class="d-flex"><span style="width:50%">Fasilitas </span><span>: <?=$data_bus->fasilitas_bus?></span></li>
                            <li class="d-flex"><span style="width:50%">Tempat Duduk </span><span>: <?=$data_bus->jumlah_tempatduduk?> Kursi</span></li>
                    </ul>
                </div>
            <?php }?>
            <?php if(isset($foto_bus->gambar8)){ ?>
                <div class="col-sm-6 col-lg-6 p-3">
                <label for="">Bus 8</label>
                     <a href="<?=base_url('upload/bus/'.$foto_bus->gambar8)?>"><img  height="auto" width='100%' src="<?=base_url('upload/bus/'.$foto_bus->gambar8)?>"></a>
                     <ul style="list-style: none;">
                            <li class="d-flex"><span style="width:50%">Fasilitas </span><span>: <?=$data_bus->fasilitas_bus?></span></li>
                            <li class="d-flex"><span style="width:50%">Tempat Duduk </span><span>: <?=$data_bus->jumlah_tempatduduk?> Kursi</span></li>
                    </ul>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
