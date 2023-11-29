<div class="container-fluid">
    <style>
      option[value=""]{
        display: none;
      }
    </style>
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-sm fa-plus"></i> Tambah Barang</button>
    <form class="form-inline mb-3" action="<?php echo base_url().'admin/data_barang/filter';?>" method="post" enctype="multipart/form-control">
      <div class="form-group">
        <label for="" class="mr-2">Nama:</label>
        <select name="nama" class="form-control">
          <option value="" >--Filter Nama--</option>
          <option value="ASC">Nama (A-Z)</option>
          <option value="DESC">Nama (Z-A)</option>
        </select>
      </div>
      <div class="form-group ml-3">
        <label for="" class="mr-2">Kategori:</label>
        <select name="kategori" class="form-control">
          <option value="Pakaian Pria">Pakaian Pria</option>
          <option value="Pakaian Wanita">Pakaian Wanita</option>
          <option value="Pakaian Anak">Pakaian Anak</option>
          <option value="Elektronik">Elektronik</option>
          <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
          <option value="Kesehatan">Kesehatan</option>
        </select>
      </div>
           
      <button type="submit" class="btn btn-success ml-auto mt-auto">Terapkan</button>
      <?php echo anchor('admin/data_barang','<div class="btn btn-primary ml-3">Refresh</div>')?>
    </form>
    <table class="table table-bordered ">
        <tr>
            <th>NO</th>
            <th>PREVIEW</th>
            <th>NAMA BARANG</th>
            <th>DESKRIPSI</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>STOK</th>
            <th colspan="">STATUS</th>
            <?php if($this->session->userdata('role_id') == '1'): ?>
            <th>PERSETUJUAN</th>
            <?php endif; ?>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($barang as $brg) : ?>
        <form action="<?php echo base_url().'admin/data_barang/update_acc';?>" method="post" enctype="multipart/form-data">

        <tr>
            <td><?php echo $no++ ?></td>
            <td><img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" width="100px" alt="GambarBarang"></td>
            <td><?php echo $brg->nama_brg ?></td>
            <td><?php echo $brg->deskripsi ?></td>
            <td><?php echo $brg->kategori ?></td>
            <td><?php echo number_format($brg->harga,0,',','.') ?></td>
            <td><?php echo $brg->stok ?></td>
            <td><?php if($brg->status_acc == 'pending'){?>
            <span class="badge badge-warning">Pending</span>
            <?php }elseif($brg->status_acc == 'setuju'){ ?>
            <span class="badge badge-success">Disetujui</span>
            <?php }elseif($brg->status_acc == 'tolak'){ ?>
              <span class="badge badge-danger">Ditolak</span>
            <?php }else{} ?></td>
            <?php if($this->session->userdata('role_id') == '1'): ?>
            <td>
            <div class="form-group">
                <input type="hidden" name="id_brg" class="form-control"
                value="<?php echo $brg->id_brg ?>">
                <select class="form-control" name="status_acc">
                  <option value="pending">Pending</option>
                  <option value="setuju">Setujui</option>
                  <option value="tolak">Tolak</option>
                </select>
            </div>
            <?php echo anchor('admin/data_barang/update_acc/'.$brg->id_brg,'<button type="submit" class="btn btn-primary">Update</button>')?>
            </td>
            <?php endif; ?>
            <td><?php echo anchor('admin/data_barang/detail/'.$brg->id_brg,'<div class="btn btn-sm btn-success">Detail</div>')?></td>
            <td><?php echo anchor('admin/data_barang/edit/'.$brg->id_brg, '<div class="btn btn-primary btn-sm "><i class="fas fa-edit"></i></div>') ?></td>
            <td><?php echo anchor('admin/data_barang/hapus/'.$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
        </tr>

        </form>
        <?php endforeach ; ?>
        
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Produk Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_barang/tambah_aksi';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control">
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control">
            </div>
            <div class="form-group">
                <label>Gambar Produk</label><br>
                <input type="file" name="gambar" class="form-control">
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