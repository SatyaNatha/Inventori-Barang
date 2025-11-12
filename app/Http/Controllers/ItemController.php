<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function __construct()
    {
        // middleware: must be authenticated for all actions
        $this->middleware('auth');
    }

    public function index()
    {
        // admin sees all items; regular user sees all too (or could be filtered)
        $items = Item::latest()->paginate(10);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:items,code|max:50',
            'name' => 'required|max:191',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['code','name','description','quantity','price']);
        $data['created_by'] = $request->user()->id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('items', 'public');
            $data['image'] = $path;
        }

        Item::create($data);

        return redirect()->route('items.index')->with('success', 'Item created.');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'code' => 'required|unique:items,code,' . $item->id,
            'name' => 'required|max:191',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['code','name','description','quantity','price']);

        if ($request->hasFile('image')) {
            // delete old if exists
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $path = $request->file('image')->store('items', 'public');
            $data['image'] = $path;
        }

        $item->update($data);

        return redirect()->route('items.index')->with('success','Item updated.');
    }

    public function destroy(Item $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return redirect()->route('items.index')->with('success','Item deleted.');
    }
}
