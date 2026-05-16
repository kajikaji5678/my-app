

// 計算・描写を行う関数
function content() {
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
}

// 列側の名前を入れる関数
// dateの長さは人数分
// 順番は子から親に連結させていくイメージ
function nameList() {
    for (let i = 0; i < data.length; i++) {
        // 子コード
        /// pタグを生成する
        /// pタグのテキストをデータからとってくる
        const p = document.createElement('p');
        p.textContent = data[i].name;
        // 親コード
        /// pタグの親であるdivタグを生成する
        /// 親にクラス名をつける
        const createBox = document.createElement('div');
        createBox.classList.add('row_height_content');
        // 子を親につける
        createBox.appendChild(p);
        // 親を祖につける
        document.querySelector('.row_height').appendChild(createBox);
    }
}

// 現在時刻
// ただし下記はあくまで文字列としてあつかっているので不採用
// const now = new Date();
// const formatted = now
//     .toLocaleDateString("ja-JP", {
//         year: "numeric",
//         month: "2-digit",
//         day: "2-digit",
//     })
//     .split("/")
//     .join("-");

// const date2 = date.filter(item => item.date === formatted);

// 現在時刻
const now = new Date();
const year = now.getFullYear();
const month = now.getMonth();
const day = now.getDate();

const arrayString = data.map(item => item.date);
const split = arrayString[0].split("-");
console.log(split);


window.addEventListener('DOMContentLoaded', () => {
    nameList();
    content();
});
