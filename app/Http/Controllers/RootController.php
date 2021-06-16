<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Waifu;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

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

    public function topCouple()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://anitrendz.net/charts/couple-ship/');
        $seasonName = $crawler->filter('.at-cth-top-season')->first()->text();
        $dateVote = $crawler->filter('.at-cth-b-date')->first()->text();
        $couples = collect();
        foreach ($crawler->filter('.at-main-chart-entries .at-mcc-entry') as $data) {
            $data = new Crawler($data);
            $rank = $data->filter('.at-mcc-e-rank .main-rank')->first()->text();
            $coupleName = $data->filter('.at-mcc-e-details .entry-title')->first()->text();
            $origin = $data->filter('.at-mcc-e-details .entry-detail')->first()->text();
            $thumbnails = collect();
            foreach ($data->filter('.at-mcc-e-details .at-mcc-e-thumbnail img') as $thumb) {
                $thumb = new Crawler($thumb);
                $thumbnails->push($thumb->attr('src'));
            }
            $couple = [
                'rank' => $rank,
                'couple_name' => $coupleName,
                'origin' => $origin,
                'thumbnails' => $thumbnails
            ];
            $couples->push((object)$couple);
        }

        $data = [
            'season' => $seasonName,
            'date' => $dateVote,
            'couples' => $couples,
        ];

        return view('root.top-couple', $data);
    }
}
