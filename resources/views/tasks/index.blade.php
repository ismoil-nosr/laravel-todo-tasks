@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">
      Список задач
    </h3>
    
    @foreach ($tasks as $task)
        <div class="blog-post">
            <h2 class="blog-post-title">
              <a href="/tasks/{{$task->id}}">{{$task->title}}</a>
            </h2>
            <p class="blog-post-meta">{{$task->created_at->toFormattedDateString()}}</p>

            @include('tasks.tags', ['tags' => $task->tags])

            <p>
                {{$task->body}}
            </p>
        </div><!-- /.blog-post --> 
    @endforeach

    {{ $tasks->links() }}
    
  </div><!-- /.blog-main -->    
@endsection
