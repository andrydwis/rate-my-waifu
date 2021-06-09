<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Waifu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RootController extends Controller
{
    //
    public function index()
    {
        $data = [
            'user_count' => User::get()->count(),
            'waifu_count' => Waifu::get()->count()
        ];

        return view('root.index', $data);
    }

    public function anime()
    {
        $request = Http::get('https://api.jikan.moe/v3/season');
        $seasonName = $request->json(['season_name']);
        $seasonYear = $request->json(['season_year']);
        $animes = $request->json(['anime']);

        $data = [
            'season_name' => $seasonName,
            'season_year' => $seasonYear,
            'animes' => $animes
        ];

        return view('root.anime',  $data);
    }

    public function news(Request $request)
    {
        $page = $request->page ?? 1;
        $request = Http::get('https://newsapi.org/v2/everything?q=anime&language=en&sortBy=publishedAt&apiKey=b494b191e81948608918bdd451b32c2a&pageSize=9&page=' . $page);
        $respond = $request->json(['articles']);

        $data = [
            'newss' => $respond,
            'page' => $page
        ];

        return view('root.news', $data);
    }


    public function about()
    {
        return view('root.about');
    }

    public function statistics(Request $request)
    {
        $ip = $request->getClientIp();
        $request = Http::get('http://ip-api.com/json/' . $ip);
        $respond = $request->json();
        return $respond;
    }
}
