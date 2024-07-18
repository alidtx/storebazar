<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Models\Attribute;
use App\Models\AttributeLabel;
use App\Models\CategoryAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Notifications;

class AttributeController extends Controller
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
     * @param  \App\Http\Requests\StoreAttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'code'      => 'required',
                'label'   => 'required',
                'type'      => 'required',
            ],$messages=['label.required'=>'Attribute name is required']
        );
        if ($validator->fails()) {
            return $this->ajaxResponse(422, 'The given data is invalid.', $validator->errors($messages), []);
        }

        DB::beginTransaction();
        try {
            $attribute = Attribute::create(
                [
                    'code' => $request->code,
                    'type' => $request->type,

                ]
            );
            AttributeLabel::create(
                [
                    'attribute_id' => $attribute->id,
                    'label' => $request->label,
                    'language_id' => $request->language_id ?? 1,

                ]
            );

            DB::commit();

            return $this->ajaxResponse(200, 'Attribute created Successfully.', [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::find($id);
        return view('pages.attribute-edit', [
            'attribute' => $attribute,
            'notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttributeRequest  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'code'      => 'required',
                'label'   => 'required',
                'type'      => 'required',
            ],$messages=['label.required'=>'Attribute name is required']
        );
        if ($validator->fails()) {
            return $this->ajaxResponse(422, 'The given data is invalid.', $validator->errors($messages), []);
        }

        DB::beginTransaction();
        try {

            $attribute = Attribute::find($request->attribute_id);
            if ($attribute) {
                $attribute->update([
                    'code' => request()->code,
                    'type' => request()->type,
                ]);
                $attributeLabel = AttributeLabel::where('attribute_id', $request->attribute_id)->where('language_id', 1)->first();
                $attributeLabel->update([
                    'label' => request()->label,

                ]);
            }
            DB::commit();

            return $this->ajaxResponse(200, 'Attribute updated Successfully.', [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $attribute = Attribute::find($id);
        $attribute->delete();
        CategoryAttribute::where('attribute_id', $id)->delete();
        session()->flash('success', 'Attribute deleted successfully.');
        return redirect('/attribute-list');
    }
}
