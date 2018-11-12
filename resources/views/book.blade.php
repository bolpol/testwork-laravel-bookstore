@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="container">
                                @foreach ($books as $book)
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>Author:</strong> {{ $book->author }} <br />
                                            <strong>Title:</strong> {{ $book->title }} <br />
                                            <strong>Pages:</strong> {{ $book->pages }} <br />
                                        </li>

                                        <img src="/public/book/cover/{{ $book->id }}" style="max-width: 100px;" />

                                        <p class="list-group-item">{{ substr($book->describe, 0, 50) . " ... " }}</p>
                                    </ul>
                                @endforeach
                                    <p>{{ $books->links() }}</p>
                            </div>
                    @else
                        Only for authorised users
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
