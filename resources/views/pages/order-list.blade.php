@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Order List'])
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
                    <h6>Order List</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Order ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Product Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Order Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quantity</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Bidding Price</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Updated Price</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>

                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{'#ORDER'.$order->id}}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$order->orderItems[0]->product_name ?? 'N/A'}}</p>

                                    </td>
                                    <td class="text-sm">
                                        <span>{{date("j M, Y", strtotime($order->created_at))}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="font-weight-bold">{{$order->orderItems[0]->qty ?? 'N/A'}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="font-weight-bold">{{ ($order->bidding_price=="" || $order->bidding_price=="0") ? 'N/A': $order->bidding_price."tk" }}</span>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                    <span class="font-weight-bold">{{($order->updated_price=="" || $order->updated_price=="0") ? 'N/A': $order->updated_price."tk" }}</span>
                                    </td>

                                    <td class="text-center">
                                        @if($order->order_status=="pending")
                                        <span class="badge badge-sm bg-gradient-warning">{{$order->order_status }}</span>
                                        @elseif($order->order_status=="cancelled")
                                        <span class="badge badge-sm bg-gradient-danger">{{$order->order_status }}</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-success">{{$order->order_status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    <a href="{{route('order.show',$order->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Show Details">
                                            <i class="fas fa-eye text-danger" style="font-size: 18px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <div class="text-center">
                                    <p style="padding-top: 30px;">কোন Order পাওয়া যাই নাই |</p>
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
        {!! $orders->links() !!}
    </div>

    @include('layouts.footers.auth.footer')
</div>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>



<script>
    $(document).ready(function() {



    })
</script>


@endsection