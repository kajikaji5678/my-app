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
    const comment_button = document.querySelector('.comment-button');
    const container = document.querySelector('.modal-comment-1');
    const template = document.querySelector('.comment-box');

    // DOM更新をここで集約している
    function render() {
        modal.dataset.mode = mode;
        document.getElementById('task_id').value = taskId ?? '';
        document.getElementById('status_id').value = statusId ?? '';

        if (taskData) {
            taskName.textContent = taskData.response.task_name;
            categoryName.textContent = taskData.response.category.category_name;
            typeName.textContent = taskData.response.type.type_name;
            milestoneName.textContent = taskData.response.milestone.milestone_name;

            container.innerHTML = '';
            for (let i = 0; i < taskData.comments.length; i++) {
                const box = template.cloneNode(true);
                box.querySelector('.comment-content').textContent = taskData.comments[i].body;
                container.appendChild(box);
            }
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
            console.log(taskData);
            mode = '2';
            render();
        });
    });
    comment_button.addEventListener('click', (e) => {
        e.preventDefault();

        fetch(`/toDo/comments/${taskId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                body: document.querySelector('[name="body"]').value
            })
        })
    });
    assignButton.addEventListener('click', () => {
        mode = '3';
        render();
    });
});
