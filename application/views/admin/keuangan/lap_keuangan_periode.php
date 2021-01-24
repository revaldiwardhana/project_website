<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="get" action="<?=base_url("admin/transaksi_keuangan/laporan_keluar")?>">
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
                            <th>Jenis Pengeluaran</th>
                            <th>Jumlah Biaya</th>
                            <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $ind = 0;$jumlah = 0;
                        if($pengeluaran){
                        foreach($pengeluaran as $row){
                            ++$ind;
                            $jumlah += $row->jumlah_biaya_pengeluaran;
                        ?>
                            <tr>
                                <td><?=$ind?></td>
                                <td><?=date('d-m-Y',strtotime($row->tanggal))?></td>
                                <td><?=$row->jenis_pengeluaran?></td>
                                <td class="text-right"><?=number_format($row->jumlah_biaya_pengeluaran)?></td>
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
