
$(document).ready(function(){
     function preview(img, selection) {
         if (!selection.width || !selection.height)
            return;
            var scaleX = 150 / selection.width;
            var scaleY = 150 / selection.height;

         $('#preview').css({
            width: Math.round(scaleX * $("#targetImg").width())+"px",
            height: Math.round(scaleY * $("#targetImg").height())+"px",
            marginLeft: -Math.round(scaleX * selection.x1),
            marginTop: -Math.round(scaleY * selection.y1)
          });
      }

    //dynamic aspect ratio
	var daspectratio = $('#targetImg').height() /  $('#targetImg').width();
	var paspectratio = $('#preview-cont').height() / $('#preview-cont').width();
	var dyap =daspectratio+":" + paspectratio;

						$('#targetImg').imgAreaSelect({

                            
                            handles: true,
                            fadeSpeed: 200,
                            onSelectChange: preview
						});
});



// $(document).ready(function () {
// 	$('#targetImg').imgAreaSelect({
// 		onSelectEnd: function (img, selection) {
// 			$('input[name="width"]').val(selection.width);
// 			$('input[name="height"]').val(selection.height);
// 			$('input[name="pos_x"]').val(selection.x1);
// 			$('input[name="pos_y"]').val(selection.y1);
// 					}
// 	});
// });


function point()
{
	var pos_x =document.getElementById("pos_x").value;
	var pos_y =document.getElementById("pos_y").value;
	var width = document.getElementById("width").value;
	var height = document.getElementById("height").value;
	
//alert("in js!");
	$.ajax
	({
		type: "POST",
		url:base_url+ "Admin/Layouts/insert_layout",
		data: {'pos_x':pos_x, 'pos_y':pos_y, 'width':width, 'height':height},
		dataType: "text",
		success: function( data )
		{
			location.reload();
			//alert(data);
		},
		error: function( data )
		{
			//alert( 'error' );
		}
	});
}

