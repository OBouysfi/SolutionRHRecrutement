<?php

namespace App\Services;


use App\Http\Resources\FormationResource;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class FormationService
{
    public function storeFormation($request, $profile_id)
    {
        $formation = new Formation();
        $formation->name = $request->name;
        $formation->city_id = $request->city_id;
        $formation->address = $request->address;
        $formation->phone = $request->phone;
        $formation->secondary_phone = $request->secondary_phone;
        $formation->email = $request->email;
        $formation->date = $request->date;
        $formation->level_id = $request->level_id;
        $formation->diploma_id = $request->diploma_id;
        $formation->option_id = $request->option_id;
        $formation->description = $request->description;
        $formation->mention = $request->mention;
        $formation->started_at = $request->started_at;
        $formation->finished_at = $request->finished_at;
        $formation->profile_id = $profile_id;

        if ($request->hasFile('logo')) {
            $formation->logo = $request->file('logo')->store('profiles/formations/formation_logos', 'public');
        }
        $formation->save();

        $formation->load(['diploma', 'option', 'level', 'city.country']);

        return $formation;
    }

    public function getFormations($profile_id)
    {
        return Formation::where("profile_id", $profile_id)
            ->with(['level', 'diploma', 'city', 'option'])
            ->get();
    }


    public function updateFormation($request)
    {
        $formation = Formation::findOrFail($request->id);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($formation->logo) {
                Storage::disk('public')->delete($formation->logo);
            }
            $formation->logo = $request->file('logo')->store('profiles/formation_logos', 'public');
        }

        // Update formation
        $formation->update([
            'profile_id' => session('profile_id'),
            'name' => $request->name,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'secondary_phone' => $request->secondary_phone,
            'email' => $request->email,
            'date' => $request->date,
            'level_id' => $request->level_id,
            'diploma_id' => $request->diploma_id,
            'option_id' => $request->option_id,
            'description' => $request->description,
            'mention' => $request->mention,
            'started_at' => $request->started_at,
            'finished_at' => $request->finished_at
        ]);

        // Fetch updated formations
        $formations = $this->getFormations(session('profile_id'));

        return [
            'message' => 'Formation updated successfully!',
            'formation' => new FormationResource($formation),
            'formations' => FormationResource::collection($formations)
        ];
    }
}
