@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Админ-панель
        </h3>

        <h2>Список обращений</h2>

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Дата</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $f)
                    <tr>
                        <th scope="row">{{$f->id}}</th>
                        <td>{{$f->email}}</td>
                        <td>{{$f->message}}</td>
                        <td>{{$f->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- /.blog-main -->    
@endsection