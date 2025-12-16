<?php

namespace App\Services;

use App\Models\User;
use DateTime;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




use Exception;
use GuzzleHttp\Client;

class UserService
{

     /**
     * Récupérer les informations de l'utilisateur connecté.
     */
    public function getAuthenticatedUser()
    {
        return Auth::user(); // Retourne l'utilisateur actuellement connecté
    }

    /**
     * Mettre à jour un utilisateur existant.
     */
    public function updateUserDetails($userId, array $data)
    {
        try {
            // Find the user by ID
            $user = User::findOrFail($userId);
    
            // Update the user details with the provided data
            $user->update($data);
    
            return $user;
        } catch (Exception $e) {
            // Handle error
            return null;
        }
    }
    
 
}
