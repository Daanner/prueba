<?php

namespace App\Http\Controllers;

use App\Models\Garaje;
use App\Http\Requests\GarajeRequest;

/**
 * Class GarajeController
 * @package App\Http\Controllers
 */
class GarajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garajes = Garaje::paginate();

        return view('garaje.index', compact('garajes'))
            ->with('i', (request()->input('page', 1) - 1) * $garajes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $garaje = new Garaje();
        return view('garaje.create', compact('garaje'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GarajeRequest $request)
    {
        Garaje::create($request->validated());

        return redirect()->route('garajes.index')
            ->with('success', 'Garaje created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $garaje = Garaje::find($id);

        return view('garaje.show', compact('garaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $garaje = Garaje::find($id);

        return view('garaje.edit', compact('garaje'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GarajeRequest $request, Garaje $garaje)
    {
        $garaje->update($request->validated());

        return redirect()->route('garajes.index')
            ->with('success', 'Garaje updated successfully');
    }

    public function destroy($id)
    {
        Garaje::find($id)->delete();

        return redirect()->route('garajes.index')
            ->with('success', 'Garaje deleted successfully');
    }
}
