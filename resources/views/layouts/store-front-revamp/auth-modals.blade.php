@include('layouts.partial._ajax_form_submit')
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                    class="fi flaticon-cancel"></i></button>
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

<div class="modal fade modal-center popup-modal" id="regModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div id="xlogin">
                    <form action="{{route('customer.store')}}" id="regForm" method="post" class="form-horizontal">
                        @csrf
                        <div class="col-xs-12 text-center mb-3 border-bottom">
                            <h3 class="mb-0"> রেজিস্ট্রেশন </h3>
                            <p class="mb-2"> রেজিস্ট্রেশন করুন এখনই! </p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fi flaticon-cancel"></i></button>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"> <i class="bx bx-user fa-fw"></i> <span class="text-danger">*</span> </span>
                                    <input type="text" name="name" class="form-control" placeholder="পুরো নাম" aria-label="Username" aria-describedby="basic-addon3">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"> <i class="bx bx-phone fa-fw"></i> <span class="text-danger">*</span>  </span>
                                    <input type="text" name="mobile" class="form-control" placeholder="মোবাইল নং" aria-label="Username" aria-describedby="basic-addon4">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="bx bx-envelope"></i> <span class="text-danger">*</span>  </span>
                                    <input type="email" name="email" class="form-control" placeholder="ইমেইল এড্রেস" aria-label="email" aria-describedby="basic-addon5">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="bx bx-key"></i> <span class="text-danger">*</span>  </span>
                                    <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড" aria-label="password" aria-describedby="basic-addon6">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="bx bx-key"></i> <span class="text-danger">*</span>  </span>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="কনফার্ম পাসওয়ার্ড" aria-label="password" aria-describedby="basic-addon6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="bx bx-home"></i> <span class="text-danger">*</span>  </span>
                                    <textarea name="customer_address" class="form-control" placeholder="ঠিকানা" aria-label="ঠিকানা" aria-describedby="basic-addon6"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group formSubmit">
                            <div class="col-xs-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="agreement" name="agreement">
                                    <label class="form-check-label" for="agreement">
                                        <sup> <span class="text-danger">*</span> </sup>  আমি সব <a href="#."> শর্তাবলী </a> মেনে নিলাম 
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12 submitWrap d-grid">
                                <button id="register" type="submit" class="btn common-btn ">
                                    রেজিস্টার
                                    <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                    <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                </button>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group formNotice2">
                            <div class="col-xs-12">
                                <h6 class="text-center font-weight-normal"> একাউন্ট আছে?
                                    <span class="font-weight-bold" data-bs-dismiss="modal" data-bs-target="#loginModal" data-bs-toggle="modal"> লগইন করুন! </span>
                                </h6>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-center popup-modal" id="forgotModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div id="xlogin">
                    <div class="col-xs-12 text-center mb-3 border-bottom">
                        <h3 class="mb-0"> পাসওয়ার্ড রিসেট করুন </h3>
                        <!-- <p class="mb-2"> পাসওয়ার্ড রিসেট করতে আপনার ইমেইল এড্রেসটি লিখুন </p> -->
                        <p class="mb-2"> পাসওয়ার্ড রিসেট করতে আপনার ফোন নম্বর লিখুন </p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fi flaticon-cancel"></i></button>
                    </div>
                    <form action="" method="post" class="form-horizontal" id="forgotPassForm">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="bx bx-mobile"></i> </span>
                                    <input type="number" name="cus_phone" id="cus_phone" class="form-control" placeholder="ফোন নম্বর" aria-label="email" aria-describedby="basic-addon5">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 submitWrap d-grid">
                            <button id="submitForgotPassOtp" type="button" class="btn common-btn">
                                সাবমিট
                                <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                            </button>
                        </div>
                    </form>

                    <form action="#" id="submitOtpForm" style="display: none;">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="bx bx-mobile"></i> </span>
                                    <input type="number" name="ret_phone" id="ret_phone" class="form-control" placeholder="ফোন নম্বর" aria-label="email" aria-describedby="basic-addon5">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="fas fa-key"></i> </span>
                                    <input type="number" name="cus_otp" id="cus_otp" class="form-control" placeholder="Please put OTP here">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 submitWrap d-grid">
                            <button id="PostsubmitForgotPassOtp" type="button" class="btn common-btn">
                                সাবমিট
                                <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                            </button>
                        </div>
                    </form>
                    
                    <form action="#" id="submitResetPasswordForm" style="display: none;">
                        <div class="d-none box" box=""></div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="fas fa-key"></i> </span>
                                    <input type="password" name="reset_password" id="reset_password" class="form-control" placeholder="new password" aria-label="email" aria-describedby="basic-addon5">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"> <i class="fas fa-key"></i> </span>
                                    <input type="password" name="confirm_reset_password" id="confirm_reset_password" class="form-control" placeholder="Confirm New Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 submitWrap d-grid">
                            <button id="submitNewPassowrd" type="button" class="btn common-btn">
                                সাবমিট
                                <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                            </button>
                        </div>
                    </form>

                    <div class="resetPasswordLink">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $("#logForm").submit(function(e) {
        e.preventDefault();
        formPost('logForm', 'login', '{{ route("customer.login") }}', '{{ route("home") }}')
    });

    $("#regForm").submit(function(e) {
        e.preventDefault();
        formPost('regForm', 'register', '{{ route("customer.store") }}', '{{ route("home") }}');
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

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function siteUrlJs(url_portion) {
        return '<?php echo e(url('/')); ?>' + '/' + url_portion;
    }
    feather.replace()

    /**
     * @param   errors    validation error data from ajax request, array
     * @return            returns error listing, string
     */
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