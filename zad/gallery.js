const thumbnails = document.querySelectorAll('.thumbnail');
const mainImage = document.querySelector('.main-image');
const mainImageURL = thumbnails[0].getAttribute('src');

thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', () => {
        const thumbnailURL = thumbnail.getAttribute('src');
        const currentMainImageURL = mainImage.getAttribute('src');
        mainImage.src = thumbnailURL;
        thumbnail.src = currentMainImageURL;
    });
});

