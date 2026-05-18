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

const token = document.querySelector('meta[name="csrf-token"]').content;

// クリア関数
function clearView() {
    document.querySelector(".row_height").innerHTML = "";
    document.querySelector(".content").innerHTML = "";
}

// セレクタ宣言
const back = document.querySelector(".back");
const next = document.querySelector(".next");

// 現在時刻
let now = new Date();
let year = now.getFullYear();
let month = now.getMonth() + 1;
let day = now.getDate();

// 時刻いじって描写
back.addEventListener('click', () => {
    day -= 1;
    clearView();
    nameList();
    content();
});

next.addEventListener('click', () => {
    day += 1;
    clearView();
    nameList();
    content();
});

// 当日の配列を組む関数
function createNameArray() {
    // データの数字（文字列）を数値に変換した
    const arrayInt = data.map(item => item.date.split("-").map(Number));
    const data2 = [];

    for (let i = 0; i < data.length; i++) {
        if (year === arrayInt[i][0] && month === arrayInt[i][1] && day === arrayInt[i][2]) {
            data2.push(data[i]);
        }
    }

    return data2;
}

// 列側の名前を入れる関数
// dateの長さは人数分
// 順番は子から親に連結させていくイメージ
function nameList() {
    const data2 = createNameArray();
    console.log(data2);
    for (let i = 0; i < data2.length; i++) {
        // 子コード
        /// pタグを生成する
        /// pタグのテキストをデータからとってくる
        const p = document.createElement('p');
        p.textContent = data2[i].name;
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

// 計算・描写を行う関数
function content() {
    const data2 = createNameArray();
    for (let j = 0; j < data2.length; j++) {
        const createChartbox = document.createElement('div');
        createChartbox.classList.add('content_1');
        document.querySelector('.content').appendChild(createChartbox);

        for (let i = 0; i < 14; i++) {
            const startHour = Number(data2[j].start_time.split(':')[0]);
            const endHour = Number(data2[j].end_time.split(':')[0]);

            const startIndex = startHour - 9;
            const endIndex = endHour - 9;
            const active = i >= startIndex && i < endIndex;

            const newDiv = document.createElement("div");
            newDiv.classList.add('box');
            if (active && data2[j].status === 'pending') newDiv.classList.add('act_pending');
            if (active && data2[j].status === 'approved') newDiv.classList.add('act_approved');
            if (active) newDiv.dataset.userId = data2[j].user_id;
            if (active) newDiv.dataset.id = data2[j].id;
            createChartbox.appendChild(newDiv);
        }
    }
}

// 1度だけ発火するもの
window.addEventListener('DOMContentLoaded', () => {
    nameList();
    content();
});

document.addEventListener('click', async (el) => {
    const box = el.target.closest('.box.act_pending');
    if (!box) return;

    const userId = box.dataset.userId;
    const id = box.dataset.id;

    const res = await fetch('/admin/chartList/approved/', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            "X-CSRF-TOKEN": token
        },
        body: JSON.stringify({
            user_id: userId,
            id: id
        })
    });

    const data = await res.json();
    alert(data.message);

    location.reload();
});