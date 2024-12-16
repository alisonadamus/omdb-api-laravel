<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="text-center mb-4">Movie Search</h1>

    <div class="mb-4">
        <input type="text" id="movie-query" class="form-control" placeholder="Enter movie name">
        <button id="search-btn" class="btn btn-primary mt-3 w-100">Search Movies</button>
    </div>

    <div id="movie-results" class="row g-3"></div>

    <div id="error-message" class="alert alert-danger mt-3" style="display: none;"></div>
</div>

<script>
    $(document).ready(function () {
        $('#search-btn').click(function () {
            const query = $('#movie-query').val();

            if (!query) {
                $('#error-message').text('Please enter a movie name').show();
                $('#movie-results').empty();
                return;
            }

            $('#error-message').hide();
            $('#movie-results').empty();

            // AJAX-запит до сервера Laravel
            $.ajax({
                url: "{{ route('movies.search') }}",
                method: "GET",
                data: {query: query},
                success: function (movies) {
                    if (!movies.length) {
                        $('#error-message').text('No movies found').show();
                        return;
                    }

                    $('#error-message').hide();

                    movies.forEach(function (movie) {
                        $('#movie-results').append(`
        <div class="col-md-3">
            <a href="/movie/${movie.imdbID}" class="text-decoration-none text-dark">
                <div class="card">
                    <img src="${movie.Poster}" class="card-img-top" alt="${movie.Title}">
                    <div class="card-body">
                        <h5 class="card-title">${movie.Title}</h5>
                        <p class="card-text">${movie.Year}</p>
                    </div>
                </div>
            </a>
        </div>
    `);
                    });

                },
                error: function (xhr) {
                    const error = xhr.responseJSON.error || 'An error occurred';
                    $('#error-message').text(error).show();
                }
            });
        });
    });
</script>
</body>
</html>
