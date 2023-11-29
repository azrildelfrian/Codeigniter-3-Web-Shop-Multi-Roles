<div class="container-fluid">
    <h3>Pakaian Pria</h3>
    <div class="row mt-4">
        <?php foreach ($pakaian_pria as $brg) : ?>
            <div class="card ml-3 mb-3" style="width: 18rem;">
            <div class="embed">
            <img class="card-img-top embed-responsive-item" src="<?php echo base_url().'/uploads/'.$brg['gambar'] ?>" alt="Card image cap">
            </div>
            <div class="card-body">
                <h5 class="card-title mb-1"><?php echo $brg['nama_brg'] ?></h5>
                <p><b>Rp. <?php echo  number_format($brg['harga'], 0,',','.')?></b></p>
                <small><?php echo $brg['deskripsi'] ?></small><br>
                <?php echo anchor('dashboard/tambah_dikeranjang/'.$brg['id_brg'],'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>')?>
                <?php echo anchor('welcome/detail/'.$brg['id_brg'],'<div class="btn btn-sm btn-success">Detail</div>')?>
                
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
