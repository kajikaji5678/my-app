document.addEventListener('DOMContentLoaded', () => {
    // まず状態だけ考える
    let mode = '0';
    let taskId = null;
    let statusId = null;
    let taskData = null;

    const modal = document.getElementById('modal');
    const openButtons = document.querySelectorAll('.dynamic_box_top2');
    const tasks = document.querySelectorAll('.dynamic_box_content');
    const assignButton = document.querySelector('.assign_button');
    const modalClose = document.querySelector('.modal_close');
    const taskName = document.getElementById('task_name');
    const categoryName = document.getElementById('category_name');
    const typeName = document.getElementById('type_name');
    const milestoneName = document.getElementById('milestone_name');

    // DOM更新をここで集約している
    function render() {
        modal.dataset.mode = mode;
        document.getElementById('task_id').value = taskId ?? '';
        document.getElementById('status_id').value = statusId ?? '';

        if (taskData) {
            taskName.textContent = taskData.task_name;
            categoryName.textContent = taskData.category.category_name;
            typeName.textContent = taskData.type.type_name;
            milestoneName.textContent = taskData.milestone.milestone_name;
        }
    }

    modalClose.addEventListener('click', () => {
        mode = '0'
        render();
    });

    openButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            statusId = btn.dataset.statusId;
            mode = '1';
            render();
        });
    });

    tasks.forEach(task => {
        task.addEventListener('click', async () => {
            taskId = task.dataset.taskId;
            const response = await fetch(`/tasks/${taskId}`);
            taskData = await response.json();
            mode = '2';
            render();
        });
    });
    assignButton.addEventListener('click', () => {
        mode = '3';
        render();
    });
});
