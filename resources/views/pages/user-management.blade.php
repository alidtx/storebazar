@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
<style>
    #user-management-table tbody tr {
        border-bottom-color: #eee !important;
    }
</style>
<div class="row mt-4 mx-4">
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


        <div class="card mb-4">
            @if(Session::has('success'))
                <div class="m-3  alert alert-success text-center alert-dismissible fade show" id="alert-success" role="alert">
                    <span class="alert-text text-white">
                        {{ Session::get('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                </div>
            @endif
            <div class="card-body pb-2 pt-5">
                <div class="table-responsive">
                    <table class="table table-sm align-items-center mb-4 mt-4" id="user-management-table">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User Type
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Create Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($userLists as $userList)
                                @if($userList->user_type=="customer" && $userList->customerDetails)
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div>
                                                    <img src="./img/demoUser.png" class="avatar me-3" alt="image">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $userList->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold mb-0">{{ $userList->mobile }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-danger">{{ "Customer" }}</span>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ ucfirst($userList->customerDetails->status) }}</p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ date('j M, Y', strtotime($userList->created_at)) }}</p>
                                        </td>
                                        
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a href="{{ route('user.edit', ['id' => $userList->id,'type'=>'customer']) }}" class="text-sm font-weight-bold mb-0">Edit</a>
                                                <a href="#" userType="customer" userid='{{ $userList->id }}' class="text-sm font-weight-bold mb-0 ps-2 user_delete">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @if($userList->sellerDetails)
                                        <tr>
                                            <td>#</td>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div>
                                                        <img src="./img/demoUser.png" class="avatar me-3" alt="image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $userList->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-bold mb-0">{{ $userList->mobile }}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-sm bg-gradient-danger">{{ 'Seller' }}</span>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ ucfirst($userList->sellerDetails->status) }}</p>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0">{{ date('j M, Y', strtotime($userList->updated_at)) }}</p>
                                            </td>
                                            
                                            <td class="align-middle text-end">
                                                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                    <a href="{{ route('user.edit', ['id' => $userList->id,'type'=>'seller']) }}" class="text-sm font-weight-bold mb-0">Edit</a>
                                                    <a href="#" userType="seller" userid='{{ $userList->id }}' class="text-sm font-weight-bold mb-0 ps-2 user_delete">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endif

                                @if($userList->user_type=="seller" && $userList->sellerDetails)
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div>
                                                    <img src="./img/demoUser.png" class="avatar me-3" alt="image">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $userList->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold mb-0">{{ $userList->mobile }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-danger">{{ 'Seller' }}</span>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ ucfirst($userList->sellerDetails->status) }}</p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ date('j M, Y', strtotime($userList->updated_at)) }}</p>
                                        </td>
                                        
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a href="{{ route('user.edit', ['id' => $userList->id,'type'=>'seller']) }}" class="text-sm font-weight-bold mb-0">Edit</a>
                                                <a href="#" userType="seller" userid='{{ $userList->id }}' class="text-sm font-weight-bold mb-0 ps-2 user_delete">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                                @if($userList->user_type=="admin")
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="./img/demoUser.png" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $userList->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-sm font-weight-bold mb-0">{{ $userList->mobile }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-sm bg-gradient-danger">{{ ucfirst($userList->user_type) }}</span>
                                    </td>

                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ "N/A" }}</p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ date('j M, Y', strtotime($userList->created_at)) }}</p>
                                    </td>
                                    
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <a href="{{ route('user.edit', ['id' => $userList->id]) }}" class="text-sm font-weight-bold mb-0">Edit</a>
                                            <a href="#" userid='{{ $userList->id }}' class="text-sm font-weight-bold mb-0 ps-2 user_delete">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @empty
                            <div class="text-center">
                                <p style="padding-top: 30px;">কোন User পাওয়া যাই নাই |</p>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Pagination --}}
    {{--<div class="d-flex justify-content-end">
        {!! $userLists->links() !!}
    </div>--}}
</div>
@include('layouts.footers.auth.footer')
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $("#user-management-table").DataTable({
            responsive: true,
            pageLength: 10,
            paging: true,
            searching: true,
            ordering : true,
            order: [
                [0, "desc"]
            ],
            dom: 'lfrtip',
            'columnDefs' : [
                //hide the second & fourth column
                { 'visible': false, 'targets': [0] }
            ]
        })


        $(document).on("click", ".user_delete", function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Confirmation !',
                html: 'Do you want to delete the user',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {

                    let userid = $(this).attr('userid')
                    let userType = $(this).attr('userType')

                    $.ajax({
                        url: '{{ route("user.delete") }}',
                        type: 'POST',
                        data: {
                            id: userid,
                            userType:userType
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {

                            if (response.error) {
                                Swal.fire("Error", response.message, 'error');
                            } else {

                                Swal.fire('Congratulations', response.message, 'success').then((result) => {
                                    // var redirectUrl = '{{ route("customer.profile") }}' + '/products';
                                    window.location.href = '/user-management';

                                })
                            }
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        })
    });
</script>

@endpush