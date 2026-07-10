import './bootstrap';

import Chart from 'chart.js/auto';
import ChartDataLabels from 'chartjs-plugin-datalabels';

import Alpine from 'alpinejs';

import './tiptap'

window.Alpine = Alpine;

Alpine.start();
Chart.register(ChartDataLabels);
