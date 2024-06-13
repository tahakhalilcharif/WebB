<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Website;
use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index(Page $page)
    {
        $components = $page->components;
        return view('components.index', compact('page', 'components'));
    }

    public function create(Website $website, Page $page)
    {
        return view('components.create', compact('website', 'page'));
    }

    public function store(Request $request, Website $website, Page $page)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $component = new Component([
            'type' => $request->get('type'),
            'content' => $request->get('content'),
            'page_id' => $page->id,
        ]);

        $component->save();

        return redirect()->route('pages.show', ['website' => $website->id, 'page' => $page->id])->with('success', 'Component created successfully.');
    }

    public function show(Website $website, Page $page, Component $component)
    {
        return view('components.show', compact('website', 'page', 'component'));
    }

    public function edit(Website $website, Page $page, Component $component)
    {
        return view('components.edit', compact('website', 'page', 'component'));
    }

    public function destroy(Website $website, Page $page, Component $component)
    {
        $component->delete();

        return redirect()->route('pages.show', ['website' => $website->id, 'page' => $page->id])->with('success', 'Component deleted successfully.');
    }

    public function update(Request $request, Component $component)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $component->update($request->all());

        return redirect()->route('pages.show', $component->page_id)->with('success', 'Component updated successfully.');
    }
}
