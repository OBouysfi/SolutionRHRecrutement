<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RecruitmentCost;
use Illuminate\Http\{Request, JsonResponse};
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\RecruitmentCostRequest;
use Illuminate\Support\Facades\Storage;




class RecruitmentCostController extends Controller
{
    public function listing(Request $request){
       
        $costs = RecruitmentCost::with('user')->select('recruitment_costs.*');

        if ($request->filled('start_date')) {
            $costs->whereDate('created_at', '>=', $request->start_date);
        }
        
        if ($request->filled('end_date')) {
            $costs->whereDate('created_at', '<=', $request->end_date);
        }
        
        if ($request->filled('devise') && $request->devise !== 'Tous') {
            $costs->where('devise', $request->devise);
        }
        


        // Calculate totals
        $totalBudget = RecruitmentCost::sum('budget');
        $totalAmount = RecruitmentCost::sum('amount');
        $totalDifference = $totalAmount - $totalBudget;
        return DataTables::of($costs)
        ->addColumn('logo_platform', function($cost) {
            return '
                <div style="display: flex; align-items: center;">
                    <img src="' . $cost->getLogoUrl() . '" style="width: 24px;">
                    <span style="font-size: 14px; margin-left: 6px; font-weight: 700;">'.$cost->platform.'</span>
                </div>
            ';
        })

            ->addColumn('budget', fn($cost) => number_format($cost->budget, 2, ',', ' '))
            ->addColumn('date', fn($cost) => \Carbon\Carbon::parse($cost->created_at)->format('d/m/Y'))
            ->addColumn('amount', fn($cost) => number_format($cost->amount, 2, ',', ' '))
            ->addColumn('invoice', function($cost) {
                return $cost->invoice 
                    ? '<a href="'.asset('storage/'.$cost->invoice).'" target="_blank" style="display: block; text-align: center;"><i class="bi bi-file-earmark" style="color: #6177db; font-size: 19px;"></i></a>'
                    : '-';
            })
            ->addColumn('difference', fn($cost) => number_format($cost->amount - $cost->budget, 2, ',', ' '))
            ->addColumn('user', fn($cost) => $cost->user ? $cost->user->name : '-')
            ->addColumn('action', function ($cost) {
                return view('jobOffer.recruitmentCost.inc.action', compact('cost'))->render();
            })
            ->rawColumns(['logo_platform', 'invoice','action'])
            ->with([
                'totalBudget' => number_format($totalBudget, 2, ',', ' '),
                'totalAmount' => number_format($totalAmount, 2, ',', ' '),
                'totalDifference' => number_format($totalDifference, 2, ',', ' ')
            ])
            ->make(true);
    }



    public function store(RecruitmentCostRequest $request)
    {
        // alidated data
        $validated = $request->validated();
    
        //  current authenticated user id
        $validated['user_id'] = auth()->id();
    
        // Calculate the difference (Montant - Budget)
        $validated['difference'] = $validated['amount'] - $validated['budget'];
    
        if ($request->hasFile('invoice')) {
            $file = $request->file('invoice');
        
            if ($file->isValid()) {
                $facturePath = $file->store('/recruitmentCost', 'public');
                $validated['invoice'] = $facturePath;
            } else {
                return response()->json(['error' => 'Le fichier est invalide.'], 422);
            }
        }
        
        
    
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('/img/recruitmentCost', 'public');
            $validated['logo'] = $path;
        }
        
        // Force status to 0 or 1
        $validated['created_at'] = now();

        // Create the recruitment cost record
        RecruitmentCost::create($validated);
    
        // Redirect with success message
       
        return response()->json([
            'status' => 'success',
            'message' => 'Le coût de recrutement a été ajouté avec succès.',
        ], 201);
    }
    

    public function update(RecruitmentCostRequest $request, $id)
    {
        // 1️Récupère 
        $recruitmentCost = RecruitmentCost::findOrFail($id);

        //  validées
        $data = $request->validated();

        //  Calcul de la différence
        $data['difference'] = $request->amount - $request->budget;

        \Log::info("message",$request->all());


        //  Upload de la facture (invoice) si présent
        if ($request->hasFile('invoice')) {
            $file = $request->file('invoice');
            if ($file->isValid()) {
                $data['invoice'] = $file->store('recruitmentCost/', 'public');
            } else {
                return response()->json(['error' => 'Le fichier facture est invalide.'], 422);
            }
        } else {
            // Ne rien modifier : on supprime la clé pour qu'elle ne passe pas dans l'update
            unset($data['invoice']);
        }
        //  Upload du logo si présent
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('/img/recruitmentCost', 'public');
            $data['logo'] = $path;
        
        } else {
            // Ne rien modifier : on supprime la clé pour qu'elle ne passe pas dans l'update
            unset($data['logo']);
        }
        // Mettre à jour le status (0 ou 1)
        $data['updated_at'] = now();
        //  Mise à jour
        $recruitmentCost->update($data);

        //  Réponse
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Le coût de recrutement a été mis à jour avec succès.',
                'data'    => $recruitmentCost
            ]);
        }

        return redirect()
            ->route('recruitment-costs.index')
            ->with('success', 'Le coût de recrutement a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        try {
            $RecruitmentCost=RecruitmentCost::find($id);
            $RecruitmentCost->delete();
            return response()->json(['message' => 'Le coût de recrutement supprimé avec succès.'], 200);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de  coût de recrutement : ' . $e->getMessage());
            return response()->json(['message' => 'Erreur lors de la suppression de Le coût de recrutement.'], 500);
        }
    }

}
