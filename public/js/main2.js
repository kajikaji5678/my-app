const menu = document.querySelector('.aside_menu_bar_box');
const aside = document.querySelector('aside');

menu.addEventListener('click', () => {
    aside.classList.toggle('active');
});