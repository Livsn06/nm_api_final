<?php

namespace App\Http\Controllers;

use App\Models\Workplace;
use App\Http\Requests\StoreWorkplaceRequest;
use App\Http\Requests\UpdateWorkplaceRequest;

class WorkplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkplaceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Workplace $workplace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkplaceRequest $request, Workplace $workplace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workplace $workplace)
    {
        //
    }
}
