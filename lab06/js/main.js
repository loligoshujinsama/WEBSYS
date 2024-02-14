window.onload = function() {
    var thumbnails = document.querySelectorAll('.img-thumbnail');
    thumbnails.forEach(function(thumbnail) {
        thumbnail.addEventListener('click', function() {
            var largeImageURL = this.getAttribute('data-large');
            document.getElementById('popupImage').src = largeImageURL;
            var caption = this.alt;
            document.getElementById('popupCaption').innerText = caption;
            var modal = new bootstrap.Modal(document.getElementById('imageModal'));
            modal.show();
        });
    });
};

window.onload = function activateMenu() {
    const navLinks = document.querySelectorAll('nav a');

    navLinks.forEach(function(link) {
        const page = link.classList[link.classList.length-1];
        const url = new URL(document.URL);
        if (url.pathname === '/' && page === 'index') {
            link.classList.add('active');
        } else if (url.pathname.includes(page)) {
            link.classList.add('active');
        }
    });
};