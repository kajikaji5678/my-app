import Chart from 'chart.js/auto';

const ctx = document.getElementById('workTimeChart');
const ctx2 = document.getElementById('workTimeChart2');

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

if (ctx2) {
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: [
                window.workTimeData2.label1,
                window.workTimeData2.label2,
                window.workTimeData2.label3,
                window.workTimeData2.label4],
            datasets: [{
                data: [
                    window.workTimeData2.task1,
                    window.workTimeData2.task2,
                    window.workTimeData2.task3,
                    window.workTimeData2.task4,
                ]
            }]
        },
        options: {
            responsive: true,
        }
    });
}
