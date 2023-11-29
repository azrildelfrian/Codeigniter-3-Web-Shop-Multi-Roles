<div class="container-fluid">

    <div class="row mt-4">
        <?php foreach ($barang as $brg) : ?>

            <div class="card ml-3 mb-3 float-left" style="width: 16rem;">
            <img class="card-img-top" src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5>
                <p><b>Rp. <?php echo  number_format($brg->harga, 0,',','.')?></b></p>
                <p class="card-text"><?php echo $brg->deskripsi ?></p>
            </div>
            <div class="card-footer">
                <?php echo anchor('dashboard/tambah_dikeranjang/'.$brg->id_brg,'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>')?>
                <?php echo anchor('welcome/detail/'.$brg->id_brg,'<div class="btn btn-sm btn-success">Detail</div>')?>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
