@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Attribute List'])
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
                    <h6>Attribute List</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Attribute Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Code</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Type</th>

                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($attributeList as $atttribute)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$atttribute->attributeLabel[0]->label ?? 'N/A'}}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$atttribute->code ?? 'N/A'}}</p>

                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">{{$atttribute->type ?? 'N/A'}}</span>
                                    </td>


                                    <td class="text-center">
                                        <a href="{{route('attribute.edit',$atttribute->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Attribute">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>

                                            <a attrId={{$atttribute->id}} href="{{route('attribute.delete',$atttribute->id)}}" class="mx-3 del" data-bs-toggle="tooltip" data-bs-original-title="Delete Attribute">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <div class="text-center">
                                    <p style="padding-top: 30px;">কোন Attribute পাওয়া যাই নাই |</p>
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
        {!! $attributeList->links() !!}
    </div>

    @include('layouts.footers.auth.footer')
</div>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>



<script>
    $(document).ready(function() {
        $(".del").click(function() {
            let attributeID = $(this).attr('attrId')
            event.preventDefault();
            Swal.fire({
                title: 'Confirmation !',
                html: 'Do you want to delete the attribute?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {

                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = "/attribute-delete/" + attributeID;
                } else {
                    return false;
                }
            })
        });


    })
</script>


@endsection