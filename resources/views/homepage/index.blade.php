<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>laravel example</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a type="button" class="btn btn-primary" href="{{route('show', $user->id)}}">상세</a>
                    <a type="button" class="btn btn-primary" href="{{route('edit', $user->id)}}">수정</a>
                    @if($user->trashed())
                        <a type="button" class="btn btn-primary" href="{{route('restore', $user->id)}}">복원</a>
                    @else
                        <a type="button" class="btn btn-primary" href="{{route('delete', $user->id)}}">삭제</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a type="button" class="btn btn-primary" href="{{route('create')}}">신규추가</a>
    </body>
</html>
