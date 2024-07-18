<div class="modal fade modal-center popup-modal" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div id="xlogin">
                    <form action="{{route('customer.login')}}" id="logForm" method="post" class="form-horizontal">
                        @csrf
                        <div class="col-xs-12 text-center mb-3 border-bottom">
                            <h3 class="mb-0">লগইন</h3>
                            <p class="mb-2"> পণ্য কিনতে লগইন করুন </p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"> <i class="bx bx-phone fa-fw"></i> </span>
                                    <input type="text" name="mobile" class="form-control" placeholder="মোবাইল নং" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="bx bx-key fa-fw"></i> </span>
                                    <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড লিখুন" aria-label="পাসওয়ার্ড" aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 mb-3 text-end formNotice">
                                <div class="forgot-pass forgotPass">
                                    <span>
                                    পাসওয়ার্ড ভুলে গেছেন?
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-12 submitWrap d-grid">
                                <button id="login" type="submit" class="btn common-btn">
                                    লগইন
                                    <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                    <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                </button>
                                <!-- <input  name="submit" class="btn btn-primary btn-lg" type="submit"
                                        value="Login Now!" /> -->
                            </div>
                        </div>

                        <hr>

                        <div class="form-group formNotice">
                            <div class="col-xs-12 pt-3">
                                <h6 class="text-center font-weight-normal"> একাউন্ট নেই?
                                    {{--<span class="font-weight-bold" data-bs-dismiss="modal" data-bs-target="#regModal" data-bs-toggle="modal"> রেজিস্ট্রেশন করুন এখনই!</span>
                                    <div class="dropdown">--}}
                                <a class="join dropdown-toggle prev" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{--<i class="flaticon-round-account-button-with-user-inside"></i>--}}
                                    রেজিস্ট্রেশন করুন এখনই!
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                    

                                    <li>
                                        <a class="dropdown-item text-dark small" href="" data-bs-dismiss="modal" data-bs-target="#regModal" data-bs-toggle="modal">
                                            কাস্টমার হিসেবে রেজিস্ট্রেশন
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item text-dark small" href="{{route('beSeller')}}">
                                            সেলার হিসেবে রেজিস্ট্রেশন
                                        </a>
                                    </li>
                                </ul>
                            </div>
                                </h6>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

@include('layouts.partial._js')

@include('layouts.partial._ajax_form_submit')

<script>
    $("#logForm").submit(function(e) {
        e.preventDefault();
        formPost('logForm', 'login', '{{ route("customer.login") }}', '{{ route("home") }}')
    });

    $(document).ready(function() {
        $(document).on('click', '.forgotPass', function(event) {
            event.preventDefault()
            $("#loginModal").modal('hide')
            $('#forgotModal').modal('show')
        })

        $(document).on('click', '#forgotModal .btn-close', function(event) {
            event.preventDefault()
            $("#loginModal").modal('show')
        })

        // $(document).on('click', '#regModal .btn-close', function(event) {
        //     event.preventDefault()
        //     location.reload();
        // })

        $('#regModal').on('hidden.bs.modal', function(){
            //remove the backdrop
            $('.modal-backdrop').remove();
        })



        $(document).on("click","#submitForgotPassOtp",function(event) {
            event.preventDefault()
            let phoneNumber = $("#forgotPassForm #cus_phone").val()
            if(phoneNumber=="" || typeof(phoneNumber)=="undefined") {
                $.toast({
                    heading: '',
                    text: 'Please provide your valid phone number',
                    position: 'top-right',
                    stack: false,
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 10000,
                });
            }

            $.ajax({
                url: '{{ route("forgot.password.otp") }}',
                data: {
                    phoneNumber: phoneNumber
                },
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.error) {
                        $.toast({
                            heading: '',
                            text: response.message,
                            position: 'top-right',
                            stack: false,
                            showHideTransition: 'fade',
                            icon: 'error',
                            hideAfter: 10000,
                        });
                    } else {
                        $("#forgotPassForm").remove();
                        $("#submitOtpForm").css('display','block')
                        $("#submitOtpForm #ret_phone").val(phoneNumber).prop('readonly', true);
                    }
                }
            });

        })

        $(document).on("click","#PostsubmitForgotPassOtp", function(event) {
            event.preventDefault()

            let phoneForOtp = $("#submitOtpForm #ret_phone").val()

            if(phoneForOtp=="" || typeof(phoneForOtp)=="undefined") {
                $.toast({
                    heading: '',
                    text: 'Phone number not found',
                    position: 'top-right',
                    stack: false,
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 10000,
                });
            }

            let validateOtp = $("#submitOtpForm #cus_otp").val();
            if(validateOtp=="" || typeof(validateOtp)=="undefined") {
                $.toast({
                    heading: '',
                    text: 'OTP is required',
                    position: 'top-right',
                    stack: false,
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 10000,
                });
            }

            $.ajax({
                url: '{{ route("forgot.password.otp.submit") }}',
                data: {
                    phoneNumber: phoneForOtp,
                    otp:validateOtp
                },
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.error) {
                        $.toast({
                            heading: '',
                            text: response.message,
                            position: 'top-right',
                            stack: false,
                            showHideTransition: 'fade',
                            icon: 'error',
                            hideAfter: 10000,
                        });
                    } else {
                        setTimeout(function() {
                            $("#submitOtpForm").remove()
                            $("#submitResetPasswordForm .box").attr("box",response.datatobeupdate)
                            $("#submitResetPasswordForm").css('display','block')    
                        },1000)

                    }
                }
            });
        })

        $(document).on("click","#submitNewPassowrd", function(event) {
            event.preventDefault()
            let phonenumber = $("#submitResetPasswordForm .box").attr('box')
            let password = $("#submitResetPasswordForm #reset_password").val()
            let confirm_password = $("#submitResetPasswordForm #confirm_reset_password").val()
            let passLen = password.length

            if(password=="") {
                $.toast({
                    heading: '',
                    text: 'New Password is required',
                    position: 'top-right',
                    stack: false,
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 10000,
                });
            }

            if(confirm_password=="") {
                $.toast({
                    heading: '',
                    text: 'Confirm Password is required',
                    position: 'top-right',
                    stack: false,
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 10000,
                });
            }

            if(passLen != 0 && passLen < 6) {
                $.toast({
                    heading: '',
                    text: 'Minimum 6 characters needed',
                    position: 'top-right',
                    stack: false,
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 10000,
                });
            }

            if(password != confirm_password) {
                $.toast({
                    heading: '',
                    text: 'Password does not matched',
                    position: 'top-right',
                    stack: false,
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 10000,
                });
            }

            $.ajax({
                url: '{{ route("reset.password.submit") }}',
                data: {
                    phone: phonenumber,
                    password:password,
                    confirmPassword:confirm_password
                },
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.error) {
                        $.toast({
                            heading: '',
                            text: response.message,
                            position: 'top-right',
                            stack: false,
                            showHideTransition: 'fade',
                            icon: 'error',
                            hideAfter: 10000,
                        });
                    } else {
                        $('#forgotModal').modal('hide')
                        Swal.fire('',response.message).then((result) => {
                            if(result.isConfirmed) {
                                $("#loginModal").modal('show')
                            }
                        });
                    }
                }
            });


        })
    })
</script>