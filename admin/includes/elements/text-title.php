<?php



?>
<div class="form-block" id="<?php echo $number; ?>">
    <div class="form-block-top">
        <span>New form block</span>
        <span class="pull-right"><a href="#" onclick="destroyElement(<?php echo $number; ?>)">X</a></span>
    </div>
    <div class="form-block-body">
        <input type="hidden" name="elements[<?php echo $number; ?>][type]" value="<?php echo $element->type; ?>">
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="elements[<?php echo $number; ?>][title]" value="<?php echo $element->title; ?>">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="elements[<?php echo $number; ?>][content]" cols="30" rows="10"><?php echo $element->content; ?></textarea>
        </div>
    </div>
</div>