<!-- Bootstrap core JavaScript-->
<script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url()?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url()?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url()?>assets/js/demo/chart-pie-demo.js"></script>

    <script>
;(function($){
	$.fn.picZoomer = function(options){
		var opts = $.extend({}, $.fn.picZoomer.defaults, options), 
			$this = this,
			$picBD = $('<div class="picZoomer-pic-wp"></div>').css({'width':opts.picWidth+'px', 'height':opts.picHeight+'px'}).appendTo($this),
			$pic = $this.children('img').addClass('picZoomer-pic').appendTo($picBD),
			$cursor = $('<div class="picZoomer-cursor"><i class="f-is picZoomCursor-ico"></i></div>').appendTo($picBD),
			cursorSizeHalf = {w:$cursor.width()/2 ,h:$cursor.height()/2},
			$zoomWP = $('<div class="picZoomer-zoom-wp"><img src="" alt="" class="picZoomer-zoom-pic"></div>').appendTo($this),
			$zoomPic = $zoomWP.find('.picZoomer-zoom-pic'),
			picBDOffset = {x:$picBD.offset().left,y:$picBD.offset().top};

		
		opts.zoomWidth = opts.zoomWidth||opts.picWidth;
		opts.zoomHeight = opts.zoomHeight||opts.picHeight;
		var zoomWPSizeHalf = {w:opts.zoomWidth/2 ,h:opts.zoomHeight/2};

		$zoomWP.css({'width':opts.zoomWidth+'px', 'height':opts.zoomHeight+'px'});
		$zoomWP.css(opts.zoomerPosition || {top: 0, left: opts.picWidth+30+'px'});
		$zoomPic.css({'width':opts.picWidth*opts.scale+'px', 'height':opts.picHeight*opts.scale+'px'});

		$picBD.on('mouseenter',function(event){
			$cursor.show();
			$zoomWP.show();
			$zoomPic.attr('src',$pic.attr('src'))
		}).on('mouseleave',function(event){
			$cursor.hide();
			$zoomWP.hide();
		}).on('mousemove', function(event){
			var x = event.pageX-picBDOffset.x,
				y = event.pageY-picBDOffset.y;

			$cursor.css({'left':x-cursorSizeHalf.w+'px', 'top':y-cursorSizeHalf.h+'px'});
			$zoomPic.css({'left':-(x*opts.scale-zoomWPSizeHalf.w)+'px', 'top':-(y*opts.scale-zoomWPSizeHalf.h)+'px'});

		});
		return $this;

	};
	$.fn.picZoomer.defaults = {
        picHeight: 460,
		scale: 2.5,
		zoomerPosition: {top: '0', left: '380px'},

		zoomWidth: 400,
		zoomHeight: 460
	};
})(jQuery); 



$(document).ready(function () {
     $('.picZoomer').picZoomer();
    $('.piclist div').on('click', function (event) {
        var $pic = $(this).find('img');
        $('.picZoomer-pic').attr('src', $pic.attr('src'));
    });
});

</script>

</body>

</html>