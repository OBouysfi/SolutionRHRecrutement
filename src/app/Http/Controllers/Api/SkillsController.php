<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class SkillsController extends Controller{

    public function technicalSkillsIndex()
    {
        $technical_skills = DB::table('skill_types')->where('parent_id', 1)->join('skills','skill_types.id', '=', 'skills.skill_type_id')
                                                    ->select([
                                                        'skills.id',
                                                        'skill_types.id as skill_type_id',
                                                        'skill_types.label as skill_type',
                                                        'skills.label as skill'
                                                    ]); 
        return DataTables::of($technical_skills)
        ->addColumn('skill_type', function ($technical_skill) {
            return __($technical_skill->skill_type)  ?? '-';
        })
        ->addColumn('skill', function ($technical_skill) {
                return __($technical_skill->skill)  ?? '-';
        
        })

        ->addColumn('action', function ($technical_skill) {
            return '
                <div class="dropdown text-center">
                    <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)"  onclick="viewDetails(' . $technical_skill->id . ')">
                                Détails
                            </a>
                        </li>
                         <li>
                            <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editmodal' . $technical_skill->id . '" >
                                Modifier
                            </a>
                          </li>
                         <li>
                            <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)" 
                            onclick="deleteProfession('. $technical_skill->id .')">
                                Supprimer
                            </a>
                        </li>
                    </ul>
                </div>

                 <div class="modal fade" id="editmodal' . $technical_skill->id . '" tabindex="-1" aria-labelledby="editmodal' . $technical_skill->id . '" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered">
                       <div class="modal-content">
                         <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier métier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                     <div class="modal-body">
              <form action="" method="POST" id="editform">
                 @csrf
            <label > Métier </label>
            <input type="hidden" name="id" id="id" value="' . $technical_skill->id . '">
            <input type="text" class="form-control" name="Profession" id="Profession" value="' . __($technical_skill->skill) . '">
       
    </div>
    <div class="modal-footer">
        <div class="px-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
            <input type="submit" class="btn btn-theme " id="save"></button>  
            </form>
   </div>
  </div>
  </div>
  </div>

            ';
        })

        // Autoriser HTML
        ->rawColumns(['action'])

        ->make(true);
    }

}