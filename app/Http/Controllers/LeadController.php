<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Cache;

class LeadController extends Controller
{
    public function index() {
        $cacheKey = 'leads_index';
        $view = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            $leads = Lead::with(['user' => function ($query) {
                        $query->where('status', 'ACTIVE');
                    }])
                    ->whereIn('type', ['WEB', 'MOBILE', 'AUTO', 'EMBEDDED'])
                    ->get()
                    ->groupBy('type');

            return view('leads.index', compact('leads'))->render();
        });

        return $view;
            }
}
