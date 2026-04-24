var slideIndex = 0;
var slideTimer = null;

showSlides();

function plusSlides(n) {
    showSlides(slideIndex + n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");

    if (n === undefined) { n = ++slideIndex; }
    if (n > slides.length) { slideIndex = 1; }
    else if (n < 1)        { slideIndex = slides.length; }
    else                   { slideIndex = n; }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";

    /* Clear any pending timer before starting a fresh one */
    if (slideTimer) { clearTimeout(slideTimer); }
    slideTimer = setTimeout(function () { showSlides(); }, 6000);
}
