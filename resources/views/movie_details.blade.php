<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>
</head>
<body>
<h1>{{ $movie['Title'] }}</h1>
<img src="{{ $movie['Poster'] }}" alt="Movie Poster" style="max-width: 300px; margin-bottom: 20px;">
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
<p>Thank you for your interest in this movie!</p>
</body>
</html>
