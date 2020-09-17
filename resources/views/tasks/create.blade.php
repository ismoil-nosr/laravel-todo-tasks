@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">
      Новая задача
    </h3>

    @include('layout.errors')

    <form method="POST" action="/tasks">
        @csrf

        <div class="form-group">
          <label for="title">Название</label>
          <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
          <label for="body">Описание задачи</label>
          <textarea name="body" class="form-control" cols="20" rows="8">{{old('body')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
  </div><!-- /.blog-main -->    

@endsection
