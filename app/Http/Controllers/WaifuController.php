<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Review;
use App\Models\Waifu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WaifuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'waifus' => Waifu::with('reviews', 'rates')->orderBy('name', 'asc')->simplePaginate(10)
        ];

        return view('waifu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waifu  $waifu
     * @return \Illuminate\Http\Response
     */
    public function show(Waifu $waifu)
    {
        //
        if (Auth::check())
            $data = [
                'waifu' => $waifu,
                'reviews' => Review::with('user')->where('waifu_id', $waifu->id)->orderBy('id', 'desc')->simplePaginate(5),
                'reviews_count' => Review::where('waifu_id', $waifu->id)->get()->count(),
                'love_count' => Rate::where('waifu_id', $waifu->id)->where('type', 'love')->get()->count(),
                'meh_count' => Rate::where('waifu_id', $waifu->id)->where('type', 'meh')->get()->count(),
                'user_rate' => Rate::where('waifu_id', $waifu->id)->where('user_id', Auth::user()->id)->first()
            ];
        else {
            $data = [
                'waifu' => $waifu,
                'reviews' => Review::with('user')->where('waifu_id', $waifu->id)->orderBy('id', 'desc')->simplePaginate(5),
                'reviews_count' => Review::where('waifu_id', $waifu->id)->get()->count(),
                'love_count' => Rate::where('waifu_id', $waifu->id)->where('type', 'love')->get()->count(),
                'meh_count' => Rate::where('waifu_id', $waifu->id)->where('type', 'meh')->get()->count(),
                'user_rate' => null
            ];
        }

        return view('waifu.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waifu  $waifu
     * @return \Illuminate\Http\Response
     */
    public function edit(Waifu $waifu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Waifu  $waifu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waifu $waifu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waifu  $waifu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waifu $waifu)
    {
        //
    }

    public function random()
    {
        $waifu = Waifu::get()->random(1);

        return redirect()->route('waifu.show', [$waifu[0]->slug]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => ['required']
        ]);

        return redirect()->route('waifu.result', [$request->keyword]);
    }

    public function result($keyword)
    {
        $data = [
            'waifus' => Waifu::with('reviews', 'rates')->where('name', 'like', '%' . $keyword . '%')->orderBy('name', 'asc')->simplePaginate(1),
            'keyword' => $keyword
        ];

        return view('waifu.search', $data);
    }

    public function topLove()
    {
        $waifus = Waifu::withCount(['rates as love_count' => function($query){
            $query->where('type', 'love');
        }])->orderBy('love_count', 'desc')->simplePaginate(10);

        $data = [
            'waifus' => $waifus
        ];
        
        return view('waifu.top-love', $data);
    }

    public function topMeh()
    {
        $waifus = Waifu::withCount(['rates as meh_count' => function($query){
            $query->where('type', 'meh');
        }])->orderBy('meh_count', 'desc')->simplePaginate(10);

        $data = [
            'waifus' => $waifus
        ];
        
        return view('waifu.top-meh', $data);
    }
}
