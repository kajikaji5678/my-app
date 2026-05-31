const menu = document.querySelector('.aside_menu_bar_box');
const aside = document.querySelector('aside');

menu.addEventListener('click', () => {
    aside.classList.toggle('active');
});

// todo モーダル
const taskModal = document.getElementById('taskModal');
const status_id = document.getElementById('status_id');
const openButtons = document.querySelectorAll('.dynamic_box_top2');
const modalClose = document.getElementById('modal_close');

document.addEventListener('DOMContentLoaded', () => {
    openButtons.forEach(button => {
        button.addEventListener('click', () => {
            const statuId = button.dataset.statuId;
            status_id.value = statuId;
            taskModal.classList.add('show');
        });
    });
    modalClose.addEventListener('click', () => {
        taskModal.classList.remove('show');
    });
});

