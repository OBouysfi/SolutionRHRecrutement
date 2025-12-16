<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecruitmentCost;
use App\Enums\RecruitmentCost\DeviseEnum;




class RecruitmentCostController extends Controller
{
    public function listing()
    {
        $devises=DeviseEnum::getAll();
         $RecruitmentCosts=RecruitmentCost::all();
        return view('jobOffer.recruitmentCost.listing',compact('RecruitmentCosts','devises'));
    }
   
}
