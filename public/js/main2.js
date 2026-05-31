// todo モーダル

document.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelector('.aside_menu_bar_box');
    const aside = document.querySelector('aside');
    const taskModal = document.getElementById('taskModal');
    const status_id = document.getElementById('status_id');
    const openButtons = document.querySelectorAll('.dynamic_box_top2');
    const modalClose = document.getElementById('modal_close');
    const modalContentBottom1 = document.getElementById('modal_content_bottom_1');
    const modalContentBottom2 = document.getElementById('modal_content_bottom_2');
    const tasks = document.querySelectorAll('.dynamic_box_content');
    const task_id = document.getElementById('task_id');
    const modalTextTop1 = document.getElementById('modal_text_top_1');
    const modalTextTop2 = document.getElementById('modal_text_top_2');
    openButtons.forEach(button => {
        button.addEventListener('click', () => {
            const statusId = button.dataset.statusId;
            status_id.value = statusId;
            modalTextTop2.classList.remove('show');
            modalContentBottom2.classList.remove('show');
            taskModal.classList.add('show');
            modalTextTop1.classList.add('show');
            modalContentBottom1.classList.add('show');
        });
    });
    tasks.forEach(task => {
        task.addEventListener('click', () => {
            const taskId = task.dataset.taskId;
            console.log(taskId);
            task_id.value = taskId;
            modalTextTop1.classList.remove('show');
            modalContentBottom1.classList.remove('show');
            taskModal.classList.add('show');
            modalTextTop2.classList.add('show');
            modalContentBottom2.classList.add('show');
        });
    });
    menu.addEventListener('click', () => {
        aside.classList.toggle('active');
    });
    modalClose.addEventListener('click', () => {
        taskModal.classList.remove('show');
    });
});

