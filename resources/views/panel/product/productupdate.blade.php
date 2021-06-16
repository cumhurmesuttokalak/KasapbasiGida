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
    <form action="{{route('productupdated',$products->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="categoryid">Category İd</label> <br>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $products->category_id) selected @endif>{{$category->title}}</option>
            @endforeach
        </select><br>
        <label for="title">Title</label> <br>
        <input type="text" name="title" id="title" value="{{$products->title}}"><br>
        <label for="title">Price</label> <br>
        <input type="text" name="price" id="price" value="{{$products->price}}"><br>
        <label for="content">Features</label> <br>
        <textarea id="summernote"  name="features">{{$products->content}}</textarea>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script><br>
        <button type="submit" value="Gonder" style="border:3px #ff003b">Gönder</button>
        <br>

    </form>


@endsection
