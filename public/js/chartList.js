// const data = [
//     { name: "Aさん", start_time: "10:00", end_time: "11:00" },
//     { name: "Bさん", start_time: "13:00", end_time: "18:00" },
// ];
// const startHour = Number(data.start_time.split(':')[0]);
// const endHour = Number(data.end_time.split(':')[0]);

// const startIndex = startHour - 9;
// const endIndex = endHour - 9;

console.table(data);

for (let j = 0; j < data.length; j++) {
    const createChartbox = document.createElement('div');
    createChartbox.classList.add('content_1');
    document.querySelector('.content').appendChild(createChartbox);

    for (let i = 0; i < 14; i++) {
        const startHour = Number(data[j].start_time.split(':')[0]);
        const endHour = Number(data[j].end_time.split(':')[0]);

        const startIndex = startHour - 9;
        const endIndex = endHour - 9;
        const active = i >= startIndex && i < endIndex;

        const newDiv = document.createElement("div");
        newDiv.classList.add('box');
        if (active) newDiv.classList.add('act')
        createChartbox.appendChild(newDiv);
    }
}

window.addEventListener('DOMContentLoaded', () => {
    for (let i = 0; i < data.length; i++) {
        // 専用divを生成する
        const createBox = document.createElement('div');
        createBox.classList.add('row_height_content');

        // pを生成する
        const p = document.createElement('p');
        p.textContent = data[i].name;

        // ぶち込む
        createBox.appendChild(p);
        document.querySelector('.row_height').appendChild(createBox);
    }
});