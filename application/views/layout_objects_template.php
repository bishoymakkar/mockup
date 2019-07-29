{objects}
<div class="item" onclick="add_item_to_cart({id})">
    <div class="cart-item" itemid="{id}">
        <div class="close-btn" onclick="remove_cart_item({id})">x</div>
        <img src="<?php echo base_url(); ?>public/img/objects/{img}">
    </div>

    <h4 class="cart-name">{title}</h4>
    <h5 class="taL">${price}</h5>
</div>
{/objects}