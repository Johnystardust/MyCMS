/**
 * Created by Tim on 10/26/2015.
 */
var $number = 1;
var $type;

function addElement($value){

    // Get the number of previous form-block's
    //alert($('.form-body').find('.form-block').length);



    // If the value is text add a new text & title form-block
    if($value == 'text'){
        $type = 'text';

        $('.form-body').append("\
        <div class='form-block' id='"+$number+"'>\
            <div class='form-block-top'>\
                <span>Text & title - Block "+$number+"</span>\
                <span class='pull-right'><a class='btn btn-green btn-close' onclick='destroyElement("+$number+")' href='#'>X</a></span>\
            </div>\
            <div class='form-block-body'>\
                <input type='hidden' name='elements["+$number+"][type]' value='"+$type+"'/>\
                <div class='form-group'>\
                    <label for='title'>Title</label>\
                    <input class='form-control' type='text' name='elements["+$number+"][title]' value=''/>\
                </div>\
                <div class='form-group'>\
                    <label for='content'>Content</label>\
                    <textarea class='form-control' name='elements["+$number+"][content]' cols='30' rows='10'></textarea>\
                </div>\
            </div>\
        </div>\
        ");
    }

    // If the value is image add a new image form-block
    if($value == 'image'){
        $type = 'image';
        
        $('.form-body').append("\
        <div class='form-block' id='"+$number+"'>\
            <div class='form-block-top'>\
                <span>Image - Block "+$number+"</span>\
                <span class='pull-right'><a class='btn btn-green btn-close' onclick='destroyElement("+$number+")' href='#'>X</a></span>\
            </div>\
            \
            <div class='form-block-body'>\
                <input type='hidden' name='elements["+$number+"][type]' value='"+$type+"'/>\
                <div class='form-group'>\
                    <label for='image'>Image</label><br/>\
                    <input id='image-value-"+$number+"' type='hidden' name='elements["+$number+"][image][src]' value=''/>\
                    <img style='display: none;' class='preview-image-"+$number+"' src='' width='200' height='auto'/>\
                    <br/><br/>\
                    <a onclick='openOverlay("+$number+")' class='select-image-btn-"+$number+" btn btn-green' href='#'>Select Image</a>\
                    <a style='display: none;' onclick='removeImage("+$number+")' class='remove-image-btn-"+$number+" btn btn-green' href='#'>Remove Image</a>\
                </div>\
                \
                <div class='form-group image-options-"+$number+"' style='display: none;'>\
                    <hr/>\
                    <label>Position</label><br/>\
                    <div class='btn-group' data-toggle='buttons'>\
                        <label class='btn btn-green active'>\
                            <label><input checked type='radio' name='elements["+$number+"][image][position]' value='left'/>Align left</label>\
                        </label>\
                        <label class='btn btn-green'>\
                            <label><input type='radio' name='elements["+$number+"][image][position]' value='center'/>Center the image</label>\
                        </label>\
                        <label class='btn btn-green'>\
                            <label><input type='radio' name='elements["+$number+"][image][position]' value='right'/>Align right</label>\
                        </label>\
                    </div>\
                    \
                    <hr/>\
                    <label>Size</label><br/>\
                    <div class='btn-group' data-toggle='buttons'>\
                        <label class='btn btn-green active'>\
                            <label><input type='radio' name='elements["+$number+"][image][size][width]' value='original'/>Original</label>\
                        </label>\
                        <label class='btn btn-green'>\
                            <label><input type='radio' name='elements["+$number+"][image][size][width]' value='100%'/>100% Width</label>\
                        </label>\
                    </div>\
                    \
                    <hr/>\
                    <label>Set max width</label>\
                    <input class='form-control form-contol-half' type='number' name='elements["+$number+"][image][size][maxwidth]'/>\
                    <br/>\
                    <label>Set max height</label>\
                    <input class='form-control form-contol-half' type='number' name='elements["+$number+"][image][size][maxheight]'/>\
                </div>\
            </div>\
        </div>\
        ")
    }

//<div class='checkbox'>\
//<label><input  type='checkbox' name='elements["+$number+"][image][width][full]' value='100%'>Set width to 100%.</label>\
//</div>\

    $('.main').find('select').val('default');

    $number ++;
}

function destroyElement($id){
    $('#page-form').find('#'+$id).remove();

    return false;
}




