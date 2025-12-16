<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SupportService;
use App\Models\Support;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SupportController extends Controller
{
    private $SupportService;

    public function __construct(SupportService $SupportService)
    {
        $this->SupportService = $SupportService;
    }

    public function index()
    {
        return view('support.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        try {

            $entity = $this->SupportService->create($validatedData);
            Log::info('Support request received:', $validatedData);
            return response()->json(['message' => __('messages.email_sent_success')], Response::HTTP_OK);
        } catch (\Throwable $e) {

            Log::error('Error while processing support request', [
                'error.message' => $e->getMessage(),
                'error.trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'message' => __('messages.error_occurred'),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
