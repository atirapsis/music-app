@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Music Infos') }}</div>

                <div class="card-body">

                <form action = "{{ route('music.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="inputtitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="inputtitle" name="title">
                        @error('title')
                        <br><small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputartist" class="form-label">Artist</label>
                        <input type="text" class="form-control" id="inputartist" name="artist">
                        @error('artist')
                        <br><small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputgenre" class="form-label">Genre</label>
                        <select name="genre_id" class="form-control" required>
                            <option value="">Select a genre</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                        @error('genre')
                        <br><small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputrelease_date" class="form-label">Release Date</label>
                        <input type="date" class="form-control" id="inputrelease_date" name="release_date">
                        @error('release_date')
                        <br><small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Image</label>
                        <input class="form-control" type="file" name="image">
                        @error('image')
                        <br><small style="color:red">{{$message}}</small>
                        @enderror
                      </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
