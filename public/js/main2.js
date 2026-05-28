const menu = document.querySelector('.aside_menu_bar_box');
const aside = document.querySelector('aside');

const modal = document.getElementById('modal');

document.getElementById('openModal').onclick = () => {
    modal.classList.remove('hidden');
}

document.querySelectorAll('.openModal2').forEach(el => {
    el.addEventListener('click', () => {
        document.getElementById('modal2').classList.remove('hidden');
    });
});

menu.addEventListener('click', () => {
    aside.classList.toggle('active');
});


