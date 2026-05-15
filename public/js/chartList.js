const data = {
    name: "Aさん",
    start_time: "10:00",
    end_time: "13:00"
};

const startHour = Number(data.start_time.split(':')[0]);
const endHour = Number(data.end_time.split(':')[0]);

const startIndex = startHour - 9;
const endIndex = endHour - 9;

let html = '';

for (let i = 0; i < 14; i++) {
    const active = i >= startIndex && i < endIndex;

    html += `
        <div class="box ${active ? 'act' : ''}<div>"
    `;
}

document.querySelector('.content_1').innerHTML = html;