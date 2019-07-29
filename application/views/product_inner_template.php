 <div class="row dN" id="prod_popup">
    <div class="product-div">
        <div class="product-box">
            <div class="prod-img">
                <img src="<?php echo base_url();?>public/img/objects/{prod_img}">
            </div>
        
            <div class="row">
                <div class="desc-box">
                    <div style="margin: 25px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="prod-name">
                                    {prod_name}
                                </div>
                            </div>
                
                            <div class="col-md-12">
                                <div class="prod-desc">
                                    <p class="prod-desc-p">{prod_desc}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 closeup-div">
                                {prod_images}
                                <div class="col-md-4">
                                    {image_name}
                                </div>
                                {/prod_images}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="close-div" onclick="hide_product_popup()">
    <img src="<?php echo base_url();?>public/img/select_close.png">
</div>
</div>
      