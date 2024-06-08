$(document).ready(function($) {
    $('#accordion').find('.accordion-toggle').click(function(){
// modified from union deisgn+code at http://uniondesign.ca/simple-accordion-without-jquery-ui/
      // mc 4/2/2015
      //Expand or collapse this panel
      var isActive = $(this).hasClass("active");
			$('.accordion-toggle').removeClass('active')
      if (!isActive) {
        $(this).toggleClass('active');
      }
         
      $(this).next().slideToggle('fast');     
      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });
  });