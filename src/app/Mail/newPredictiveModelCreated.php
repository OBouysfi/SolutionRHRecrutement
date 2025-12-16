<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newPredictiveModelCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $label;
    public $profession;
    public $company_name;
    public $predictiveModelId;


    public function __construct( $label, $profession, $company_name , $predictiveModelId, $data)
    {
        $this->label = $label;
        $this->data = $data;
        $this->profession = $profession;
        $this->company_name = $company_name;
        $this->predictiveModelId = $predictiveModelId;
    }


    public function build()
    {
        $decodedData = json_decode($this->data, true);  // Use true for an associative array

        // Check for JSON decoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
           $decodedData = []; // Default to empty array on failure
        }


        return $this->subject('New Predictive Model Created')
                    ->view('emails.personalityTest.newPredictiveModelCreated')
                    ->with([
                        'label' => $this->label,
                        'data' => $decodedData,
                        'profession' => $this->profession,
                        'company_name' => $this->company_name,
                        'predictiveModelId' => $this->predictiveModelId,
                    ]);
    }
}
