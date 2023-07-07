@extends('layouts.app')

@section('content')
    @if(!empty($errors))
        @if($errors->any())
            <ul class="alert alert-danger" style="list-style-type: none">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    @endif
    <form action="{{route('admin.update', ['id'=>$user->id])}}" method="post">
        @csrf
        <label>
            <input type="text" value="{{$user->name}}" name="name" placeholder="name">
        </label>
        <label>
            <input type="text" value="{{$user->email}}" name="email" placeholder="email">
        </label>
        <input type="submit" class="btn btn-primary">
    </form>
    <a type="button" class="btn btn-primary" href="{{route('admin.user')}}">돌아가기</a>
@endsection
