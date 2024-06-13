<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Website;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Website $website)
    {
        $pages = $website->pages;
        return view('pages.index', compact('website', 'pages'));
    }

    public function create(Website $website)
    {
        return view('pages.create', compact('website'));
    }

    public function store(Request $request, Website $website)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $page = new Page([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'website_id' => $website->id,
        ]);

        $page->save();

        return redirect()->route('websites.show', $website->id)->with('success', 'Page created successfully.');
    }

    public function show(Website $website, Page $page)
    {
        return view('pages.show', compact('website', 'page'));
    }

    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $page->update($request->all());

        return redirect()->route('pages.show', $page->id)->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('websites.show', $page->website_id)->with('success', 'Page deleted successfully.');
    }
}
