<html>
    <head>
        <script> var Chartkick = {"language": "de"}; </script>
        <title>{style_title} style configurations</title>

        <?php include( 'includes.php' ) ?>
    </head>

    <body class="floor mockup-body">
        
        <div class="layer"></div>
        <div class="container txt-white">
            {header}
            
      	</div>

        <div class="style-config">

            <div class="container">
                <div class="">
                    {handle}
                 
                </div>
            </div>



<!--Start Style Confs-->
<div class="carousel-wrap floor-design">
<div class="Furntur-btn">Furniture </div>

    <div class="carousel-wrap__title">
<h3> Choose preffered floor plan for  <br>your bedroom </h3>
</div>
  <div class="owl-carousel">
    {handle}

    {confs}
    <div class="item">

                    <div class="" onclick="location.href = '<?php echo base_url(); ?>floorplan/configuration_layouts/{configuration_id}'">
                        <div class=" marBot0">
                            <div class="">
                                <div class="thumb bordered">
                                    <div class="style-config__item-number">
                                <p> 4 ITEMS </p>

                                    </div>
                                    <div class="style-config__item-check">
                                    <!-- <a href="#"><img class="check" src="<?php echo base_url(); ?>public/img/selection-check.svg" style="width:20px"></a> -->


                                    </div>
                                    

                                    <div class="style-config__item-name">

                                    <h4>{configuration_title}</h4>
                                    </div>

                                    <img src="<?php echo base_url(); ?>public/img/configurations/{configuration_img}" onerror="src='<?php echo base_url(); ?>public/img/no-img.png'">
                                </div>
                            </div>
                        </div>

                            </div>
                    </div>
                    {/confs}   
</div>
    
</div>
</div>

<!--End  Style Confs-->





        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/style_items.js"></script>


<script>
        $(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});




$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    navText: [
      "<i class='fa fa-caret-left'></i>",
      "<i class='fa fa-caret-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 5
      },
      1000: {
        items: 4
      }
      
    }
  })

</script>
    </body>
</html>