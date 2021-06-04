<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Waifu;
use Illuminate\Http\Request;

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
            'waifus' => Waifu::with('reviews')->orderBy('name', 'asc')->cursorPaginate(10)
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
        $data = [
            'waifu' => $waifu,
            'reviews' => Review::with('user')->where('waifu_id', $waifu->id)->orderBy('id', 'desc')->cursorPaginate(5),
            'reviews_count' => Review::where('waifu_id', $waifu->id)->get()->count()
        ];

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
}
