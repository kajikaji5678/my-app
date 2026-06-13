<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleLevel;
use App\Models\RoleUser;
use App\Models\Task;
use App\Models\TaskAssign;
use App\Models\User;
use App\Notifications\AssignNews;
use App\Services\BoardService;
use Illuminate\Http\Request;

class AsssignController extends Controller
{
    private BoardService $boardService;

    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;
    }

    public function index()
    {

        $projectId = 1;
        $tasks = Task::where('project_id', $projectId)->get();
        $data = $this->boardService->getBoardData($projectId, $tasks);

        $assigns = TaskAssign::with('user')->get()->groupBy('assign_name');
        // * 6/8 リレーション取得はwithで行う
        // * 同日 本来はテーブル設計を見直すべきだが応急処置でメゾット使用
        return view('toDo.assign', $data, compact('assigns'));
    }

    public function step1(Request $request)
    {
        $validated = $request->validate([
            'assign_name' => ['required'],
            'assign_content' => ['required'],
            'type_id' => ['required'],
            'category_id' => ['required'],
            'milestone_id' => ['required'],
        ], [
            'assign_name.required' => 'アサイン名が入力されていません。',
            'assign_content.required' => '内容が入力されていません。',
        ]);

        session([
            'assign_data_1' => $validated,
        ]);

        $mode = 4;
        $roles = Role::all();
        $rolelevels = RoleLevel::where('project_id', 1)->get();

        return view('toDo.assign', compact('roles', 'rolelevels', 'mode'));
    }

    public function step2(Request $request)
    {
        $validated = $request->validate([
            'start_time' => ['required'],
            'end_time' => ['required'],
            'role_id' => ['required'],
            'role_level_id' => ['required'],
        ], [
            'start_time.required' => '開始時刻が設定されていません。',
            'end_time.required' => '終了時刻が設定されていません。',
        ]);

        session([
            'assign_data_2' => $validated,
        ]);

        $test = session()->get('assign_data_2');
        $role_id = $test['role_id'];
        $role_level_id = $test['role_level_id'];

        $ApplicableMembers =
        RoleUser::where('role_id', $role_id)
            ->where('role_level_id', '>=', $role_level_id)
            //! 明らかなバグの根ではあるが一旦数値4->12に変更
            ->where('role_level_id', '<=', 12)
            ->pluck('user_id');

        $users = [];
        $mode = 5;

        foreach ($ApplicableMembers as $ApplicableMember) {
            array_push($users, User::where('id', $ApplicableMember)->first());
        }

        return view('toDo.assign', compact('users', 'mode'));
    }

    public function step3(Request $request)
    {
        $session1 = session()->get('assign_data_1');
        $session2 = session()->get('assign_data_2');
        $task = Task::create([
            'category_id' => $session1['category_id'],
            'milestone_id' => $session1['milestone_id'],
            'type_id' => $session1['type_id'],
            'project_id' => 1,
            // * 6/5 一部マジックナンバーあり
            'status_color' => 'red',
            'status' => 'null',
            'status_id' => 1,
            'task_name' => 'テスト',
        ]);

        foreach ($request->user_ids as $id) {
            TaskAssign::create([
                'user_id' => $id,
                'assign_name' => $session1['assign_name'],
                'assign_content' => $session1['assign_content'],
                'start_time' => $session2['start_time'],
                'end_time' => $session2['end_time'],
                'task_id' => $task->id,
            ]);
            $user = User::find($id);
            $user->notify(new AssignNews($task));
        }

        return view('toDo.assign');
    }
}

// * メモ
// コンストラクタは誕生直後に実行される処理

// * メモ
// / session() が返すのは Store オブジェクトなので、
// / data というプロパティを直接参照している扱いになる。
// / 連想配列

//
