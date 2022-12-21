<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\WelcomeText;
use App\Models\Type;
class HomeController extends Controller
{
    public function index()
    {
        $welcome_text = WelcomeText::first();
        $slide = Slide::where('status',1)->get();
        $type = Type::where('status',1)->get();
        return response()->json([
            'message' => true,
            'slide' => $slide,
            'type' => $type,
            'welcome_text' => $welcome_text,
        ], 200);
    }
}
