@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/service" method="post">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" autocomplete="off">
        @error('title')
    <p style="color: red">{{ $message }}</p>

        @enderror
        <button>add service</button>
    </form>
    @forelse ($services as $item)
    <li>{{$item->title}}</li>

    @empty

    @endforelse
</body>
</html>

@endsection
