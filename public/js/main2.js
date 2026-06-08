// todo モーダル
// todo 6/8 React始動‼

document.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelector('.aside_menu_bar_box');
    const aside = document.querySelector('aside');
    const modal = document.getElementById('modal');
    const status_id = document.getElementById('status_id');
    const openButtons = document.querySelectorAll('.dynamic_box_top2');
    const modalClose = document.getElementById('modal_close');
    const tasks = document.querySelectorAll('.dynamic_box_content');
    const task_id = document.getElementById('task_id');
    const assignButton = document.querySelector('.assign_button');
    modalClose.addEventListener('click', () => {
        modal.dataset.mode = '0';
    });
    openButtons.forEach(button => {
        button.addEventListener('click', () => {
            const statusId = button.dataset.statusId;
            status_id.value = statusId;
            modal.dataset.mode = '1';
        });
    });
    tasks.forEach(task => {
        task.addEventListener('click', () => {
            const taskId = task.dataset.taskId;
            task_id.value = taskId;
            modal.dataset.mode = '2';
        });
    });
    assignButton.addEventListener('click', () => {
        modal.dataset.mode = '3';
    });
    menu.addEventListener('click', () => {
        aside.classList.toggle('active');
    });
});

