@extends('layout.master')

@section('content')
  <div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">
      Контакты
    </h3>

    <ul>
        <li>info@email.com</li>
        <li>+123456789</li>
    </ul>
    <hr>

    <h3>Отправьте нам сообщение</h3>

    @include('layout.errors')
    @include('layout.success')
    
    <form method="POST" action="/contacts">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email-адрес</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Сообщение</label>
          <textarea name="message" class="form-control" cols="20" rows="8">{{old('message')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
  </div><!-- /.blog-main -->    

@endsection
