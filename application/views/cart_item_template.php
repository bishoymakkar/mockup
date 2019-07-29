<div class="item" onclick="view_prod_inner( '{id}', event )">
    <div class="cart-item" itemid="{id}">
        <div class="close-btn" onclick="remove_cart_item({id}, this)">x</div>
        <img src="<?php echo base_url(); ?>public/img/objects/{img}">
    </div>

    <h4 class="taL">{title}</h4>
    <h5 class="taL">${price}</h5>
</div>