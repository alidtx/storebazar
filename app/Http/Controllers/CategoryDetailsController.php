<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryDetailsRequest;
use App\Http\Requests\UpdateCategoryDetailsRequest;
use App\Models\CategoryDetails;

class CategoryDetailsController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryDetails  $categoryDetails
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryDetails $categoryDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryDetails  $categoryDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryDetails $categoryDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryDetailsRequest  $request
     * @param  \App\Models\CategoryDetails  $categoryDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryDetailsRequest $request, CategoryDetails $categoryDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryDetails  $categoryDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDetails $categoryDetails)
    {
        //
    }
}
