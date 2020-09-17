@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">
        Админ-панель
    </h3>

    <div class="blog-post">
        <ul>
            <li>
                <a class="p-2 text-muted" href="/admin/feedbacks">Список обращений</a>    
            </li>
        </ul>
        
    </div><!-- /.blog-post -->
  </div><!-- /.blog-main -->    
@endsection
