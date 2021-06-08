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
        $request = Http::get('https://newsapi.org/v2/everything?q=anime&language=en&sortBy=publishedAt&apiKey=b494b191e81948608918bdd451b32c2a&pageSize=10&page=1');
        $respond = $request->json(['articles']);

        $data = [
            'user_count' => User::get()->count(),
            'waifu_count' => Waifu::get()->count(),
            'newss' => $respond
        ];

        return view('root.index', $data);
    }

    public function about()
    {
        return view('root.about');
    }
}
