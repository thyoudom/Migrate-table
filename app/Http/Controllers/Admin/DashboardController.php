<?php

namespace App\Http\Controllers\Admin;


use App\Services\QueryService;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{

    // public function __construct(QueryService $queryService)
    // {
    //     $this->queryService = $queryService;
    //     $this->middleware('permission:dashboard-view', ['only' => ['index']]);
    // }

    public function index()
    {
        $data["dashboard"] = [
            (object)[
                'name' => 'total_user',
                'icon' => 'users',
                'value' => $this->countUser(),
                'custom_class' => 'bg-primary',
                'link' => route('admin-user-list'),
            ],
        ];

        return view("admin::pages.dashboard", $data);
    }
    public function countUser()
    {
        return User::where('type', 'admin')->whereNot('role', 'super_admin')->count();
    }
}
