<div class="container-fluid">
    <button class="btn btn-sm btn-warning mb-3 text-dark" data-toggle="modal" data-target="#tambah_hero"><i class="fas fa-sm fa-plus"></i> Tambah Gambar</button>
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>PREVIEW</th>
            <th>LABEL</th>
            <th>DESKRIPSI</th>
            <th colspan="">STATUS</th>
            <?php if($this->session->userdata('role_id') == '1'): ?>
            <th>PERSETUJUAN</th>
            <?php endif; ?>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($hero as $hero) : ?>
        <form action="<?php echo base_url().'admin/data_hero/update_acc';?>" method="post" enctype="multipart/form-data">

        <tr>
            <td><?php echo $no++ ?></td>
            <td><img src="<?php echo base_url().'/uploads/carousel/'.$hero->file_foto ?>" width="300px" alt="CarouselNotLoad"></td>
            <td><?php echo $hero->label ?></td>
            <td><?php echo $hero->deskripsi ?></td>
            <td><?php if($hero->status_acc == 'pending'){?>
            <span class="badge badge-warning">Pending</span>
            <?php }elseif($hero->status_acc == 'setuju'){ ?>
            <span class="badge badge-success">Disetujui</span>
            <?php }elseif($hero->status_acc == 'tolak'){ ?>
              <span class="badge badge-danger">Ditolak</span>
            <?php }else{} ?></td>
            <?php if($this->session->userdata('role_id') == '1'): ?>
            <td>
            <div class="form-group">
                <input type="hidden" name="id" class="form-control"
                value="<?php echo $hero->id ?>">
                <select class="form-control" name="status_acc">
                  <option value="pending">Pending</option>
                  <option value="setuju">Setujui</option>
                  <option value="tolak">Tolak</option>
                </select>
            </div>
            <?php echo anchor('admin/data_hero/update_acc/'.$hero->id,'<button type="submit" class="btn btn-primary">Update</button>')?>
            </td>
            <?php endif; ?>
            <td><?php echo anchor('admin/data_hero/edit/'.$hero->id, '<div class="btn btn-primary btn-sm "><i class="fas fa-edit"></i></div>') ?></td>
            <td><?php echo anchor('admin/data_hero/hapus/'.$hero->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
        </tr>

        </form>
        <?php endforeach ; ?>
        
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_hero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Gambar Hero Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_hero/tambah_aksi';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Label Hero</label>
                <input type="text" name="label" class="form-control">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control">
            </div>
            <div class="form-group">
                <label>File Gambar</label><br>
                <input type="file" name="file_foto" class="form-control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>