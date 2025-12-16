<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $stats = $this->dashboardService->getDashboardStats();
        return response()->json($stats);
    }
    
    public function completudeCvs(Request $request)
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->getCompletudeCvs($year); 
    }
    
    public function obsolescence(Request $request)
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->obsolescence($year); 
        
    }

    public function reussite(Request $request)
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->reussite($year); 
        
    }

    public function embauche(Request $request)
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->embauche($year);
    } 
    
    public function jobOffersByActivityArea(Request $request)
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->jobOffersByActivityArea($year); 
        
    }

    public function jobOffersByRegion(Request $request)
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->jobOffersByRegion($year); 
        
    }

    public function jobOffersByPost(Request $request)
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->jobOffersByPost($year); 
        
    }

    public function sourceData(Request $request)
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->sourceData($year); 
        
    }

    public function getCvthequeMatch(Request $request)
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->getCvthequeMatch($year); 
        
    }

    public function getVivierMatch(Request $request) 
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->getVivierMatch($year); 
        
    }

    public function getcandidate(Request $request) 
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->getcandidate($year); 
        
    }
    
    public function getdiversite(Request $request) 
    {

        $year = $request->input('year', date('Y'));
        return $this->dashboardService->getdiversite($year); 
        
    }
}
