@extends('panel.layouts.master')
@section('title')
    <?php $content="Gonderi Ekle"?>
    {{$content}}
@endsection
@section('js')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <h1>Urun Ekle</h1> <br>
        <form action="{{route('olustur')}}" method="post">
            @csrf
            <label for="categoryid">Category İd</label> <br>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->title}}
                    </option>
                @endforeach
            </select><br>
            <label for="title">Title</label> <br>
            <input type="string" id="title" name="title"> <br>
            <label for="price">Price</label> <br>
            <input type="number" id="price" name="price"> <br>
            <label for="futures">Futures</label> <br>
            <textarea id="summernote" name="product"></textarea>
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote();
                });
            </script><br>


            <button type="submit" value="Gonder" class="btn btn-primary" style="border:3px #ff003b">Gönder</button>
            <br>
        </form>
    </div>

@endsection
