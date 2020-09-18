@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">
      Редактирование задачи "{{ $task->title }}"
    </h3>

    @include('layout.errors')

    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="title">Название</label>
          <input type="text" name="title" class="form-control" id="title" value="{{old('title', $task->title)}}">
        </div>
        <div class="form-group">
          <label for="body">Описание задачи</label>
          <textarea name="body" class="form-control" cols="20" rows="8">{{old('body', $task->body)}}</textarea>
        </div>

        <div class="form-group">
          <label for="body">Теги</label>
          <input 
            type="text"
            name="tags" class="form-control" 
            cols="20" rows="8"
            value="{{ old('tags', $task->tags->pluck('name')->implode(',')) }}"
          >
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    
    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
  </div><!-- /.blog-main -->    

@endsection