@extends('panel.layouts.master')
@section('js')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
@section('content')
    <h1>Kategori Güncelle</h1> <br>
    <form action="{{route('categoryupdated',$categories->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="title">Title</label> <br>
        <input type="text" name="title" id="title" value="{{$categories->title}}"><br>
        <button type="submit" value="Gonder" style="border:3px #ff003b">Gönder</button>
        <br>

    </form>


@endsection
