@props(['project'])
<div class="projectbar">
    <p class="project_name">{{ $project->projects_name }}</p>
    <div class="projectbar_right">
        <div class="user_button">
            <a href="">ユーザー招待</a>
        </div>
        <div class="dot"></div>
        <div class="search_icon">
            <img src={{ asset('img/search.png') }}>
        </div>
    </div>
</div>
