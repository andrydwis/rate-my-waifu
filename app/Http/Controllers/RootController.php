<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Waifu;
use Illuminate\Http\Request;

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

    public function about()
    {
        return view('root.about');
    }
}
