@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
    <div class="blog-post">
        <h2 class="blog-post-title">
          {{$task->title}}
          <a style="font-size:14px" href="/tasks/{{$task->id}}/edit">Редактировать</a>
        </h2>
        <p class="blog-post-meta">{{$task->created_at->toFormattedDateString()}}</p>

        @include('tasks.tags', ['tags' => $task->tags])

        <p>
            {{$task->body}}
        </p>

        @if ($task->steps->isNotEmpty())
          <ul class="list-group">
            @foreach ($task->steps as $step)
              <li class="list-group-item">
                <form action="/completed-steps/{{ $step->id }}" method="post">
                  @if ($step->completed)
                    @method('DELETE')
                  @endif
                  @csrf
                  <div class="form-check">
                    <label class="form-check-label {{ $step->completed ? 'completed' : '' }}">
                      <input 
                      type="checkbox" 
                      class="form-check-input"
                      name="completed"
                      onclick="this.form.submit()"
                      {{ $step->completed ? 'checked' : '' }}
                      >
                      {{ $step->description }}
                    </label>
                  </div>          
                </form>
              </li>              
            @endforeach
          </ul>
        @endif
        
        <form class="card card-body mb-4" action="/tasks/{{ $task->id }}/steps" method="POST" >
          @csrf

          <div class="form-group">
            <input 
              type="text" class="form-control"
              placeholder="Шаг"
              value="{{ old('description') }}"
              name="description"
            >
          </div>
          <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
        
        @include('layout.errors')

        @forelse ($task->history as $item)
            <p>
              Пользователь {{ $item->email }} обновил задачу {{ $item->pivot->created_at->diffForHumans() }} назад:<br>
              До: {{ $item->pivot->before }}
              После: {{ $item->pivot->after }}
            </p>
        @empty
            <p>Нет истории</p>
        @endforelse


    </div><!-- /.blog-post -->

    <nav class="blog-pagination">
      <a class="btn btn-outline-primary" href="/tasks">Назад</a>
    </nav>

  </div><!-- /.blog-main -->    
@endsection