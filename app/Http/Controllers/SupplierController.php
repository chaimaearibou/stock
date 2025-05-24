<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function create()
    {
        return view('suppliers.ajoute');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:suppliers,email',
            'address'    => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully.');
    }
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edite', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:suppliers,email,' . $supplier->id,
            'address'    => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }

    public function delete(Supplier $supplier)
    {
        return view('suppliers.delete', compact('supplier'));
    }
}
