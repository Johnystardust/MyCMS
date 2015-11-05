<div class="form-block" id="<?php echo $number; ?>">

    <div class="form-block-top">
        <span>Image - Block <?php echo $number; ?></span>
        <span class="pull-right"><a class="btn btn-green btn-close" href="#" onclick="destroyElement(<?php echo $number; ?>)">X</a></span>
    </div>

    <div class="form-block-body">

        <input type="hidden" name="elements[<?php echo $number; ?>][type]" value="<?php echo $element->type; ?>"/>
        <input id="number" type="hidden" value="<?php echo $number; ?>"/>

        <div class="form-group">
            <label for="image">Image</label><br/>
            <input id="image-value-<?php echo $number; ?>" type="hidden" name="elements[<?php echo $number; ?>][image][src]" value="<?php echo $element->image->src; ?>"/>

            <img class="preview-image-<?php echo $number; ?>" src="<?php echo $element->image->src; ?>" width="200" height="auto"/>

            <br/><br/>
            <?php
            if($element->image->src !== ''){
                echo '<a onclick="removeImage('.$number.')" class="remove-image-btn-'.$number.' btn btn-green" href="#">Remove Image</a>';
                echo '<a style="display: none;" onclick="openOverlay('.$number.')" class="select-image-btn-'.$number.' btn btn-green" href="#">Select Image</a>';
            }
            else {
                echo '<a style="display: none;" onclick="removeImage('.$number.')" class="remove-image-btn-'.$number.' btn btn-green" href="#">Remove Image</a>';
                echo '<a onclick="openOverlay('.$number.')" class="select-image-btn-'.$number.' btn btn-green" href="#">Select Image</a>';
            }
            ?>
        </div>

        <div class="form-group image-options-<?php echo $number; ?>">
            <hr/>

            <label>Position</label><br/>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-green <?php if($element->image->position == 'left'){ echo 'active'; } ?>">
                    <label><input type="radio" name="elements[<?php echo $number; ?>][image][position]" value="left" <?php if($element->image->position == 'left'){ echo 'checked'; } ?>/>Align left</label>
                </label>
                <label class="btn btn-green <?php if($element->image->position == 'center'){ echo 'active'; } ?>">
                    <label><input type="radio" name="elements[<?php echo $number; ?>][image][position]" value="center" <?php if($element->image->position == 'center'){ echo 'checked'; } ?>/>Center the image</label>
                </label>
                <label class="btn btn-green <?php if($element->image->position == 'right'){ echo 'active'; } ?>">
                    <label><input type="radio" name="elements[<?php echo $number; ?>][image][position]" value="right" <?php if($element->image->position == 'right'){ echo 'checked'; } ?>/>Align right</label>
                </label>
            </div>

            <hr/>

            <label>Size</label><br/>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-green <?php if($element->image->size->width == 'original'){ echo 'active'; } ?>">
                    <label><input type="radio" name="elements[<?php echo $number; ?>][image][size][width]" value="original" <?php if($element->image->size->width == 'original'){ echo 'checked'; } ?>/>Original</label>
                </label>
                <label class="btn btn-green <?php if($element->image->size->width == '100%'){ echo 'active'; } ?>">
                    <label><input type="radio" name="elements[<?php echo $number; ?>][image][size][width]" value="100%" <?php if($element->image->size->width == '100%'){ echo 'checked'; } ?>/>100% Width</label>
                </label>
            </div>

            <hr/>

            <label>Set max width</label>
            <input class="form-control form-contol-half" type="number" name="elements[<?php echo $number; ?>][image][size][maxwidth]" value="<?php echo $element->image->size->maxwidth; ?>"/>

            <br/>

            <label>Set max height</label>
            <input class="form-control form-contol-half" type="number" name="elements[<?php echo $number; ?>][image][size][maxheight]" value="<?php echo $element->image->size->maxheight; ?>"/>
        </div>

    </div>
</div>