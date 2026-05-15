<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ガントチャートテスト</title>
    <link rel="stylesheet" href="{{ asset('css/chartList.css') }}">
</head>

<body>

    <div class="main">
        <div class="row_height">
        </div>
        <div class="row_width">
            <div class="row_width_content">9:00</div>
            <div class="row_width_content">11:00</div>
            <div class="row_width_content">13:00</div>
            <div class="row_width_content">17:00</div>
            <div class="row_width_content">19:00</div>
            <div class="row_width_content">21:00</div>
            <div class="row_width_content">23:00</div>
        </div>
        <div class="content">
        </div>
    </div>

    <script src="{{ asset('js/chartList.js') }}"></script>
</body>

</html>
