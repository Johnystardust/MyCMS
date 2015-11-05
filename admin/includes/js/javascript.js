/**
 * Created by Tim on 10/26/2015.
 */
var $number = 1;
var $type;

function addElement($value){

    // Get the number of previous form-block's
    alert($('.form-body').find('.form-block').length);



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
            <div class='form-block-body'>\
                <input type='hidden' name='elements["+$number+"][type]' value='"+$type+"'/>\
                <div class='form-group'>\
                    <label for='image'>Image</label><br/>\
                    <input id='image-value' type='hidden' name='elements["+$number+"][image]' value=''/>\
                    <img class='preview-image' src='' width='200' height='auto'/>\
                    <br/>\
                    <a onclick='openOverlay()' class='select-image-btn btn btn-green' href='#'>Select Image</a>\
                    <a onclick='removeImage()' class='remove-image-btn btn btn-green' href='#'>Remove Image</a>\
                </div>\
            </div>\
        </div>\
        ")
    }

    $('.main').find('select').val('default');

    $number ++;
}

function destroyElement($id){
    $('#page-form').find('#'+$id).remove();

    return false;
}




