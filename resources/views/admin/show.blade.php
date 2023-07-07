@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>
        </tbody>
    </table>
    <a type="button" class="btn btn-primary" href="{{route('admin.user')}}">돌아가기</a>
    <a type="button" class="btn btn-primary" href="{{route('admin.edit', $user->id)}}">수정</a>
@endsection


