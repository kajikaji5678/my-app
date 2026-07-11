<div id="modal" class="hidden fixed inset-0 justify-center items-center z-10
bg-gray-600 opacity-50">
    <div class="w-4/5 h-4/5 bg-white z-20 rounded-2xl overflow-hidden relative">
        <div class="absolute top-0 right-6 w-12 h-12 cursor-pointer">
            <div class="absolute top-1/2 w-8 h-1 bg-white transform rotate-45"></div>
            <div class="absolute top-1/2 w-8 h-1 bg-white transform -rotate-45"></div>
        </div>
        <div class="w-full h-12 bg-green-400 py-2 px-6 flex items-center">
            <p class="font-semibold">タスク作成</p>
        </div>
        <div id="react-root"></div>
    </div>
</div>

{{--
* idは要素1つを特定するためのもの
* classは見た目や共通スタイルを当てはめるもの
* フォーム送信ならselectにnameメゾットが必要
* name = キー value = 値
--}}
