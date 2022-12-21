<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Support;
class PageController extends Controller
{
    public function index(Request $req)
    {
        $page = Page::where('type', $req->type)->first();
        return response()->json([
            'message' => true,
            'data' => $page,
        ], 200);
    }
    public function support()
    {
        $text = Page::where('type', 'support')->first();
        $support = Support::where('status',1)->get();
        return response()->json([
            'message' => true,
            'text' => $text,
            'data' => $support,
        ], 200);
    }
}
