<div class="modal fade modal-center popup-modal" id="regModal" tabindex="-1" aria-hidden="true" style="overflow-y:scroll">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div id="xlogin">
                    <form action="{{route('customer.store')}}" id="regForm" method="post" class="form-horizontal">
                        @csrf
                        <div class="col-xs-12 text-center mb-3 border-bottom">
                            <h3 class="mb-0"> রেজিস্ট্রেশন </h3>
                            <p class="mb-2"> রেজিস্ট্রেশন করুন এখনই! </p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
@include('layouts.partial._js')
@push('js')
@include('layouts.partial._ajax_form_submit')

<script>
    $("#regForm").submit(function(e) {
        e.preventDefault();
        formPost('regForm', 'register', '{{ route("customer.store") }}', '{{ route("home") }}');
    });
</script>
@endpush