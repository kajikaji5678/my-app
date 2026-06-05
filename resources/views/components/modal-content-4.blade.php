@props(['roles', 'rolelevels'])
<div class="modal_content_bottom_4" id="modal_content_bottom_4">
    <form action="{{ route('assign.step2') }}" method="POST">
        @csrf
        <p class="modal_type">開始時刻</p>
        <input type="date" name="start_time">
        <p class="modal_type">終了時刻</p>
        <input type="date" name="end_time">
        <p class="modal_type">役職選択</p>
        <select name="role_id" class="modal_form">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">
                    {{ $role->role_name }}
                </option>
            @endforeach
        </select>
        <p class="modal_type">役職レベル選択</p>
        <select name="role_level_id" class="modal_form">
            @foreach ($rolelevels as $role_level)
                <option value="{{ $role_level->id }}">
                    {{ $role_level->role_level }}
                </option>
            @endforeach
        </select>
        <button type="submit">送信</button>
    </form>
</div>
