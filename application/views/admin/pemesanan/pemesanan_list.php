<div class="animated fadeIn">

<div class='row'>
                <div class='col-md-12 text-right'>
                    <a class hidden='btn btn-primary' href='<?=base_url('admin/pemesanan/create')?>' role='button'><i class='fa fa-pencil-square-o'></i> Tambah Perawatan Baru</a>
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
            <th>Jumlah Bus</th>
            <th class="text-right">Harga Sewa</th>
            <th class="text-right">Total Pembayaran</th>
            <th>Status Pemesanan</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($pemesanan as $row){?>
            <tr>
            <td><?=$row->nama_lengkap?></td>
            <td><?=$row->no_telp?></td>
            <td><?=$row->alamat?></td>
            <td><?=$row->jenis_paket?></td>
            <td><?=date('d M Y',strtotime($row->tanggal_keberangkatan))?></td>
            <td><?=$row->jumlah_bus?></td>
            <td class="text-right"><?=number_format($row->total_harga)?></td>
            <td class="text-right"><?=number_format($row->total_bayar)?></td>
            <td>
                <?php 
                    if($row->status == 'approve' && $row->otp_confirm == 1) echo '<span class="text-warning">Menunggu pembayaran</span>';
                    elseif($row->status == 'approve' && $row->otp_confirm == 0) echo '<span class="text-warning">Belum konfirmasi OTP</span>';
                    elseif($row->status == 'dibayar' ) echo '<span class="text-info">Telah dibayar</span>';
                ?>
            </td>
            <td><a class="btn btn-sm btn-outline-primary" href="<?=base_url('admin/pemesanan/read/'.$row->id_pemesanan)?>" >Detail</a></td>
            </tr>
           
        <?php }?>
        </tbody>
        </table>
            </div>
        </div>
    </div>


    </div>
</div><!-- .animated -->
