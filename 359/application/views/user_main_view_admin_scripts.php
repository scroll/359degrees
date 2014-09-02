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
                        plugins: ["advlist autoresize image textcolor link hr paste preview print hr anchor",
                             "table contextmenu"],
                         file_browser_callback: function(field_name, url, type, win) {
                         if(type=='image') {
			    $('#work_form').append('<input type="hidden" name="postbind" value="'+tinyMCE.activeEditor.id+'">');
			    $('#work_form input').click();
					 }},
			 relative_urls: false,
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


				// get elements of table row start

					$('.edit').on('click', function() {
						   var  values = [];
						  var $row = $(this).closest('tr');
						  var $columns = $row.find('td');


						  $.each($columns, function(i, item) {
						      values.push(item.innerHTML);

						  });

						  var $rowf = $(this).closest('div');
						  var $columnsf = $rowf.find('input.edittableform');

						  $.each($columnsf, function(i) {
						       $(this).val(values[i]);
						  });
					});

				   // get elements of table row end


         });   //doc ready


function uploadform()
	 {
		$('#work_form').submit();this.value='';
	 }
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


function confirmdia()
    {
      if(!confirm('Изтриване')){return false;} else
      {
	return true;
     }
   }


function confirmmsg(id,type)
    {
      if(!confirm('Изтриване')){return false;} else
      {

       var mydata = 'id='+id+"&type=" +  type;

       $.ajax( {
	             dataType: 'html',
	             type: "POST",
	             url: "<?php echo URL."index.php/main/deleteimage"; ?>",
	             cache: false,
	             data: mydata,
	             success: function (data) {

                        $( "#imgid"+id).remove();
                       },
	             error: function (err) {
                         console.log("AJAX error in request: " + JSON.stringify(err, null, 2));

                     },
	             complete: function() {}
	         } );





     }
   }

    function activtab(tab){

       $(".nav li").parent().find('li').removeClass("active");
       $(tab).parent().addClass('active');

    };

</script>