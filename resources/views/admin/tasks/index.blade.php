@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Задания</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список</h3>
                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('tasks.create') }}" type="submit" class="btn btn-primary mb-3">Добавить
                        задание</a>
                    @if (count($tasks))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Наименование</th>
                                    <th>Прогресс</th>
                                    <th style="width: 40px">Label</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-default"
                                                    href="{{ route('tasks.show', [$task->id]) }}">
                                                    {{ $task->title }}</a>
                                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">

                                                    <a class="dropdown-item"
                                                        href="{{ route('consumers.export', ['task' => $task->id, 'title' => $task->title]) }}"><i
                                                            class="fas fa-file-export"></i> Экспортировать</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('tasks.edit', ['task' => $task->id]) }}"><i
                                                            class="fas fa-edit"></i> Редактировать</a>

                                                    <div class="dropdown-divider"></div>
                                                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit" class=""
                                                            onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash"></i> Удалить
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Заданий пока нет...</p>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
