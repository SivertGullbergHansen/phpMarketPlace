let lastKnownScrollPosition = 0;
let ticking = false;

function doSomething(scrollPos) {
    if (scrollPos > 500) {
        document.getElementById('goTop').classList.remove('invis');
    } else {
        document.getElementById('goTop').classList.add('invis');
    }
}

document.addEventListener('scroll', function (e) {
    lastKnownScrollPosition = window.scrollY;

    if (!ticking) {
        window.requestAnimationFrame(function () {
            doSomething(lastKnownScrollPosition);
            ticking = false;
        });

        ticking = true;
    }
});

function goUp() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    });
}

document.body.innerHTML += '<button class="invis" onclick="goUp()" id="goTop"><p>&uparrow;</p></button>';