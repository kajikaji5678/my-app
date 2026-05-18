import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

const modal = document.getElementById('eventModal');

function openModal() {
    modal.classList.remove('hidden');
}

function closeModal() {
    modal.classList.add('hidden');
}

let selectedDate = null;


document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('calendar');
    const calendar = new Calendar(el, {
        locale: 'ja',
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth', // 月別表示
        events: function (_, successCallback) {
            fetch('/main/schedules')
                // JSON形式にする
                .then(res => res.json())
                // FullCalendarが読み取れるように変更する
                .then(data => {
                    successCallback(
                        data.map(item => ({
                            title: `${item.title}. ${item.start_time.slice(0, 5)} ~ ${item.end_time.slice(0, 5)}`,
                            start: item.date,
                            color: item.status === 'approved' ? 'green' : 'orange'
                        }))
                    )
                });
        },

        dateClick: function (info) {
            selectedDate = info.dateStr;
            openModal();
        }
    });

    calendar.render();
});

document.getElementById('saveEvent').addEventListener('click', () => {
    const title = document.getElementById('title').value;
    const startTime = document.getElementById('startTime').value;
    const endTime = document.getElementById('endTime').value;

    if (!title || !startTime || !endTime) return;

    fetch('/main/a', {
        method: 'POST',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            title: title,
            date: selectedDate,
            start_time: startTime,
            end_time: endTime,
            status: 'pending'
        })
    });

    closeModal();
});

document.querySelector('.close_button').addEventListener('click', () => {
    closeModal();
});

// fetch('/main/a', {
//     method: 'POST',
//     credentials: 'same-origin',
//     headers: {
//         'Content-Type': 'application/json',
//         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//     },
//     body: JSON.stringify({
//         title: title,
//         date: info.dateStr,
//         start_time: startTime,
//         end_time: endTime,
//         status: 'pending'
//     })
// });