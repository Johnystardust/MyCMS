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
                echo '<a onclick="removeImage('.$number.')" class="remove-image-btn btn btn-green" href="#">Remove Image</a>';
                echo '<a style="display: none;" onclick="openOverlay('.$number.')" class="select-image-btn btn btn-green" href="#">Select Image</a>';
            }
            else {
                echo '<a style="display: none;" onclick="removeImage('.$number.')" class="remove-image-btn btn btn-green" href="#">Remove Image</a>';
                echo '<a onclick="openOverlay('.$number.')" class="select-image-btn btn btn-green" href="#">Select Image</a>';
            }
            ?>
        </div>

        <div class="form-group image-options">
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
        </div>


        <div class="checkbox">
            <label><input type="checkbox" name="elements[<?php echo $number; ?>][image][width][full]" value="100%" <?php if($element->image->width->full == '100%'){ echo 'checked'; } ?>>Set width to 100%.</label>
        </div>

<!---->
<!--        <div class="form-group">-->
<!--            <label for="">Max width</label>-->
<!--            <input class="form-control" type="number" name="elements[--><?php //echo $number; ?><!--][image][width][maxwidth]"/>-->
<!--        </div>-->
<!---->
<!--        <div class="form-group">-->
<!--            <label for="">Max height</label>-->
<!--            <input class="form-control" type="number" name="elements[--><?php //echo $number; ?><!--][image][height]"/>-->
<!--        </div>-->

    </div>
</div>