<?php 

namespace App\Enums;

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