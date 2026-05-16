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
// dataの長さは人数分
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

window.addEventListener('DOMContentLoaded', () => {
    nameList();
    content();
});
