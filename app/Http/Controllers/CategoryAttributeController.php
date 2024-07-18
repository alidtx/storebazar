<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryAttributeRequest;
use App\Http\Requests\UpdateCategoryAttributeRequest;
use App\Models\CategoryAttribute;

class CategoryAttributeController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryAttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryAttributeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryAttribute  $categoryAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryAttribute $categoryAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryAttribute  $categoryAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryAttribute $categoryAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryAttributeRequest  $request
     * @param  \App\Models\CategoryAttribute  $categoryAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryAttributeRequest $request, CategoryAttribute $categoryAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryAttribute  $categoryAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryAttribute $categoryAttribute)
    {
        //
    }
}
