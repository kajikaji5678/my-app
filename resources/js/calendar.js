import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'


document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('calendar');
    const calendar = new Calendar(el, {
        locale: 'ja',
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth', // 月別表示
        events: function(_, successCallback) {
            fetch('/main/schedules')
            // JSON形式にする
            .then(res => {
                if (!res.ok) {
                    throw new Error('HTTP eroor' + res.status)
                }
                return res.json();
            })
            // FullCalendarが読み取れるように変更する
            .then(data => {
                successCallback(
                    data.map(item => ({
                        title: item.title,
                        start: item.date
                    }))
                )
            });
        },

        dateClick: function(info) {
            const title = prompt('予定を入力');
            if (title) {
                // POST送信
                fetch('/main/schedules',{
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        title: title,
                        date: info.dateStr
                    })
                }).then(response => response.json())
                .then(date => {
                    calendar.addEvent({
                        title: date.title,
                        start: date.date,
                        color: 'blue'
                    });
                }).catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    });

    calendar.render();
});