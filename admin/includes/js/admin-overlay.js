$(document).ready(function(){
    //$('.preview-image').hide();
    //$('.remove-image-btn').hide();
});

// Function to open the admin overlay
function openOverlay($number){
    // Set a global variable
    alert($number);
    window.globalVariable = $number;

    // Set the src for the iframe
    $('#iframe').attr('src', 'media-select.php');

    // show the overlay
    $('.overlay').show();

    // prevent default link follow
    event.preventDefault();
}

// Function to close the admin overlay
function closeOverlay(){
    // hide the overlay
    $('.overlay').hide();

    // prevent the default link follow
    event.preventDefault();
}

// Function to choose the desired image from the images
function chooseImage($value, $number){
    // Send the chosen image value
    $('#image-value-'+$number).attr('value', $value);

    // Set the preview Image to the image value
    $('.preview-image-'+$number).show();
    $('.preview-image-'+$number).attr('src', $value);

    // Hide the select image button
    $('.select-image-btn-'+$number).hide();

    // Show the Delete button
    $('.remove-image-btn-'+$number).show();

    // Show the image options
    $('.image-options-'+$number).show();

    // Close the overlay
    closeOverlay();

    // prevent the default link follow
    event.preventDefault();
}

// Function to remove the image from the image-value input field and the preview image
function removeImage($number){
    // remove the image-value value attr
    $('#image-value-'+$number).attr('value', '');

    // remove the preview-image
    $('.preview-image-'+$number).attr('src', '');
    $('.preview-image-'+$number).hide();

    // Hide the image options
    $('.image-options-'+$number).hide();

    // Hide the delete button
    $('.remove-image-btn-'+$number).hide();

    // Show the select button
    $('.select-image-btn-'+$number).show();
}