$(document).ready(function() {
   var header = $('header');

   var headerHeight = Math.round($('header').outerHeight());
   var headerOffsetTop = Math.round(header.offset().top);

   $(document).foundation();

   $(window).scroll(function() {
      if($(this).scrollTop() >= headerOffsetTop) {
         header.addClass('fixed');
         header.next().css('margin-top', headerHeight);
      }
      else {
         header.removeClass('fixed');
         header.next().css('margin-top', 0);
      }
   });
});

$(document).ready(function() {

	$(".apri").click(
	    function(){
			$('#overlay').fadeIn('fast');
			$('#box').fadeIn('slow');
		});

		$(".chiudi").click(
	    function(){
		$('#overlay').fadeOut('fast');
		$('#box').hide();
		});

   });
