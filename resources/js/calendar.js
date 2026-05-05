import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('calendar');
    const calendar = new Calendar(el, {
        locale: 'ja',
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth', // 月別表示
        dateClick: function(info) {
            const title = prompt('予定を入力');
            if (title) {
                calendar.addEvent({
                    title: title,
                    start: info.dateStr,
                    color: 'green'
                });
            }
        }
    });

    calendar.render();
});