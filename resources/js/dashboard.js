import Chart from 'chart.js/auto';

const ctx = document.getElementById('workTimeChart');
console.log('dashboard loaded');

if (ctx) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['見積もり', '実績'],
            datasets: [{
                data: [
                    window.workTimeData.estimated,
                    window.workTimeData.actual
                ],
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: value => value + '分'
                    }
                }
            }
        }
    });
}
