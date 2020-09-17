@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
    <div class="blog-post">
        <h2 class="blog-post-title">
          {{$task->title}}
          <a style="font-size:14px" href="/tasks/{{$task->id}}/edit">Редактировать</a>
        </h2>
        <p class="blog-post-meta">{{$task->created_at->toFormattedDateString()}}</p>
        <p>
            {{$task->body}}
        </p>
    </div><!-- /.blog-post -->


    <nav class="blog-pagination">
      <a class="btn btn-outline-primary" href="/tasks">Назад</a>
    </nav>

  </div><!-- /.blog-main -->    
@endsection