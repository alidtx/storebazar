<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttributeValuesRequest;
use App\Http\Requests\UpdateAttributeValuesRequest;
use App\Models\AttributeValues;

class AttributeValuesController extends Controller
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
     * @param  \App\Http\Requests\StoreAttributeValuesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeValuesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeValues  $attributeValues
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeValues $attributeValues)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeValues  $attributeValues
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeValues $attributeValues)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttributeValuesRequest  $request
     * @param  \App\Models\AttributeValues  $attributeValues
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeValuesRequest $request, AttributeValues $attributeValues)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeValues  $attributeValues
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeValues $attributeValues)
    {
        //
    }
}
