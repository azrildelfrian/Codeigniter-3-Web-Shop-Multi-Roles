<div class="container-fluid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php foreach($hero as $key => $rows) :?>
        <div class="carousel-item <?php echo ($key == 0 ? 'active': '') ?>">
        <img class="d-block w-100" src="<?php echo base_url().'/uploads/carousel/'.$rows->file_foto ?>" width="400px" alt="FailedLoadCarousel">
        <div class="carousel-caption d-none d-md-block">
            <h5><?php echo $rows->label ?></h5>
            <p><?php echo $rows->deskripsi ?></p>
        </div>
        </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</div>