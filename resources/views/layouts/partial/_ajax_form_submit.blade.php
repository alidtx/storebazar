<script>
    /** 
     * This method for submiting a form. First Include the file in push(js) from blade. then call the function with params.
     * @param   formId              main form element ID
     * @param   submitButtonId      submit button element ID
     * @param   postUrl             submit URL(post type) 
     * @param   redirectUrl         after success redirect to the url (get type)
     **/
    var registration_url = "{{ route('customer.store') }}";
    var seller_registration_url = "{{ route('seller.store') }}";

    var authCheck = "{{ optional(auth()->user())->id }}";
    console.log('auth', authCheck);

    function formPost(formId, submitButtonId, postUrl, redirectUrl) {
        formId = "#" + formId;
        submitButtonId = "#" + submitButtonId;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var form = $(formId);

        var submitButton = $(formId + " input[type=submit]");
        Pace.restart();
        Pace.track(function() {
            $.ajax({
                url: postUrl,
                type: "POST",
                data: new FormData(form[0]),
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function() {
                    // set  loading text in submitButtonId
                    $(submitButtonId).html('<i class="fa fa-spinner fa-spin"></i>');
                    $(submitButtonId).prop('disabled', true);
                },
                success: function(data) {
                    $(submitButtonId).html('Submit');

                    if (data.code == 200) {
                        if (postUrl == registration_url) {
                            //   show message in sweetalert2 
                            $("#regModal").modal('hide');
                            Swal.fire({
                                title: '<strong style="color:#ff6701">Congratulation</strong>',
                                html: data.message,
                                type: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                // $("#loginModal").modal('show');
                                window.location.href = '{{ url("") }}';

                            })
                        } else if (postUrl == seller_registration_url) {
                            //   show message in sweetalert2 
                            Swal.fire({
                                title: '<strong style="color:#ff6701">Congratulation</strong>',
                                html: data.message,
                                type: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (authCheck) {
                                    if (result.value) {
                                        window.location.href = redirectUrl;
                                    }
                                } else {
                                    // $("#loginModal").modal('show');
                                    window.location.href = '{{ url("") }}';
                                }

                            })
                        } else {


                            $.toast({
                                heading: 'Success',
                                text: data.message,
                                position: 'top-right',
                                stack: false,
                                showHideTransition: 'fade',
                                icon: 'success',
                                hideAfter: 5000
                            });
                            window.setTimeout(function() {
                                window.location.href = redirectUrl;
                            }, 1000);
                        }

                    } else if (data.code == 422) {
                        $.toast({
                            heading: data.message,
                            text: getErrorHtml(data.errors),
                            position: 'top-right',
                            stack: false,
                            showHideTransition: 'fade',
                            icon: 'error',
                            hideAfter: 10000,
                        });
                    } else if (data.code == 404) {
                        $.toast({
                            heading: 'Error',
                            text: data.message,
                            position: 'top-right',
                            stack: false,
                            showHideTransition: 'fade',
                            icon: 'error',
                            hideAfter: 10000,
                        });
                    } else {
                        $.toast({
                            heading: 'Error',
                            text: data.message,
                            position: 'top-right',
                            stack: false,
                            showHideTransition: 'fade',
                            icon: 'error',
                            hideAfter: 5000
                        });
                    }
                },
                complete: function(data) {
                    $(submitButtonId).prop('disabled', false);
                }

            });

        });



    }
</script>