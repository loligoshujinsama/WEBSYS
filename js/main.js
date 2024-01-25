
// selects all elements with the class img-thumbnail, and adds a click event listener to each of them
// when the user clicks on an image, the image source is copied to the popupImage element
// the modal is then shown with bootstrap's modal.show() method

window.onload = function() {
    var thumbnails = document.querySelectorAll('.img-thumbnail');
    thumbnails.forEach(function(thumbnail) {
        thumbnail.addEventListener('click', function() {
            // Get the URL of the large image from the data-large attribute
            var largeImageURL = this.getAttribute('data-large');
            // Set the src of popupImage to the URL of the large image
            document.getElementById('popupImage').src = largeImageURL;
            // Captioning
            var caption = this.alt;
            document.getElementById('popupCaption').innerText = caption;
            // Show
            var modal = new bootstrap.Modal(document.getElementById('imageModal'));
            modal.show();
        });
    });
};

