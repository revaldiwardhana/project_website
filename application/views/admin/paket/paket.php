<div class="animated fadeIn">

    <div class="row">

    <?php foreach($paket as $data){?>
        <div class="col-lg-3 col-md-6">
            <div class="social-box facebook">
                <h3 class="text-center" for=""><?=$data->jenis_paket?></h3>
                <ul>
                    <li>
                        <strong>Rp. <span class=""><?=($data->harga_paket_alias)?></span></strong>
                        <span>Harga</span>
                    </li>
                    <li>
                        <strong><span class="count"><?=$data->jumlah_hari?></span></strong>
                        <span>Hari</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div><!--/.col-->
        <?php }?>


    </div>
</div><!-- .animated -->
