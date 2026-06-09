document.addEventListener('DOMContentLoaded', () => {
    let mode = '0';
    let taskId = null;
    let statusId = null;

    const modal = document.getElementById('modal');
    const openButtons = document.querySelectorAll('.dynamic_box_top2');
    const tasks = document.querySelectorAll('.dynamic_box_content')
    const assignButton = document.querySelector('.assign_button');

    function render() {
        modal.dataset.mode = mode;
        document.getElementById('task_id').value = taskId;
        document.getElementById('status_id').value = statusId;
    }

    openButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            statusId = btn.dataset.statusId;
            mode = '1';
            render();
        });
    });

    tasks.forEach(task => {
        task.addEventListener('click', () => {
            taskId = task.dataset.taskId;
            mode = '2';
            render();
        });
    });
    assignButton.addEventListener('click', () => {
        modal.dataset.mode = '3';
    });
});
