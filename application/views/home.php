<!DOCTYPE html>
<?php header('Access-Control-Allow-Origin: *'); ?>
<script> var site_url = '<?php echo site_url();?>';</script>
<html lang="en">
<head>
	<title>Home Mockup</title>
	<?php include( 'includes.php' ); ?>
    <script src="<?= base_url();?>public/js/home.js"></script>
</head>
<body>
    <div class="alert alert-success" style="z-index: 1000; opacity: 1; position: fixed; top: 50px; left: 0px; right: 0px; margin: auto; width: 50%;" role="alert"></div>
	<section class="section alt" id="examples">
		<div class="container16">
			{header_html}
			<div class="row body-container">
				<div id="fur_container" class="column12">
					<!-- <p > -->
					       <img id="fur_image" class="fur_image" src="<?= base_url();?>public/img/furniture.png" usemap="#fur_map">
                        <!--
                        <map name="fur_map">
                        </map>
                        -->
                        <!--
                        <map name="couch">
                            <area class="fur_area" data-key="0" shape="rect" coords="118, 291, 908, 697" href="#" />
                        </map>
                        <map name="sofa">
                            <area class="fur_area" data-key="0" shape="rect" coords="311, 273, 717, 711" href="#" />
                        </map>
                        <map name="chair">
                            <area class="fur_area" data-key="0" shape="rect" coords="305, 268, 717, 677" href="#" />
                        </map>
                        -->
					<!-- </p> -->
				</div>
				<div class="column3 right-container">
					<div class="row filter-container">
						<div class="column4">
              <div class="row">
                <!-- <h3>Welcome Hatem!</h3> -->
                <h4>
                    <?php 
                        if(!isset($this->session) || (isset($this->session) && $this->session->userdata('mockup_email') == ''))
                            echo "<a href='".base_url()."user/register'>Sign Up</a> or <a href='".base_url()."user/login'>Login</a>";
                        else echo "<a href='".base_url()."gallery'>My Gallery</a>";
                    ?>
                </h4>
                
              </div>
							<div class="row price-size-container">
									<div class="column2 inner-filter-label-left inner-filter-labels">
                                        <div class="input-group">
                                            <input type="text"  class="form-control"  placeholder="Price" id="fur_price">
                                            <span class="input-group-addon" id="basic-addon2">€</span>
                                        </div>
									</div>
									<div class="column2 inner-filter-label-right inner-filter-labels">
                                        <div class="input-group">
                                            <input type="text"  class="form-control"  placeholder="Size" id="fur_size">
                                            <span class="input-group-addon" id="basic-addon2">m</span>
                                        </div>
									</div>
							</div>
							<div class="row inner-filter-container">
								<div class="column4 inner-inner-filter-container">
									<select id="fur_type" class="form-control">
										<option value="" disabled selected>Select Type</option>
                                        <!--
										<option value="couch">Couch</option>
										<option value="chair">Chair</option>
										<option value="sofa">Sofa</option>
                                        -->

                                        <option value="0">Any Type</option>
                                        <option value="1">chair</option>
                                        <option value="2">lamp</option>
                                        <option value="3">sideboard</option>
                                        <option value="4">side table</option>
                                        <option value="5">table</option>
                                        <option value="6">bookshelf</option>
                                        <option value="7">dresser</option>
                                        <option value="8">desk</option>
                                        <option value="9">cocktail table</option>
                                        <option value="10">sofa</option>

									</select>
								</div>
							</div>
                            <div class="row inner-filter-container">
                                <div class="column4 inner-inner-filter-container">
                                    <div class="input-group submit-button-cotainer">
                                        <input type="button"  class="form-control btn btn-default btn" value="Get New Result" placeholder="Size" id="get-new-result" onclick="get_new_result()">
                                    </div>
                                </div>
                            </div>						</div>
					</div>
					<div class="row info-container">
						<div class="column4">
							<div id="more-info-container">
                                <Strong>Shopping Cart</Strong>
                                <table class="name_price_table">
                                    <tr class="header"><th>Name</th><th>Price</th></tr>
                                    <tr class="item"><td>&nbsp;</td><td>&nbsp;</td></tr>
                                    <tr class="item"><td>&nbsp;</td><td>&nbsp;</td></tr>
                                    <tr class="item"><td>&nbsp;</td><td>&nbsp;</td></tr>
                                    <tr class="end"></tr>
                                    <tr class="total"><td>Total</td><td class="num">0</td></tr>
                                </table>
                            </div>
						</div>
					</div>
                    <div class="row inner-filter-container">
                        <div class="column4 inner-inner-filter-container">
                            <div class="input-group submit-button-cotainer ">
                                <div class="col-lg-6 col-md-12"><div class="row"><input type="button"  class="form-control btn btn-default btn" value="Different Result" placeholder="Size" id="get-different-result" onclick="get_different_result()"></div></div>
                                 <div class="col-lg-6 col-md-12"><input type="button"  class="form-control btn btn-default btn" value="Save Result" placeholder="Size" id="get-different-result" onclick="save_result()"></div>
                            </div>
                        </div>
                    </div>  
				</div>
			</div>
		</div>
	</section>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <button type="button" onclick="get_different_result()" class="btn btn-primary">Different Object</button>
                <h4 class="modal-title" id="myModalLabel">Properties</h4>
            </div>
            <div class="modal-body">
                <h3>Here are the properties of your choice accept?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveFurniture()">Save</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>
