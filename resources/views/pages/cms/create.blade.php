@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Create Content'])
<style>
.note-editor {
    border-radius: 0;
}
.note-editor .note-toolbar, .note-popover .popover-content {
    padding: 10px 0 0px 20px !important;
}
</style>


<div class="row mt-4 mx-4">
    <div class="col-12">

        <div class="card mb-4">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" method="POST" action="{{ route('cms.create') }}" id="cmsCreate" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header pb-0">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Content Create</p>
                                        <button type="submit" id="cms-create" class="btn btn-primary btn-sm ms-auto">Save</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-uppercase text-sm">Content Information</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Title <span class="text-danger">*</span></label>
                                                <input id="title" class="form-control" type="text" name="title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Slug <span class="text-danger">*</span></label>
                                                <input id="slug" class="form-control" type="text" name="slug" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Content <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="content" id="content" cols="30" rows="3"></textarea>
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
        $("#title").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp, '-');
            $("#slug").val(Text);
        });


        $("#cmsCreate").submit(function(e) {
            e.preventDefault();
            formPost('cmsCreate', 'cms-create', '{{ route("cms.create") }}', '{{ route("page", ["page" => "cms-list"]) }}')
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

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#content').summernote({
        height: 400
    });
</script>

@endsection