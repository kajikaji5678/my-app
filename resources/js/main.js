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