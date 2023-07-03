<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>laravel example</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
    <form action="{{route('store', ['id'=>$user->id])}}" method="post">
        @csrf
        <input type="text" value="{{$user->name}}" name="name" placeholder="name">
        <input type="text" value="{{$user->email}}" name="email" placeholder="email">
        <input type="submit" class="btn btn-primary">
        @if($error->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <div>

    </div>
    <a type="button" class="btn btn-primary" href="{{route('home')}}">돌아가기</a>
    </body>
</html>
