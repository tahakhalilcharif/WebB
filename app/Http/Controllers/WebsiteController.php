<?php
namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $websites = Website::all();
        return view('websites.index', compact('websites'));
    }

    public function create()
    {
        return view('websites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $website = new Website();
        $website->user_id = auth()->id();
        $website->name = $request['name'];
        $website->save();

        return redirect()->route('websites.index')->with('success', 'Website created successfully.');
    }

    public function show(Website $website)
    {
        return view('websites.show', compact('website'));
    }

    public function edit(Website $website)
    {
        
        return view('websites.edit', compact('website'));
    }

    public function update(Request $request, Website $website)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $website->update($request->all());

        return redirect()->route('websites.index')->with('success', 'Website updated successfully.');
    }

    public function destroy(Website $website)
    {
        $website->delete();

        return redirect()->route('websites.index')->with('success', 'Website deleted successfully.');
    }
}
