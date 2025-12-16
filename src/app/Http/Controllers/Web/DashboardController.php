<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
        $this->middleware('permission:dashboard-access')->only(['view']);
    }

    public function view(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        // Récupérer les stats
        $stats = $this->dashboardService->getDashboardStats($startDate, $endDate);
           
        return view('dashboard.view', compact('stats'));
    }
}
