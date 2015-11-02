/**
 * Created by Tim on 10/26/2015.
 */

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

    $('.main').find('select').val('default');

    $number ++;
}

function destroyElement($id){
    $('#page-form').find('#'+$id).remove();

    return false;
}





