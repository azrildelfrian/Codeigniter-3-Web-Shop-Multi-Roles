<div class="container-fluid">
    <h3 class="fas fa-edit"> EDIT DATA HERO</h3>

    <?php foreach($hero as $hero) : ?>
        <form method="post" action="<?php echo base_url().'admin/data_hero/update' ?>" enctype="multipart/form-data">
            <div class="for-group">
                <label>Label</label>
                <input type="text" name="label" class="form-control"
                value="<?php echo $hero->label ?>">
            </div>

            <div class="for-group">
                <label>Deskripsi</label>
                <input type="hidden" name="id" class="form-control"
                value="<?php echo $hero->id ?>">
                <input type="text" name="deskripsi" class="form-control"
                value="<?php echo $hero->deskripsi ?>">
            </div>

            <div class="form-group">
                <label>Upload Gambar Baru</label><br>
                <input type="hidden" id="old" name="old" class="form-control" value="<?php echo $hero->file_foto ?>">
                <input type="file" name="file_foto" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <img src="<?php echo base_url().'/uploads/carousel/'.$hero->file_foto ?>" class="card-img-top">
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <?php echo anchor('admin/data_hero','<div class="btn btn-sm btn-primary">Kembali</div>')?>

        </form>
    <?php endforeach; ?>
</div>