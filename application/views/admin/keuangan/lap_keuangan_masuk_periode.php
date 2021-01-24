<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="get" action="<?=base_url("admin/transaksi_keuangan/laporan_masuk")?>">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="nf-jenis_laporan" class=" form-control-label">Tanggal Awal</label>
                                <input onchange="javascript:submit()" type="text" id="tgl_awal" name="tgl_awal" value="<?=$tgl_awal?>" class="form-control">
                            </div>
                             <div class="col-md-3">
                                <label for="nf-jenis_laporan" class=" form-control-label">Tanggal Akhir</label>
                                <input onchange="javascript:submit()" type="text" id="tgl_akhir" name="tgl_akhir" value="<?=$tgl_akhir?>" class="form-control">
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>No.</th>
                            <th>Tanggal Transaksi</th>
                            <th>Jenis Pemasukan</th>
                            <th>Jumlah Biaya</th>
                            <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $ind = 0;$jumlah = 0;
                        if($pemasukan){
                        foreach($pemasukan as $row){
                            ++$ind;
                            $jumlah += $row->total_bayar;
                        ?>
                            <tr>
                                <td><?=$ind?></td>
                                <td><?=date('d-m-Y',strtotime($row->tanggal))?></td>
                                <td>Paket <?=$row->jenis_paket?></td>
                                <td class="text-right"><?=number_format($row->total_bayar)?></td>
                                <td class="text-right"><?=number_format($jumlah)?></td>
                            </tr>
                        <?php }}?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Jumlah Total</td>
                                <td class="text-right"><?=number_format($jumlah)?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->
