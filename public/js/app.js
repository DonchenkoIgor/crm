document.addEventListener('DOMContentLoaded', function () {
    const burger = document.getElementById('burgerBtn');
    const nav = document.getElementById('navPanel');
    const icon = document.getElementById('burgerIcon');

    burger.addEventListener('click', () => {
        nav.classList.toggle('open');

        const isOpen = nav.classList.contains('open');
        icon.innerHTML = isOpen ? '&times;' : '&#9776;';
    });
});
