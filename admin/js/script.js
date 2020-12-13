

$(document).ready(function(){

var user_href;
var user_href_splitted;
var user_id;
var image_src;
var image_href_splitted;
var image_name;
var photo_id;







	$(".modal_thumbnails").click(function(){

		$("#set_user_image").prop('disabled', false);
		user_href           = $("#user-id").prop('href');
		user_href_splitted  = user_href.split("=");
	    user_id             = user_href_splitted[user_href_splitted.length - 1];
	    image_src           = $(this).prop("src");
	    image_href_splitted = image_src.split("/");
	    image_name          = image_href_splitted[image_href_splitted.length - 1];

		photo_id            = $(this).attr("data");

		$.post("includes/ajax_code.php",
            { photo_id : photo_id
             } ,
             function(result){

                  if (!result.error ) {

                  	$("#modal_sidebar").html(result);
                  }

                });




	});

$("#set_user_image").click(function(){

$.post("includes/ajax_code.php",
            { image_name : image_name ,
              user_id  : user_id
             } ,
             function(result){

                  if (!result.error ) {

                  	$(".user_image_box a img").prop('src', result);
                  }

                });

	});

/**************** Edit photo side bar ***************/
$(".info-box-header").click(function(){
	$(".inside").slideToggle("fast");
	$("#toggle").toggleClass(" glyphicon-menu-down glyphicon ,  glyphicon-menu-up glyphicon" );
});
/**************** delete fun ***************/
$(".delete_link").click(function(){
  return confirm("Are you sure you want to delete this item");
});



tinymce.init({ selector:'textarea' });



});



function ddl_version(){
		var get_version = "hi";
   $("#ddl_subject_data").empty();
   $("#ddl_subject_data").append("<option value='0'>Select option</option>");

  $.post("../addsw",{get_version: get_version},
    function(result){

         var len = result.length;

          for( var i = 0; i<len; i++){
                var id = result[i]['id'];
                var name = result[i]['subject_name'];

                $("#ddl_subject_data").append("<option value='"+id+"'>"+name+"</option>");


              }

            },"json");

}
