<?php

namespace App\Http\Controllers;

use App\Models\Waifu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'waifus' => Waifu::where('user_id', Auth::user()->id)->get()
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
        return view('my-waifu.create');
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
            'photo' => ['required', 'image', 'max:2048'],
            'description' => ['required']
        ]);

        $waifu = new Waifu();
        $waifu->user_id = Auth::user()->id;
        $waifu->name = $request->name;
        $waifu->slug = Str::slug($request->name) . '-' . Str::random(5);
        $waifu->birthdate = $request->birthdate;
        $waifu->photo = $request->file('photo')->store('waifus');
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
            'waifu' => $waifu
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
}
