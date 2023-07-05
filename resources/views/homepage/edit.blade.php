<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>laravel example</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
    @if(!empty($errors))
        @if($errors->any())
            <ul class="alert alert-danger" style="list-style-type: none">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    @endif
    <form action="{{route('update', ['id'=>$user->id])}}" method="post">
        @csrf
        <label>
            <input type="text" value="{{$user->name}}" name="name" placeholder="name">
        </label>
        <label>
            <input type="text" value="{{$user->email}}" name="email" placeholder="email">
        </label>
        <input type="submit" class="btn btn-primary">
    </form>
    <a type="button" class="btn btn-primary" href="{{route('home')}}">돌아가기</a>
    </body>
</html>
