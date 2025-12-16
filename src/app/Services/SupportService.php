<?php
namespace App\Services;

use App\Models\Support;

class SupportService
{
    public function create(array $data)
    {
       
        $supportRequest = new Support();
        $supportRequest->first_name = $data['first_name'];
        $supportRequest->last_name = $data['last_name'];
        $supportRequest->subject = $data['subject'];
        $supportRequest->email = $data['email'];
        $supportRequest->message = $data['message'];

        $supportRequest->save();

        return $supportRequest;
    }
}
