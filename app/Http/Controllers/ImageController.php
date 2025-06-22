public function upload(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();
    $request->image->storeAs('images', $imageName, 'public');

    return back()->with('success', 'Image uploaded successfully.')
                 ->with('image', $imageName);
}
