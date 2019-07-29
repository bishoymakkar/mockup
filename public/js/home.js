$(document).ready(function() {


    var search_url = location.search.slice(1);
    if(search_url != '')
        ajax_call(search_url);
    else get_suggestion([], [], [], "1000", "", "", "", "");
    // console.log(search_url);
    $( '.layer' ).css({ 'height': $( window ).height() });
});

$( document ).keyup( function( e ){
    if ( e.which == 13 )
    {
        login();
    }
});
var cur_obj = '';
var cur_obj_flag = false;

var last_query = '';

var rank = 0;
var last_image = '';

function get_different_result()
{
    cur_obj_flag = true;
    rank++;
    generate_result_string();
    $('#modal1').modal('hide');
}

function save_result(){
    $.ajax({
        type: "POST",
        url: site_url+"/gallery/save_furniture/",
        data: {url: last_query, background_image: last_image},
        error: function(data) {
            $('#fur_container').append('<div class="alert alert-danger no-fur-alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Could Not Save!</strong></div>');
        },
        success:  function(data){
            $('#fur_container').append('<div class="alert alert-success no-fur-alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Furniture Saved!</strong></div>');
        }
    });
}

function generate_result_string()
{
    $('.no-fur-alert').remove();
    fur_type = $('#fur_type').val();
    fur_price = $('#fur_price').val();
    fur_size = $('#fur_size').val();
    var excludeObject = [];
    // if(cur_obj_flag)
    //     excludeObject.push(cur_obj);
    cur_obj_flag = false;
    get_suggestion([fur_type], [], excludeObject, fur_price, rank, fur_size, "", "");
}

function get_new_result()
{
    rank = 0;
    generate_result_string();

    // var obj;
    // obj = ret;

    // $('#more-info-container table').fadeOut(function(){

    //     $('#fur_image').attr('src', 'public/img/fur/'+obj.image+'.jpg')

    //     $('#fur_container .fur_item').remove();
    //     $('#more-info-container table .item').remove();
    //     $('#more-info-container table .total .num').text(0);

    //     total = 0;
    //     for (i=0; i<obj.fur.length; i++)
    //     {

    //         $('#fur_container').append('<div index="'+i+'" class="fur_item" style="left:'+obj.fur[i].x+'px; top:'+obj.fur[i].y+'px; width:'+obj.fur[i].width+'px; height:'+obj.fur[i].height+'px; z-index:'+obj.fur[i].z+';"/>');

    //         $('#more-info-container .end').before('<tr class="item"><td>'+obj.fur[i].name+'</td><td>'+obj.fur[i].price+' €'+'</td></tr>');
    //         total+=obj.fur[i].price;
    //     }
    //     $('#more-info-container table .total .num').text(total+' €');

    //     $('.fur_item').click(function(){

    //         i = $(this).attr('index');

    //         $('#modal1 .modal-body').empty();

    //         img = obj.fur[i].image;
    //         $('#modal1 .modal-body').append('<div class="image"><img src="public/img/fur/'+img+'.png"/></div>');

    //         $('#modal1 .modal-body').append('<br /><strong>Name: </strong>'+obj.fur[i].name);
    //         $('#modal1 .modal-body').append('<br /><strong>Manufactorer: </strong>'+obj.fur[i].manufactorer);
    //         $('#modal1 .modal-body').append('<br /><strong>Price: </strong>'+obj.fur[i].price+' €');

    //         $('#modal1').modal('show');

    //      });

    //     $('#more-info-container table').fadeIn();

    // });
}

function add_new_furniture(obj)
{
    last_image = obj.background_image;
    console.log(obj);
    // $('#fur_image').attr('src', obj.background_image);
    $('#fur_image').after('<img src="'+base_url+'public/img/loading.gif" />') // some preloaded "loading" image
                 .hide()
                 .attr('src',obj.background_image)
                 .one('load', function() {
                    $(this).fadeIn().next().remove();
                 });
    $('#more-info-container table').fadeOut(function(){

        // $('#fur_image').attr('src', 'public/img/fur/'+obj.image+'.png')

        $('#fur_container .fur_item').remove();
        $('#more-info-container table .item').remove();
        $('#more-info-container table .total .num').text(0);

        total = 0;
            console.log(obj.fur[0].name.length);
        for (i=0; i<obj.fur[0].name.length; i++)
        {
            console.log(obj.fur[0].name.length);
            $('#fur_container').append('<div index="'+i+'" class="fur_item" style="left:'+obj.fur[0].x[i]+'%; top:'+obj.fur[0].y[i]+'%; width:'+obj.fur[0].width[i]+'%; height:'+obj.fur[0].height[i]+'%; z-index:'+obj.fur[0].z[i]+';"/>');

            $('#more-info-container .end').before('<tr class="item"><td>'+obj.fur[0].name[i]+'</td><td>'+obj.fur[0].price[i]+' €'+'</td></tr>');
            // total+=parseInt(obj.fur[i].price);
        }
        $('#more-info-container table .total .num').text(obj.total_price+' €');

        $('.fur_item').click(function(){

            i = $(this).attr('index');

            $('#modal1 .modal-body').empty();

            // img = obj.fur[i].image;
            $('#modal1 .modal-body').append('<div class="image"><img src="'+obj.fur[0].image[i]+'"/></div>');

            $('#modal1 .modal-body').append('<br /><strong>Name: </strong>'+obj.fur[0].name[i]);
            $('#modal1 .modal-body').append('<br /><strong>Manufactorer: </strong>'+obj.fur[0].manufactorer[0]);
            $('#modal1 .modal-body').append('<br /><strong>Price: </strong>'+obj.fur[0].price[i]+' €');

            $('#modal1').modal('show');

         });

        $('#more-info-container table').fadeIn();

    });
}

function fur_seek(options)
{
    var ret;

    switch (options.type)
    {
        case 'livingroom':
            ret ={'image':'livingroom', 'fur':[{'name':'Sofa', 'image':'sofa', 'x':283, 'y':315, 'z':1, 'width':411, 'height':217, 'manufactorer':'wvrfw', 'price':200},
            {'name':'Stand', 'image':'stand', 'x':600, 'y':200, 'z':0, 'width':100, 'height':98, 'manufactorer':'weffw', 'price':330},
            {'name':'Chair', 'image':'chair', 'x':83, 'y':314, 'z':2, 'width':202, 'height':231, 'manufactorer':'wefffwf', 'price':521}]};
            break;
        case 'diningroom':
            ret ={'image':'diningroom', 'fur':[{'name':'Chair', 'image':'dchair', 'x':82, 'y':297, 'z':1, 'width':170, 'height':269, 'manufactorer':'qwfeqwrfv', 'price':130},
            {'name':'Table', 'image':'table', 'x':105, 'y':372, 'z':2, 'width':400, 'height':232, 'manufactorer':'kyfyhj', 'price':66},
            {'name':'Cupboard', 'image':'cupboard', 'x':100, 'y':100, 'z':0, 'width':344, 'height':423, 'manufactorer':'ugiughj', 'price':335}]};
            break;
        case 'bedroom':
            ret ={'image':'bedroom', 'fur':[{'name':'Bed', 'image':'bed', 'x':382, 'y':326, 'z':0, 'width':400, 'height':263, 'manufactorer':'wdfqewrfv', 'price':236},
            {'name':'Mirror', 'image':'mirror', 'x':175, 'y':418, 'z':2, 'width':150, 'height':164, 'manufactorer':'augcdadc', 'price':133},
            {'name':'Cupboard', 'image':'bcupboard', 'x':22, 'y':217, 'z':1, 'width':350, 'height':304, 'manufactorer':'wpoadcda', 'price':993}]};
            break;
    }

    return ret;
}

function ajax_call(url)
{
        $.ajax({
        type: "POST",
        url: base_url+"home/get_new_furniture/",
        data: {url: url},
        dataType: "json",
        // jsonp: false,
        // jsonpCallback: 'getJson',
        // xhrFields: {
        //     withCredentials: false
        // },
        // crossDomain: true,
        error: function(data) {
            $('#fur_container').append('<div class="alert alert-danger no-fur-alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>No Furniture Found!</strong> Change a few things up and try submitting again.</div>');
        },
        success:  function(data){
            console.log(data);
            // $('#more-info-container table .item').remove();
            // $('#more-info-container .end').before('<tr class="item"><td>'+data['object_name']+'</td><td>'+data['total_price']+' €'+'</td></tr>');
            // var i = 0;
            // $('#fur_container .fur_item').remove();
            // $('#fur_container').append('<div index="'+i+'" class="fur_item" style="left:'+data['frame_x']+'px; top:'+data['frame_y']+'px; width:'+data['object_width']+'px; height:'+data['object_height']+'px;"/>');
            var ret = [];
            ret = {'image':'furniture','total_price':data['total_price'], 'background_image':data['image_path'],'fur':[{'name':data['object_name'], 'image':data['object_image_path'],  'x':data['frame_ox'], 'y':data['frame_oy'], 'z':1, 'width':data['frame_x'], 'height':data['frame_y'], 'manufactorer':data['object_manufacturer'], 'price':data['object_price'],  'link': data['object_link'], 'object_id': data['object_id']}], 'request_id': data['request_id']};
            cur_obj = data['object_id'];
            add_new_furniture(ret);
        }
    });
}

function get_suggestion(includeCategory, excludeCategory, excludeObject, priceLimit, rank, patternWidth, tollerance, previous)
{
    var url = "rank="+rank+"&priceLimit="+priceLimit+"&patternWidth="+patternWidth+"&tollerance="+tollerance+"&previous="+previous;
    if(excludeObject.length>0)
        $.each(excludeObject, function(i, val)
        {
            url += "&excludeObject="+val;
        })

    if(excludeCategory.length>0)
        $.each(excludeObject, function(i, val)
        {
            url += "&excludeCategory="+val;
        })
    if(includeCategory.length>0)
        $.each(includeCategory, function(i, val)
        {
            if(val!=null && val!=0)
                url += "&includeCategory="+val;
        })
    last_query = url;
    // var url = "rank=0&priceLimit=800&excludeObject=9&excludeObject=11";
    ajax_call(url);
}

function saveFurniture(){
    window.location.href = 'user/login';
}

function login(){
    var email = $( '#loginMail' ).val();
    var pass = $( '#loginPass' ).val();

    $.ajax({
        type: "POST",
        url: base_url + "home/login",
        data: { email: email, pass: pass },
        dataType: "text",
        success:  function(data){
            if ( data == 1 ) location.href = base_url + "room_types";
            else
            {
                $( ' .alert' ).attr( 'class', 'alert alert-danger' );
                $( ' .alert' ).html( '<h4 class="marBot0"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Wrong username or password</h4>' );
                $( '.alert' ).fadeIn( 50 );
                setTimeout( function(){
                    $( '.alert' ).fadeOut( 1000 );
                }, 2500);
            }
        }
    });
}



