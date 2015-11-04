/**
 * Created by Tim on 10/26/2015.
 */

$(document).ready(function(){

    $('.preview-image').hide();
    $('.remove-image-btn').hide();

});

function openOverlay(){
    $('.overlay').show();
    event.preventDefault();
}

function closeOverlay(){
    $('.overlay').hide();
    event.preventDefault();
}


function chooseImage($value){
    // Send the chosen image value
    $('#image-value').attr('value', $value);

    // Set the preview Image to the image value
    $('.preview-image').show();
    $('.preview-image').attr('src', $value);

    // Hide the select image button
    $('.select-image-btn').hide();

    // Show the Delete button
    $('.remove-image-btn').show();

    // Close the overlay
    closeOverlay();

    event.preventDefault();
}

function removeImage(){
    // remove the image-value value attr
    $('#image-value').attr('value', '');

    // remove the preview-image
    $('.preview-image').attr('src', '');
    $('.preview-image').hide();

    // Hide the delete button
    $('.remove-image-btn').hide();

    // Show the select button
    $('.select-image-btn').show();
}

var $number = 1;
var $type;

function addElement($value){

    if($value == 'text'){
        $type = 'text';

        $('.form-body').append("\
        <div class='form-block' id='"+$number+"'>\
            <div class='form-block-top'>\
                <span>New form block</span>\
                <span class='pull-right'><a onclick='destroyElement("+$number+")' href='#'>X</a></span>\
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
    if($value == 'image'){
        $type = 'image';
        
        $('.form-body').append("\
        <div class='form-block' id='"+$number+"'>\
            <div class='form-block-top'>\
                <span>image</span>\
                <span class='pull-right'><a onclick='destroyElement("+$number+")' href='#'>X</a></span>\
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




