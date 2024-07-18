<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttributeOptionRequest;
use App\Http\Requests\UpdateAttributeOptionRequest;
use App\Models\AttributeOption;

class AttributeOptionController extends Controller
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
     * @param  \App\Http\Requests\StoreAttributeOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeOptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeOption  $attributeOption
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeOption $attributeOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeOption  $attributeOption
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeOption $attributeOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttributeOptionRequest  $request
     * @param  \App\Models\AttributeOption  $attributeOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeOptionRequest $request, AttributeOption $attributeOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeOption  $attributeOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeOption $attributeOption)
    {
        //
    }
}
