@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($errors->all() as $message)
                    {{$message}}
                @endforeach
                <form action="{{route('admin.pages.store')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="summary">Sommario</label>
                        <input type="text" name="summary" class="form-control" id="summary">
                    </div>
                    <div class="form-group">
                        <label for="body">Testo</label>
                        <textarea name="body" rows="8" cols="80" id="body" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <h3>Tags</h3>
                            @foreach ($tags as $tag)
                                <label for="tags-{{$tag->id}}">{{$tag->name}}</label>
                                <input type="checkbox" name="tags[]" id="tags-{{$tag->id}}" value="{{$tag->id}}">
                            @endforeach
                    </div>
                    <div class="form-group">
                        <h3>Photos</h3>
                            @foreach ($photos as $photo)
                                <label for="photos-{{$photo->id}}">{{$photo->name}}</label>
                                <input type="checkbox" name="photos[]" value="{{$photo->id}}" id="photos-{{$photo->id}}">
                            @endforeach
                    </div>
                    <input type="submit" class="btn-primary" value="Salva">
                </form>
            </div>
        </div>
    </div>
@endsection
