<!DOCTYPE html>
<html lang="Ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="admin_top">
        <a href={{ "/admin/working" }}>
            <div class="admin_link_button">
                <p>出勤一覧ページ</p>
            </div>
        </a>
        <a href={{ "/admin/salary_total" }}>
            <div class="admin_link_button_2">
                <p>支出一覧ページ</p>
            </div>
        </a>
    </div>
</body>

</html>