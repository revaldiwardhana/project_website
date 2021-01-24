<div class="animated fadeIn">

    <div hidden class="row">
        <div class="col-md-12">
            <a class="btn btn-outline-primary" href="#" role="button"><i class="fa fa-pencil-square-o"></i> Add Pemesanan Konvensional</a>
        </div>
    </div>

    <div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
        <table id="bootstrap-data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>Nama</th>
            <th>No. Telepon</th>
            <th>Alamat</th>
            <th>Tujuan</th>
            <th>Tanggal Berangkat</th>
            <th>Tanggal Pembayaran</th>
            <th class="text-right">Nominal Pembayaran</th>
            <th class="text-right">Total Harga Sewa</th>
            <th>Bukti Pembayaran</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($pembayaran as $row){?>
            <tr>
            <td><?=$row->nama_lengkap?></td>
            <td><?=$row->no_telp?></td>
            <td><?=$row->alamat?></td>
            <td><?=$row->jenis_paket?></td>
            <td><?=date('d M Y',strtotime($row->tanggal_keberangkatan))?></td>
            <td><?=date('d M Y H:i:s',strtotime($row->tanggal_bayar))?></td>
            <td class="text-right"><?=number_format($row->total_bayar)?></td>
            <td class="text-right"><?=number_format($row->total_harga)?></td>
            <td><a target="_blank" class="btn btn-sm btn-outline-primary" href="<?=base_url('upload/bukti_bayar/'.$row->bukti_bayar)?>" >Bukti Pembayaran</a></td>
            </tr>
           
        <?php }?>
        </tbody>
        </table>
            </div>
        </div>
    </div>


    </div>
</div><!-- .animated -->
