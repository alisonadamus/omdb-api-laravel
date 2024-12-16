<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie['Title'] }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex justify-content-start mb-4">
        <a href="{{ url('/') }}" class="btn btn-secondary">Back to Search</a>
    </div>

    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $movie['Poster'] }}" class="img-fluid rounded-start" alt="{{ $movie['Title'] }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{ $movie['Title'] }}</h3>
                    <p><strong>Year:</strong> {{ $movie['Year'] }}</p>
                    <p><strong>Rated:</strong> {{ $movie['Rated'] }}</p>
                    <p><strong>Released:</strong> {{ $movie['Released'] }}</p>
                    <p><strong>Genre:</strong> {{ $movie['Genre'] }}</p>
                    <p><strong>Director:</strong> {{ $movie['Director'] }}</p>
                    <p><strong>Actors:</strong> {{ $movie['Actors'] }}</p>
                    <p><strong>Plot:</strong> {{ $movie['Plot'] }}</p>
                    <p><strong>Language:</strong> {{ $movie['Language'] }}</p>
                    <p><strong>Country:</strong> {{ $movie['Country'] }}</p>
                    <p><strong>Awards:</strong> {{ $movie['Awards'] }}</p>
                    <p><strong>IMDB Rating:</strong> {{ $movie['imdbRating'] }}</p>
                    <p><strong>IMDB Votes:</strong> {{ $movie['imdbVotes'] }}</p>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <form action="{{ route('movies.sendEmail', $movie['imdbID']) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Enter Email Address:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Send Email</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
