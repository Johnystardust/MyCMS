<div class="form-block" id="<?php echo $number; ?>">

    <div class="form-block-top">
        <span>Image - Block <?php echo $number; ?></span>
        <span class="pull-right"><a class="btn btn-green btn-close" href="#" onclick="destroyElement(<?php echo $number; ?>)">X</a></span>
    </div>

    <div class="form-block-body">

        <input type="hidden" name="elements[<?php echo $number; ?>][type]" value="<?php echo $element->type; ?>"/>

        <div class="form-group">
            <label for="image">Image</label><br/>
            <input id="image-value" type="hidden" name="elements[<?php echo $number; ?>][image]" value="<?php echo $element->image ?>"/>

            <img class="preview-image" src="<?php echo $element->image ?>" width="200" height="auto"/>

            <br/><br/>

            <span>Image name: </span>
            <span>Image size: </span>

            <a onclick="removeImage()" class="remove-image-btn btn btn-green" href="#">Remove Image</a>
            <a onclick="openOverlay()" class="select-image-btn btn btn-green" href="#">Select Image</a>
        </div>

    </div>
</div>