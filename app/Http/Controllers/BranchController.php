<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\PageSetting;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::where('active', true)->paginate(3);

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'showrooms')->first();

        return view('branches', compact('branches', 'pageSetting'));
    }
}
