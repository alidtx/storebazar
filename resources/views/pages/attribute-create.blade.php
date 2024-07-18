@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Create Attribute'])
<div class="row mt-4 mx-4">
    <div class="col-12">

        <div class="card mb-4">


            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" method="POST" action="{{ route('attribute.create') }}" id="attributeCreate" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header pb-0">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Attribute Create</p>
                                        <button type="submit" id="attribute-create" class="btn btn-primary btn-sm ms-auto">Save</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-uppercase text-sm">Attribute Information</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Attribute Name</label>
                                                <input id="attribute_name" class="form-control" type="text" name="label">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Attribute Code</label>
                                                <input id="attribute_code" class="form-control" type="text" name="code">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Attribute Type</label>
                                                <select name="type" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                    <option disabled>Select Type</option>
                                                    <option value="text" selected>Text</option>
                                                    <!-- <option value="number" disabled>Number</option>
                                                    <option value="radio" disabled>Radio</option>
                                                    <option value="check-box" disabled>Check Box</option>
                                                    <option value="select" disabled>Select</option>
                                                    <option value="multi-select" disabled>Multi Select</option> -->
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- <hr class="horizontal dark"> -->

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                @include('layouts.footers.auth.footer')
            </div>

        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

@include('layouts.partial._ajax_form_submit')

<script>
    $(document).ready(function() {
        $("#attribute_name").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp, '-');
            $("#attribute_code").val(Text);
        });


        $("#attributeCreate").submit(function(e) {
            e.preventDefault();
            formPost('attributeCreate', 'attribute-create', '{{ route("attribute.create") }}', '{{ route("page", ["page" => "attribute-list"]) }}')
        });

    })

    function getErrorHtml($errors) {
        var errorsHtml = '';
        $.each($errors, function(key, value) {

            if (value.constructor === Array) {
                $.each(value, function(i, v) {

                    $("#id_" + key).show().html(v);
                    errorsHtml += '<li>' + v + '</li>';
                });
            } else {
                errorsHtml += '<li>' + value[0] + '</li>';
            }
        });
        return errorsHtml
    }
</script>

@endsection