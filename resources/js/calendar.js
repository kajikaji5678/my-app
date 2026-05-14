import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import { start } from 'alpinejs';


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
                        title: `${item.title}. ${item.start_time} ~ ${item.end_time}`,
                        start: item.date,
                        color: item.status === 'approve' ? 'green' : 'orange'
                    }))
                )
            });
        },

        dateClick: function(info) {
            const title = prompt('予定を入力');
            if (!title) return;
            const startTime = prompt('開始時間');
            if (!startTime) return;
            const endTime = prompt('終了時間');
            if (!endTime) return;

            fetch('/main/schedules', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    title: title,
                    date: info.dateStr,
                    startTime: startTime,
                    end_time: endTime,
                    status: 'pending'
                })
            })
            .then(res => {
                if (!res.ok) {
                    throw new Error(res.status);
                }
                return res.json();
            })
            .then(data => {
                calendar.addEvent({
                    title: `${data.title} ${data.start_time} ~ ${data.end_time}`,
                    start: data.date,
                    color: 'orange'
                });
            })
            .catch(error => {
                console.error(error);
            });
        }
    });

    calendar.render();
});