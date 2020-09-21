<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="/tasks">Главная</a>
        @auth
            <a class="p-2 text-muted" href="/tasks/create">Новая задача</a>
            @if (auth()->id() == 2)
                <a class="p-2 text-muted" href="/admin">Админ-панель</a>
            @endif
        @endauth
    </nav>
</div>