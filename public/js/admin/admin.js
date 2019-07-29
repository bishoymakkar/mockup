var design_to_be_deleted;
function deleteBlueprintConfirm(id) {
	$('#modal-1').modal('show');
	$("#modal-1 .modal-body span").empty().append(id);
	design_to_be_deleted = id;
}
function deleteBlueprintProccess() {
	alert("JS Function to delete Design of ID "+design_to_be_deleted);
	$('#modal-1').modal('hide');
}
function createBlueprintModal() {
	$('#modal-2').modal('show');
}
////////////////////////////////////// Image Upload
var filename = "";
$(document).ready(function(){
    
    // Ajax File Upload
    $('#fileupload').fileupload({
        dataType: 'text',
        multipart: true,
        url: 'Blueprints/uploadPicture',
        progressall: function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	        $('#progress .bar').css(
	            'width',
	            progress + '%'
	        );
	    },
        done: function (e, data) {
            $("#filename").empty().append(data.result);
            $("#post_image").empty().val(data.result);
            filename = data.result;
        },
        fail: function (e, data) {
        	console.log("Failed");
        	console.log(e);
        }

    });

    $( '#object_photo' ).change( function(){
        upload_object_photo( $( this ).attr( 'forobjid' ) );
    });

    $( '.obj-gallery-item' ).hover( function(){
        $( this ).find( 'a' ).fadeIn( 200 );
    }, function(){
        $( this ).find( 'a' ).fadeOut();
    });
});

function delete_object_photo( id, file_name )
{
    if(confirm("Are you sure you want to delete this photo?"))
    {
        $.ajax({
            type: 'POST',
            url:  base_url + 'admin/objects/delete_object_photo',
            data: { id: id, file_name: file_name },
            success: function(data) {
                location.reload();
            }
        });
    }
}

function add_user_style( user_id )
{
    var style_id = $( '#style_id' ).val();
    $.ajax({
        type: "POST",
        url: base_url + "admin/styles/assign_user_style/",
        data: { user_id: user_id, style_id: style_id },
        success:  function(data){
            if ( data == 1 )
                location.href = base_url + 'admin/styles/ofUser/' + user_id;
            else confirm(" An error occured please try again later ");
        }
    });
}

function add_room_type_style(room_type_id){
    var style_id = $( '#style_id' ).val();
    $.ajax({
        type: "POST",
        url: base_url + "admin/styles/assign_room_type_style/",
        data: { room_type_id: room_type_id, style_id: style_id },
        success:  function(data){
            if ( data == 1 )
                location.href = base_url + 'admin/styles/ofRoomTypes/' + room_type_id;
            else confirm(" An error occured please try again later ");
        }
    });
}

function add_user_room_type(user_id){
    var room_type = $( '#room_type_id' ).val();
    $.ajax({
        type: "POST",
        url: base_url + "admin/room_types/assign_user_room_type/",
        data: { user_id: user_id, room_type: room_type },
        success:  function(data){
            if ( data == 1 )
                location.href = base_url + 'admin/room_types/ofUser/' + user_id;
            else confirm(" An error occured please try again later ");
        }
    });
}

function upload_object_photo( id )
{
    $.ajaxFileUpload({
        url: base_url + 'admin/objects/upload_object_photo/' + id + "/object_photo", 
        fileElementId: 'object_photo',
        dataType: 'text',
        success: function (data){
            location.reload();
        }
    }); 
}

function deleteUser(id)
{
    if(confirm("Are you sure you want to delete this User?")){
        window.location.href= base_url+"admin/users/delete_user/" + id;
    }

}
function deleteStyle(id)
{
    if(confirm("Are you sure you want to delete this Style?"))
        window.location.href= base_url+"admin/styles/delete/" + id;
}

function deleteRoomType(id)
{
    if(confirm("Are you sure you want to delete this Rooom Type?"))
        window.location.href= base_url+"admin/room_types/delete/" + id;
}


function deleteConfig(id)
{
    if(confirm("Are you sure you want to delete this Configuration?"))
        window.location.href= base_url+"admin/configuration/delete/" + id;
}
function deleteLayout( id, area_id )
{
    if(confirm("Are you sure you want to delete this Layout?"))
        window.location.href= base_url+"admin/layouts/delete/" + id + "/" + area_id;
}
function deleteObject(id)
{
    if(confirm("Are you sure you want to delete this Object?"))
        window.location.href= base_url+"admin/objects/delete/" + id;
}

function deleteObjectFromLayout( id, layout_id )
{
    if(confirm("Are you sure you want to remove this Object from this layout ?"))
        window.location.href= base_url+"admin/objects/deleteFromLayout/" + id + "/" + layout_id;
}

function deleteConfigArea( id )
{
    if(confirm("Are you sure you want to delete this configuration area ?"))
        window.location.href= base_url+"admin/configuration/delete_area/" + id;
}

//////////////////////////////////////////////// Image Changer in New Layout
function changeImageLayout (e) {
    var location = $("#configuration_selector").data("location"); 
    var image = $("#configuration_selector option:selected").attr('data-img');
    $("#targetImg").attr("src" , location+'/'+image);

    $('#targetImg').imgAreaSelect({
        onSelectEnd: function (img, selection) {
            $('input[name="width"]').val(selection.width);
            $('input[name="height"]').val(selection.height);
            $('input[name="pos_x"]').val(selection.x1);
            $('input[name="pos_y"]').val(selection.y1);
                    }
    });
}
function changeImageObject (e) {
    var location = $("#layout_selector").data("location"); 
    var image = $("#layout_selector option:selected").attr('data-img');
    $("#targetImg").attr("src" , location+'/'+image);

    $('#targetImg').imgAreaSelect({
        onSelectEnd: function (img, selection) {
            $('input[name="width"]').val(selection.width);
            $('input[name="height"]').val(selection.height);
            $('input[name="pos_x"]').val(selection.x1);
            $('input[name="pos_y"]').val(selection.y1);
                    }
    });
}
//Initialize Image Area in Creation
var imgareaflag=0;
function initImageAreaCreate(){
    // Inititate Image Mapping Area Select
    if(imgareaflag==0)
    {   
        imgareaflag=1;
        $('#targetImg').imgAreaSelect({
            parent : $('#image-mapper'),
            onSelectEnd: function (img, selection) {
                $('input[name="width"]').val(selection.width);
                $('input[name="height"]').val(selection.height);
                $('input[name="pos_x"]').val(selection.x1);
                $('input[name="pos_y"]').val(selection.y1);
                        }
        });
    }   
}
//Initialize Image Area in Editing
function initImageArea (x1 , y1 , width , height ) {
    
    x1 = parseInt(x1);
    y1 = parseInt(y1);
    var x2 = parseInt(width) + x1;
    var y2 = parseInt(height) + y1;
    setTimeout(function(){
        $('#targetImgEdit').imgAreaSelect({
        parent : $('#image-mapper'),
        x1 : x1 ,
        y1 : y1 ,
        x2 : x2 ,
        y2 : y2 ,
        onSelectEnd: function (img, selection) {
            $('input[name="width"]').val(selection.width);
            $('input[name="height"]').val(selection.height);
            $('input[name="pos_x"]').val(selection.x1);
            $('input[name="pos_y"]').val(selection.y1);
        }
        });
    },1000);
    
}

function assign_object_to_layout( layout_id )
{
    var object_id = $( '#obj_id_select' ).val();
    $.ajax({
            type: 'POST',
            url:  base_url + 'admin/objects/assign_object_to_layout',
            data: { layout_id: layout_id, object_id: object_id },
            success: function(data) {
                if ( !isNaN( data ) )
                {
                    // location.href = base_url + 'admin/objects/ofLayout/' + layout_id;
                    location.href = base_url + 'admin/objects/edit_in_layout/' + object_id + '/' + layout_id;
                }
                else
                {
                    confirm( data );
                }
            }
        });
}

function assign_layout_to_area( area_id )
{
    var layout_id = $( '#layout_id_select' ).val();
    $.ajax({
            type: 'POST',
            url:  base_url + 'admin/layouts/assign_layout_to_area',
            data: { layout_id: layout_id, area_id: area_id },
            success: function(data) {
                if ( data == 1 )
                {
                    location.href = base_url + 'admin/layouts/view_area_layouts/' + area_id;
                }
                else
                {
                    confirm( data );
                }
            }
        });
}