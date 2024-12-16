<?php

namespace App\Http\Controllers;

use App\Mail\MovieDetailsMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class MovieController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $query = $request->query('query');

        if (!$query) {
            return response()->json(['error' => 'Query parameter is required'], 400);
        }

        $apiKey = env('OMDB_API_KEY');
        $url = "http://www.omdbapi.com/?s={$query}&apikey={$apiKey}";

        $response = Http::get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch data from OMDb'], 500);
        }

        $data = $response->json();

        if (isset($data['Error'])) {
            return response()->json(['error' => $data['Error']], 404);
        }

        return response()->json($data['Search']);
    }

    public function show($id)
    {
        $apiKey = env('OMDB_API_KEY');
        $url = "http://www.omdbapi.com/?i={$id}&apikey={$apiKey}";

        $response = Http::get($url);

        if ($response->failed()) {
            abort(404, 'Movie not found');
        }

        $movie = $response->json();

        if (isset($movie['Error'])) {
            abort(404, $movie['Error']);
        }

        return view('show', compact('movie'));
    }

    public function sendEmail(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $apiKey = env('OMDB_API_KEY');
        $url = "http://www.omdbapi.com/?i={$id}&apikey={$apiKey}";

        $response = Http::get($url);

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Failed to fetch movie details']);
        }

        $movie = $response->json();

        if (isset($movie['Error'])) {
            return back()->withErrors(['error' => $movie['Error']]);
        }

        Mail::to($request->email)->send(new MovieDetailsMail($movie));

        return back()->with('success', 'Email sent successfully!');
    }
}
