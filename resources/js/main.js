function updateClock() {
    const now = new Date();

    const hour = String(now.getHours()).padStart(2, '0');
    const min = String(now.getMinutes()).padStart(2, '0');
    const sec = String(now.getSeconds()).padStart(2, '0');

    document.getElementById('show_hour').textContent = hour;
    document.getElementById('show_min').textContent = min;
    document.getElementById('show_sec').textContent = sec;
}

updateClock();

setInterval(updateClock, 1000);

const items = document.querySelectorAll('.other_buttons');
const parent = document.querySelector('.buttom_area_2')

items.forEach(item => {
    item.addEventListener('click', () => {
        if(item.classList.contains('active')) {
            items.forEach(i => i.classList.remove('active'));
            parent.classList.remove('opened');
            return;
        }

        items.forEach(i => i.classList.remove('active'));

        item.classList.add('active');
        parent.classList.add('opened');
    });
});