document.addEventListener('DOMContentLoaded', () => {
    let mode = '0';
    let taskId = null;
    let statusId = null;

    const modal = document.getElementById('modal');

    function render() {
        modal.dataset.mode = mode;
        document.getElementById('task_id').value = taskId;
        document.getElementById('status_id').value = statusId;
    }
});
