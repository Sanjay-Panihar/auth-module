<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Cache;

class LeadController extends Controller
{
    public function index()
    {
        $webLeads = $this->getLeadsByType('WEB');
        $mobileLeads = $this->getLeadsByType('MOBILE');
        $autoLeads = $this->getLeadsByType('AUTO');
        $embeddedLeads = $this->getLeadsByType('EMBEDDED');

        return view('leads.index', compact('webLeads', 'mobileLeads', 'autoLeads', 'embeddedLeads'));
    }
    private function getLeadsByType($type)
    {
        $cacheKey = 'leads_' . $type;

        return Cache::rememberForever($cacheKey, function () use ($type) {
            return Lead::with('user')
                ->where('type', $type)
                ->whereHas('user', function ($query) {
                    $query->where('status', 'ACTIVE');
                })
                ->get();
        });
    }
}
