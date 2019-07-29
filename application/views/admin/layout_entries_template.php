<div class="form-group {disp}">
          <label class="col-sm-3 control-label">Image Mapping</label>
          <div class="col-sm-5" id="image-mapper">
              <img src="<?php if(isset($current_layout)) echo base_url('public/img/layouts')."/".$current_layout[0]->layout_img;
               else echo base_url('public/img/layouts')."/".$layout[0]->img; ?>" id="targetImgEdit">
          </div>
        </div>

        <div class="form-group {disp}">
          <label class="col-sm-3 control-label">Object Coordinates</label>
          <div class="col-sm-5">
              pos_x<input type="text" name="pos_x"  id="pos_x" />
              pos_y<input type="text" name="pos_y" id="pos_y"  /><br/>
              <?php echo form_error('pos_x'); ?><?php echo form_error('pos_x'); ?>
              Width<input type="text" name="width"  id="width" />
              Height<input type="text" name="height" id="height" /> 
              <?php echo form_error('width'); ?><?php echo form_error('height'); ?>
          </div>
        </div>