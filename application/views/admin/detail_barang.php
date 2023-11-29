<div class="container-fluid">
    <div class="card">
    <div class="card-header">
        Detail Produk
    </div>
    <div class="card-body">
        <?php foreach($barang as $brg) : ?>
        <div class="row">
            <div class="col-md-4"><img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top"></div>
            <div class="col-md-8">
                <table class="table">

                    <tr>
                        <td>Nama Produk</td>
                        <td><strong><?php echo $brg->nama_brg ?></strong></td>
                    </tr>

                    <tr>
                        <td>Deskripsi Barang</td>
                        <td><strong><?php echo $brg->deskripsi ?></strong></td>
                    </tr>

                    <tr>
                        <td>Kategori</td>
                        <td><strong><?php echo $brg->kategori ?></strong></td>
                    </tr>

                    <tr>
                        <td>Stok</td>
                        <td><strong><?php echo $brg->stok ?></strong></td>
                    </tr>

                    <tr>
                        <td>Harga</td>
                        <td><strong>Rp. <?php echo number_format($brg->harga,0,',','.') ?></strong></td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td><?php if($brg->status_acc == 'pending'){?>
                        <span class="badge badge-warning">Pending</span>
                        <?php }elseif($brg->status_acc == 'setuju'){ ?>
                        <span class="badge badge-success">Disetujui</span>
                        <?php }elseif($brg->status_acc == 'tolak'){ ?>
                        <span class="badge badge-danger">Ditolak</span>
                        <?php }else{} ?></td>
                    </tr>

                    <tr>
                        <td>Ditambahkan pada</td>
                        <td><strong><?php echo $brg->created_at ?></strong></td>
                    </tr>

                    <tr>
                        <td>Diubah pada</td>
                        <td><strong><?php echo $brg->update_at ?></strong></td>
                    </tr>
                    
                </table>

                <?php echo anchor('admin/data_barang','<div class="btn btn-sm btn-primary">Kembali</div>')?>

            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</div>