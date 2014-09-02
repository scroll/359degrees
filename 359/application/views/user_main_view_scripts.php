<script>
    $(document).ready(function(){

	 $('body').scrollspy({ target: '#affix-nav', offset: 50 });
	 $('.navbar a').click(function (event) {
	  var scrollPos = $('body').find($(this).attr('href')).offset().top - 50;
	  $('body,html').animate({ scrollTop: scrollPos}, 500, function () {});
	  return false;
	});


  	 $("#button").click(function(){
					$("#loginslide").slideToggle();
					$('.slideani').toggleClass("glyphicon-chevron-down glyphicon-chevron-up");
					});
	 $("#buttonvidsl").click(function(){
					    $("#videogalslide").slideToggle();
					    $('.slidevid').toggleClass("glyphicon-chevron-down glyphicon-chevron-up");
					    });

	    tinymce.init({
                        selector: ".work",
                        menubar : false,
                         toolbar: false,
                         statusbar : false,
                         readonly : 1,
			 plugins: "autoresize",
                      });

	    autoPlayModal();


	    $( ".videothumb" ).hover(
					function () {
					       $(this).attr('src', $(this).attr('src').replace('.jpg','.gif'));
					     },
					function () {
					     $(this).attr('src', $(this).attr('src').replace('.gif', '.jpg'));
					    }
				    );




         });   //doc ready

function autoPlayModal()
    {
	  var trigger = $("body").find('[data-toggle="modal"]');
	  trigger.click(function() {
					SRC = $(this).attr( "data-video" );
					width = $(this).attr( "data-width" );
					var Modal = $('#iframe').append( SRC );
					$('.modal-dialog').css("width",width);
					$("#videoModal").on('hidden.bs.modal', function (e) {
						      $('#iframe').children().remove();
						    });
				    });
    }
function closethis(thisob) {
  $(thisob).slideToggle();
  $(thisob).html('');
}
function submitmsg()
    {
	 //$('#validatemsg').slideUp('slow');
	 //$('#validatemsg').html('');
	var formData = {
			      'name' : $('input[name=name]').val(),
			      'email' : $('input[name=email]').val(),
			      'captcha' : $('input[name=captcha]').val(),
			      'msg' 	: $('textarea[name=msg]').val()
		      };
	$.ajax({
				    type 		: 'POST',
				    url 		: '<?php echo URL.'index.php/main/submit'; ?>',
				    data 		: formData,
				    success: function(data) {


							    if ($('#validatemsg').is(':visible')) {
								  $('#validatemsg').html('');
								  $('#validatemsg').append(data);
							    } else {
									$('#validatemsg').append(data).slideDown('slow');
								    }


							    },
				    encode 		: true
			    })


    }


    function activtab(tab){

       $(".nav li").parent().find('li').removeClass("active");
       $(tab).parent().addClass('active');

    };

</script>