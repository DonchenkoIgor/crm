document.addEventListener('DOMContentLoaded', function () {
    const burger = document.getElementById('burgerBtn');
    const nav = document.getElementById('navPanel');

    burger.addEventListener('click', () => {
        nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
    });
});
