<div class="modal fade modal-center popup-modal" id="forgotModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div id="xlogin">
                    <div class="col-xs-12 text-center mb-3 border-bottom">
                        <h3 class="mb-0"> পাসওয়ার্ড রিসেট করুন </h3>
                        <!-- <p class="mb-2"> পাসওয়ার্ড রিসেট করতে আপনার ইমেইল এড্রেসটি লিখুন </p> -->
                        <p class="mb-2"> পাসওয়ার্ড রিসেট করতে আপনার ফোন নম্বর লিখুন </p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

