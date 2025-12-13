<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');

        // Make the Gemini API request
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(
            'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=' . env('GEMINI_API_KEY'),
            [
                'contents' => [
                    ['parts' => [['text' => $userMessage]]]
                ]
            ]
        );

        // Check for API error
        if (!$response->successful()) {
            Log::error('Gemini API error: ' . $response->body());
            return response()->json(['reply' => 'Something went wrong.'], 500);
        }

        // Extract and return the AI reply
        $data = $response->json();
        $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'No reply from Gemini.';

        return response()->json(['reply' => $reply]);
    }
}
