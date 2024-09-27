@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show an Image Attachment') }}</div>

                <div class="card-body">



                    <div class="mb-3">
                        <label for="inputtitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="inputname" name="title" value="{{$music->title}}" readonly>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputartist" class="form-label">Artist</label>
                        <input type="text" class="form-control" id="inputartist" name="artist" value="{{$music->artist}}" readonly>
                        @error('artist')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputgenre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="inputgenre" name="genre" value="{{$music->genre->name}}" readonly>
                        @error('genre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputrelease_date" class="form-label">Release Date</label>
                        <input type="date" class="form-control" id="inputrelease_date" name="release_date" value="{{$music->release_date}}" readonly>
                        @error('release_date')
                        <br><small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputimage" class="form-label">Image</label><br>
                        <img src="{{ asset('storage/image/'.$music->image) }}"style="height: 100px; width: 150px;">
                        <input type="text" class="form-control" id="inputsummary" name="image" value="{{$music->image}}" readonly>
                        @error('summary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <a href="{{route('home')}}" class="btn btn-secondary">{{__('Back')}}</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
