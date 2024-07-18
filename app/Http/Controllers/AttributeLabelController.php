<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttributeLabelRequest;
use App\Http\Requests\UpdateAttributeLabelRequest;
use App\Models\AttributeLabel;

class AttributeLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttributeLabelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeLabelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeLabel  $attributeLabel
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeLabel $attributeLabel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeLabel  $attributeLabel
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeLabel $attributeLabel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttributeLabelRequest  $request
     * @param  \App\Models\AttributeLabel  $attributeLabel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeLabelRequest $request, AttributeLabel $attributeLabel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeLabel  $attributeLabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeLabel $attributeLabel)
    {
        //
    }
}
