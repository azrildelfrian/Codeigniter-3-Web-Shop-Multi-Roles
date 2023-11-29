<div class="container-fluid">
    <h3 class="fas fa-edit"> EDIT DATA BARANG</h3>

    <?php foreach($barang as $brg) : ?>
        <form method="post" action="<?php echo base_url().'admin/data_barang/update' ?>" enctype="multipart/form-data">
            <div class="for-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control"
                value="<?php echo $brg->nama_brg ?>">
            </div>

            <div class="for-group">
                <label>Deskripsi</label>
                <input type="hidden" name="id_brg" class="form-control"
                value="<?php echo $brg->id_brg ?>">
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $brg->deskripsi ?>">
            </div>

            <div class="for-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                  <option value="Pakaian Pria">Pakaian Pria</option>
                  <option value="Pakaian Wanita">Pakaian Wanita</option>
                  <option value="Pakaian Anak">Pakaian Anak</option>
                  <option value="Elektronik">Elektronik</option>
                  <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
                  <option value="Kesehatan">Kesehatan</option>
                </select>
            </div>

            <div class="for-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control"
                value="<?php echo $brg->harga ?>">
            </div>

            <div class="for-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control"
                value="<?php echo $brg->stok ?>">
            </div>

            <div class="form-group">
                <label>Gambar Produk</label><br>
                <input type="hidden" id="old" name="old" class="form-control" value="<?php echo $brg->gambar ?>">
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="col-md-4">
                <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top">
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <?php echo anchor('admin/data_barang','<div class="btn btn-sm btn-primary">Kembali</div>')?>

        </form>
    <?php endforeach; ?>
</div>