$(document).ready(function(){
    //$('.preview-image').hide();
    //$('.remove-image-btn').hide();
});

// Function to open the admin overlay
function openOverlay(){
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

    // Show the image options
    $('.image-options').show();

    // Close the overlay
    closeOverlay();

    // prevent the default link follow
    event.preventDefault();
}

// Function to remove the image from the image-value input field and the preview image
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