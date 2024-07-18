@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Content Management'])
<style>
    #cms-list-table tbody tr {
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
                    <table class="table align-items-center mb-0" id="cms-list-table">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Slug</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Create Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cmsList as $cms)
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <div class="d-flex py-1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $cms->cmsDetails[0]->title ?? 'N/A' }}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $cms->slug ?? 'N/A'}}</p>

                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ date('j M, Y', strtotime($cms->created_at)) }}</p>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="{{route('cms.edit',$cms->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Attribute">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>

                                            <a cmsId="{{$cms->id}}" href="{{route('cms.delete',$cms->id)}}" class="mx-3 del" data-bs-toggle="tooltip" data-bs-original-title="Delete Attribute">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                            @empty
                            <div class="text-center">
                                <p style="padding-top: 30px;">কোন Content পাওয়া যাই নাই |</p>
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
        {!! $cmsList->links() !!}
    </div>--}}
</div>
@include('layouts.footers.auth.footer')
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $("#cms-list-table").DataTable({
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


        $(".del").click(function() {
            let cmsID = $(this).attr('cmsId')
            event.preventDefault();
            Swal.fire({
                title: 'Confirmation !',
                html: 'Do you want to delete the Cms?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {

                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = "/cms-delete/" + cmsID;
                } else {
                    return false;
                }
            })
        });
    });
</script>

@endpush