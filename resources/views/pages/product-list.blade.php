@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Product List'])
<div class="container-fluid py-4">
    <div class="row">

        <div class="col-12">
            @if($errors->any())
            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                <span class="alert-text text-white">
                    {{$errors->first()}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            @endif
            @if(session('success'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                    {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Product List</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Product Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        URL key</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Seller Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Image</th>

                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productList as $product)
                                @php
                                $sellerDetails = App\Models\User::select("name")->where("id",$product->seller_id)->first();
                                @endphp

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$product->productDetails->name ?? 'N/A'}}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$product->url_key ?? 'N/A'}}</p>

                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span>{{number_format($product->price) ?? 'N/A'}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-info">{{ $sellerDetails ? $sellerDetails->name : 'N/A'}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-danger">{{$product->productCategory->categoryDetailInformation->categoryDetail[0]->name ?? 'N/A'}}</span>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        @if(count($product->productImages) > 0)

                                            <img src="{{ asset($product->productImages[0]->image_path) }}" class="avatar avatar-sm me-3">
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{route('product.edit',$product->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Product">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>

                                            <a prodId={{$product->id}} href="{{route('product.delete',$product->id)}}" class="mx-3 del" data-bs-toggle="tooltip" data-bs-original-title="Delete Product">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <div class="text-center">
                                    <p style="padding-top: 30px;">কোন পণ্য পাওয়া যাই নাই |</p>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
        {!! $productList->links() !!}
    </div>

    @include('layouts.footers.auth.footer')
</div>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>



<script>
    $(document).ready(function() {
        $(".del").click(function() {
            let productID = $(this).attr('prodId')
            event.preventDefault();
            Swal.fire({
                title: 'Confirmation !',
                html: 'Do you want to delete the product?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {

                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = "/product-delete/" + productID;
                } else {
                    return false;
                }
            })
        });


    })
</script>


@endsection