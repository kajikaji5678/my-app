<?php 

namespace App\Enums;


//* 5/25/? Enumは使えるか実験段階ではあるがなれるといい
//* 後々テーブルに変更する可能性もある
//* その時はとりあえずTaskBoardControllerを見てくれ
enum TaskStatus: string {
    case Pending = '未対応';
    case Doing = '処理中';
    case Done = '処理済み';
    case Complete = '完了';

    public function color(): string {
        return match($this) {
            self::Pending => 'gray',
            self::Doing => 'blue',
            self::Done => 'green',
            self::Complete => 'purple',
        };
    }
}