<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviews;

class FeedbackController extends Controller
{
    // Show all feedback
    public function index()
    {
        $reviews = Reviews::with(['patient', 'caregiver'])
            ->latest()
            ->get();

        // IMPORTANT: blade path
        return view('admin.feedback', compact('reviews'));
    }

    // Delete feedback
    public function destroy($id)
    {
        $review = Reviews::findOrFail($id);
        $review->delete();

        return redirect()
            ->route('admin.feedback.index')
            ->with('success', 'Feedback deleted successfully');
    }
}
