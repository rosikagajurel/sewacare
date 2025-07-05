<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Caregiver;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        if (!$user) {
            abort(403, 'Unauthorized action.');
        }

        $caregiver = Caregiver::firstOrNew(['user_id' => $user->id]);

        return view('caregiver.edit', compact('user', 'caregiver'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => "required|email|unique:users,email,{$user->id}",
            'contact_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'field' => 'nullable|string|max:100',
            'bio' => 'nullable|string',
            'qualification' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'caregiver_type' => 'nullable|in:medical,regular,home_nurse',
            'availability_status' => 'nullable|boolean',
            'certificate' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update user info
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->save();

        // Update caregiver info
        $caregiver = Caregiver::firstOrNew(['user_id' => $user->id]);
        $caregiver->contact_number = $request->contact_number;
        $caregiver->address = $request->address;
        $caregiver->skills = $request->skills;
        $caregiver->field = $request->field;
        $caregiver->bio = $request->bio;
        $caregiver->qualification = $request->qualification;
        $caregiver->experience = $request->experience;
        $caregiver->caregiver_type = $request->caregiver_type;
        $caregiver->availability_status = $request->has('availability_status') ? 1 : 0;

        // Handle certificate upload
        if ($request->hasFile('certificate')) {
            if ($caregiver->certificate_path) {
                Storage::disk('public')->delete($caregiver->certificate_path);
            }
            $filename = Str::uuid() . '.' . $request->file('certificate')->getClientOriginalExtension();
            $path = $request->file('certificate')->storeAs('certificates', $filename, 'public');
            $caregiver->certificate_path = $path;
        }

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            if ($caregiver->profile_photo_path) {
                Storage::disk('public')->delete($caregiver->profile_photo_path);
            }
            $photoName = Str::uuid() . '.' . $request->file('profile_photo')->getClientOriginalExtension();
            $photoPath = $request->file('profile_photo')->storeAs('profile_photos', $photoName, 'public');
            $caregiver->profile_photo_path = $photoPath;
        }

        $caregiver->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    // (Optional) If you want to keep a separate route for viewing certificate (not necessary now)
    public function viewCertificate()
{
    $user = Auth::user();
    if (!$user) {
        abort(403, 'Unauthorized action.');
    }

    $caregiver = Caregiver::where('user_id', $user->id)->first();
    if (!$caregiver || !$caregiver->certificate_path || !Storage::disk('public')->exists($caregiver->certificate_path)) {
        abort(404, 'Certificate not found.');
    }

    $mime = Storage::disk('public')->mimeType($caregiver->certificate_path);
    $content = Storage::disk('public')->get($caregiver->certificate_path);
    $filename = 'certificate.' . pathinfo($caregiver->certificate_path, PATHINFO_EXTENSION);

    return response($content, 200)
        ->header('Content-Type', $mime)
        ->header('Content-Disposition', 'inline; filename="' . $filename . '"');
}

}
