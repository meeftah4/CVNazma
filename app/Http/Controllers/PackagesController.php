<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::orderBy('created_at', 'desc')->get();
        return view('dashboard.package', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.package-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'amount' => 'required|integer|min:1',
            'original' => 'nullable|integer|min:0',
            'bonus' => 'nullable|integer|min:0', // tambahkan ini
        ]);

        Package::create($request->all());

        return redirect()->route('dashboard.package.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('dashboard.package-form', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'amount' => 'required|integer|min:1',
            'original' => 'nullable|integer|min:0',
            'bonus' => 'nullable|integer|min:0', // tambahkan ini
        ]);

        $package->update($request->all());

        return redirect()->route('dashboard.package.index')->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('dashboard.package.index')->with('success', 'Paket berhasil dihapus.');
    }
}
