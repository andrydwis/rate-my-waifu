<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Review;
use App\Models\Waifu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MyWaifuController extends Controller
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
            'waifus' => Waifu::with('reviews', 'rates')->where('user_id', Auth::user()->id)->orderBy('name', 'asc')->cursorPaginate(10)
        ];

        return view('my-waifu.index', $data);
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
        $request->validate([
            'name' => ['required'],
            'origin' => ['required'],
            'type' => ['required'],
            'photo' => ['required'],
            'description' => ['required']
        ]);

        $waifu = new Waifu();
        $waifu->user_id = Auth::user()->id;
        $waifu->name = $request->name;
        $waifu->slug = Str::slug($request->name) . '-' . Str::random(5);
        $waifu->type = $request->type;
        $waifu->birthdate = $request->birthdate;
        $waifu->photo = $request->photo;
        $waifu->origin = $request->origin;
        $waifu->description = $request->description;
        $waifu->save();

        return redirect()->route('my-waifu.index');
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
            'reviews_count' => Review::where('waifu_id', $waifu->id)->get()->count(),
            'love_count' => Rate::where('waifu_id', $waifu->id)->where('type', 'love')->get()->count(),
            'meh_count' => Rate::where('waifu_id', $waifu->id)->where('type', 'meh')->get()->count(),
            'user_rate' => Rate::where('waifu_id', $waifu->id)->where('user_id', Auth::user()->id)->first()
        ];

        return view('my-waifu.show', $data);
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
        $data = [
            'waifu' => $waifu
        ];

        return view('my-waifu.edit', $data);
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
        $request->validate([
            'name' => ['required'],
            'origin' => ['required'],
            'description' => ['required']
        ]);

        $waifu->user_id = Auth::user()->id;
        $waifu->name = $request->name;
        $waifu->slug = Str::slug($request->name) . '-' . Str::random(5);
        $waifu->birthdate = $request->birthdate;
        $waifu->origin = $request->origin;
        $waifu->description = $request->description;
        $waifu->save();

        return redirect()->route('my-waifu.show', [$waifu->slug]);
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
        $waifu->delete();

        return redirect()->route('my-waifu.index');
    }

    public function gacha($type)
    {
        if($type=='sfw'){
            $request = Http::get('https://api.waifu.pics/sfw/waifu');
        }elseif($type=='nsfw'){
            $request = Http::get('https://api.waifu.pics/nsfw/waifu');
        }

        $data = [
            'type' => $type,
            'photo' => $request->json(['url']),
        ];
        
        return view('my-waifu.gacha', $data);
    }
}
