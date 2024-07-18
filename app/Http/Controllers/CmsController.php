<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\CmsDetails;
use App\Models\Notifications;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CmsController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'  => 'required|unique:cms_details',
                'slug'   => 'required|unique:cms',
                'content' => 'required',
            ],$messages=[
                'title.required'=>'Title is required',
                'title.unique'=>'This title is already taken',
                'slug.required'=>'Slug is required',
                'slug.unique'=>'Slug is already taken',
                'content.required'=>'Content is required'
            ]
        );
        if ($validator->fails()) {
            return $this->ajaxResponse(422, 'The given data is invalid.', $validator->errors($messages), []);
        }

        DB::beginTransaction();
        try {
            $cms = Cms::create(
                [
                    'slug' => $request->slug,
                ]
            );
            CmsDetails::create(
                [
                    'cms_id' => $cms->id,
                    'title' => $request->title,
                    'content' => $request->content,
                    'language_id' => $request->language_id ?? 1,

                ]
            );

            DB::commit();

            return $this->ajaxResponse(200, 'CMS created Successfully.', [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('test');
        $orderDetails = Orders::with("orderItems")->where("id",$id)->first();
        $sellerInfo = User::where('id',$orderDetails->seller_id)->first();
        $buyerInfo = User::where("id",$orderDetails->customer_id)->first();
        $productInfo = Product::where("id", $orderDetails->product_id)->first();
        
        return view("pages.order-details",[
            'details'=>$orderDetails,
            'seller'=>$sellerInfo,
            'buyer'=>$buyerInfo,
            'product'=>$productInfo,
            'area_list' => $this->divisional_areas(),
            'notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()
        ]);
    }

    private function divisional_areas()
    {
        return [
            'ctg' => "চট্টগ্রাম",
            'dhk' => "ঢাকা",
            'bar' => "বরিশাল",
            'raj' => "রাজশাহী",
            'rang' => "রংপুর",
            'mym' => "ময়মনসিংহ",
            'mym' => "খুলনা",
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cms = Cms::find($id);
        return view('pages.cms.edit', [
            'cms' => $cms,
            'notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'title'      => 'required|'.Rule::unique('cms_details')->ignore($request->cms_id,'cms_id'),
                'slug'   => 'required|'.Rule::unique('cms')->ignore($request->cms_id),
                'content'      => 'required',
            ],$messages=['title.required'=>'Title is required','content.required'=>'Content is required']
        );
        if ($validator->fails()) {
            return $this->ajaxResponse(422, 'The given data is invalid.', $validator->errors($messages), []);
        }

        DB::beginTransaction();
        try {

            $cms = Cms::find($request->cms_id);
            if ($cms) {
                $cms->update([
                    'slug' => request()->slug,
                ]);
                $cmsDetails = CmsDetails::where('cms_id', $request->cms_id)->where('language_id', 1)->first();
                $cmsDetails->update([
                    'title' => request()->title,
                    'content' => request()->content,

                ]);
            }
            DB::commit();

            return $this->ajaxResponse(200, 'CMS updated Successfully.', [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cms = Cms::find($id);
        $cms->delete();
        CmsDetails::where('cms_id', $id)->delete();
        session()->flash('success', 'Cms deleted successfully.');
        return redirect('/cms-list');
    }
}
