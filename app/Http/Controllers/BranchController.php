<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all(); // get all users from DB
        return view('branches.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branches.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:branches',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'nullable|string|max:15|unique:branches',
            'address' => 'required|string|max:255|unique:branches',
            
        ]);
        $validated['password'] = bcrypt($validated['password']);
        Branch::create($validated);
        return redirect()->route('branches.index')->with('success', 'Branch created successfully!');
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::findOrFail($id);
        return view('branches.index', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branches = Branch::findOrFail($id);
        return view('branches.edit', compact('branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branches = Branch::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:branches,email,' . $branches->id,
            'password' => 'nullable|string|confirmed|min:8',
            'phone' => 'nullable|string|max:15|unique:branches,phone,' . $branches->id,
            'address' => 'required|string|max:255|unique:branches,address,' . $branches->id,
        ]);

        if ($validated['password']) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $branches->update($validated);
        return redirect()->route('branches.index')->with('success', 'Branch updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branches = Branch::findOrFail($id);
        $branches->delete();
        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully!');
    }
}
