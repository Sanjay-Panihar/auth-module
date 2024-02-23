<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Cache;

class LeadController extends Controller
{
    public function index() {
        $cacheKey = 'leads_data';

        $leads = cache()->remember($cacheKey, now()->addMinutes(10), function () {
            return Lead::with(['user' => function ($query) {
                    $query->where('status', 'ACTIVE');
                }])
                ->whereIn('type', ['WEB', 'MOBILE', 'AUTO', 'EMBEDDED'])
                ->get()
                ->groupBy('type');
        });

        return view('leads.index', compact('leads'));
    }
}
