@props(['users']);
<div class="modal_content_bottom_5" id="modal_content_bottom_5">
    <form action="{{ route('assign.step3') }}" method="POST">
        @csrf
        <p class="modal_type">対象者選択</p>
        <select name="user_ids[]" class="modal_form" multiple>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">送信</button>
    </form>
</div>
