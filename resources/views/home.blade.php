@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Music Dashboard') }}</div>

                <div class="card-body">
                    <div class="col-md-10">
                        <div class="form-group">
                            <form method="get" action="{{ route('home') }}"> <!-- Make sure the form submits to the home route -->
                                <div class="input-group">
                                    <input class="form-control" name="search" placeholder="Search..." value="{{ old('search', $search) }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <a href="{{ route('music.create') }}" class="btn btn-success">Add New Music Infos</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add new Genre..
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adding New Genre</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action = "{{ route('genre.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="genreName">Genre Name</label>
                                        <input type="text" class="form-control" id="genreName" name="name" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Genre</button>
                                </form>

                            </div>
                        </div>
                        </div>
                    </div>


                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Artist</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Release Date</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($musics as $music)
                            <tr>
                                <th scope="row">{{ $music->id }}</th>
                                <td>{{$music->title}}</td>
                                <td>{{$music->artist}}</td>
                                <td>{{$music->genre->name}}</td>
                                <td>{{$music->release_date}}</td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#musicModal-{{ $music->id }}">
                                        {{ $music->image }}
                                    </a>
                                </td>
                                <td>
                                    <!-- These space is for edit, delete, and show buttons -->
                                    <a href="{{ route('music.edit', $music) }}" class="btn btn-info">Edit</a>
                                    <form action="{{ route('music.destroy', $music->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('music.show', $music) }}" class="btn btn-secondary">Show</a>
                                </td>
                            </tr>

                            <!-- Modal for each image -->
                            <div class="modal fade" id="musicModal-{{ $music->id }}" tabindex="-1" aria-labelledby="musicModalLabel-{{ $music->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="musicModalLabel-{{ $music->id }}">Song Title : {{ $music->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('storage/image/'.$music->image) }}" alt="{{ $music->title }}" class="img-fluid">
                                            <p>Artist : {{ $music->artist }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                        <!-- These space is for pagination -->
                        {{ $musics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
