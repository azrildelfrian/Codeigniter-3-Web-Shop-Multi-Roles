<style>
.picZoomer{
	position: relative;
    /*margin-left: 40px;
    padding: 15px;*/
}
.picZoomer-pic-wp{
	position: relative;
	overflow: hidden;
    text-align: center;
}
.picZoomer-pic-wp:hover .picZoomer-cursor{
	display: block;
}
.picZoomer-zoom-pic{
	position: absolute;
	top: 0;
	left: 0;
}
.picZoomer-zoom-wp{
	display: none;
	position: absolute;
	z-index: 999;
	overflow: hidden;
    border:1px solid #eee;
    height: 460px;
    margin-top: -19px;
}
.picZoomer-cursor{
	display: none;
	cursor: crosshair;
	width: 100px;
	height: 100px;
	position: absolute;
	top: 0;
	left: 0;
	border-radius: 50%;
	border: 1px solid #eee;
	background-color: rgba(0,0,0,.1);
}
.picZoomCursor-ico{
	width: 23px;
	height: 23px;
	position: absolute;
	top: 40px;
	left: 40px;
	background: url(images/zoom-ico.png) left top no-repeat;
}
.picZoomer-pic-wp,
.picZoomer-zoom-wp{
    border: 1px solid #eee;
}
</style>

<div class="container-fluid">
    <div class="card">
    <div class="card-header">
        Detail Produk
    </div>
    <div class="card-body">
        <?php foreach($barang as $brg) : ?>
        <div class="row">
            <div class="col-md-5">
                <a href="" data-toggle="modal" data-target="#imagemodal">
                    <div class="picZoomer">
                    <img class="card-img-bottom" src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" alt="Card image cap">
                    </div>
                </a>
                <div class="zoom-thumb">
                <div class="piclist">
                <div class="card float-left mt-3 ml-2" style="width: 6rem;">
                    <div class="card-body">
                        <img class="card-img-bottom" src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" alt="Card image cap">
                    </div>
                    </div>
                    <div class="card float-left mt-3 ml-2" style="width: 6rem;">
                    <div class="card-body">
                        <img class="card-img-bottom" src="https://s.fotorama.io/3.jpg" alt="Card image cap">
                    </div>
                    </div>
                    <div class="card float-left mt-3 ml-2" style="width: 6rem;">
                    <div class="card-body">
                        <img class="card-img-bottom" src="https://s.fotorama.io/2.jpg" alt="Card image cap">
                    </div>
                    </div>
                    <div class="card float-left mt-3 ml-2" style="width: 6rem;">
                    <div class="card-body">
                        <img class="card-img-bottom" src="https://s.fotorama.io/1.jpg" alt="Card image cap">
                    </div>
                </div> 
                </div>
            </div>
            
                
            </div>
            <div class="col-md-7">
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
                    
                </table>

                <?php echo anchor('dashboard/tambah_dikeranjang/'.$brg->id_brg,'<div class="btn btn-sm btn-success">Tambah ke Keranjang</div>')?>
                <?php echo anchor('welcome/index/','<div class="btn btn-sm btn-primary">Kembali</div>')?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" data-dismiss="modal">
    <div class="modal-content"  >              
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>
</div>