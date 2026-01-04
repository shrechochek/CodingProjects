@extends('layouts.left-menu')
@section('title')
    Модерация тем
@endsection
@section('content')
    <div class="container">
        <h2>Модерация тем</h2>

        <div class="row">
            <div class="col-md-4">
                <h3>Ожидают проверки</h3>
                @foreach($pendingThemes as $theme)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $theme->name }}</h5>
                            <p class="card-text">Автор: {{ $theme->user->name }}</p>
                            <p class="card-text">Создана: {{ $theme->created_at ? $theme->created_at->format('d.m.Y H:i') : 'Неизвестно' }}</p>
                            <a href="/insider/themes/{{ $theme->id }}/moderate" class="btn btn-primary">Проверить</a>
                            <a href="/insider/themes/{{ $theme->id }}/edit" class="btn btn-warning btn-sm ml-2">Редактировать</a>
                            <a href="/insider/themes/{{ $theme->id }}/delete" class="btn btn-danger btn-sm ml-2"
                               onclick="return confirm('Удалить тему «{{ $theme->name }}» навсегда?')">Удалить</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <h3>Одобренные темы</h3>
                @foreach($approvedThemes ?? [] as $theme)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $theme->name }}</h5>
                            <p class="card-text">Автор: {{ $theme->user->name }}</p>
                            <p class="card-text">Одобрена: {{ $theme->moderated_at ? $theme->moderated_at->format('d.m.Y H:i') : 'Неизвестно' }}</p>
                            <p class="card-text">Модератор: {{ $theme->moderator ? $theme->moderator->name : 'Неизвестен' }}</p>
                            <a href="/insider/themes/{{ $theme->id }}/edit" class="btn btn-warning btn-sm">Редактировать</a>
                            <a href="/insider/themes/{{ $theme->id }}/delete" class="btn btn-danger btn-sm ml-2"
                               onclick="return confirm('Удалить тему «{{ $theme->name }}» навсегда?')">Удалить</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <h3>Забаненные темы</h3>
                @foreach($bannedThemes as $theme)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $theme->name }}</h5>
                            <p class="card-text">Автор: {{ $theme->user->name }}</p>
                            <p class="card-text">Забанена: {{ $theme->moderated_at ? $theme->moderated_at->format('d.m.Y H:i') : 'Неизвестно' }}</p>
                            <p class="card-text">Модератор: {{ $theme->moderator ? $theme->moderator->name : 'Неизвестен' }}</p>
                            <a href="/insider/themes/{{ $theme->id }}/unban" class="btn btn-success btn-sm"
                               onclick="return confirm('Разбанить тему «{{ $theme->name }}»?')">Разбанить</a>
                            <a href="/insider/themes/{{ $theme->id }}/edit" class="btn btn-warning btn-sm ml-2">Редактировать</a>
                            <a href="/insider/themes/{{ $theme->id }}/delete" class="btn btn-danger btn-sm ml-2"
                               onclick="return confirm('Удалить тему «{{ $theme->name }}» навсегда?')">Удалить</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h3>Забаненные пользователи</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bannedUsers as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="/insider/users/{{ $user->id }}/unban-themes" class="btn btn-success btn-sm">Разбанить</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
