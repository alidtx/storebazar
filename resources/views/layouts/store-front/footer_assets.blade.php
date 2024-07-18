@stack('js')




<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('assets/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-modal-video.min.js') }}"></script>
<script src="{{ asset('assets/js/thumb-slide.js') }}"></script>
<script src="{{ asset('assets/js/sweet-alert.min.js') }}"></script>

<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="{{ asset('assets/js/sweet-alert.min.js') }}"></script>
<!-- Taost -->
<script src="{{ asset('assets/libs/toast/jquery.toast.min.js') }}"></script>
<!-- SweetAlert -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- pace js -->
<script src="{{ asset('assets/libs/pace-js/pace.min.js') }}"></script>
<!-- datepicker js -->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<!-- select2 js -->
<script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>



<script>
    // if(min1 != 'undefined') min1 = min1;
    // else var min1 = 130;
    // if(max1 != 'undefined') min1 = min1;
    // else  var max1 = 1500;
    // if(min2 != 'undefined') min2 = min2;
    // else var min2 = 130;
    // if(max2 != 'undefined') max2 = max2;
    // else var max2 = 1500;


    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 130,
            max: 1500,
            values: [130, 550],
            slide: function(event, ui) {
                $("#amount").val("gm " + ui.values[0] + " - gm " + ui.values[1]);
            }
        });
        $("#amount").val("gm " + $("#slider-range").slider("values", 0) +
            " - gm " + $("#slider-range").slider("values", 1));

        $("#slider-range2").slider({
            range: true,
            min: 130,
            max: 1500,
            values: [130, 550],
            slide: function(event, ui) {
                $("#amount2").val("tk " + ui.values[0] + " - tk " + ui.values[1]);
            }
        });
        $("#amount2").val("tk " + $("#slider-range2").slider("values", 0) +
            " - tk " + $("#slider-range2").slider("values", 1));
    });
</script>


<!-- <script type="text/javascript">
    document.getElementById('b3').onclick = function() {
        swal({
                title: "Order Confirmation",
                text: "Do you want to confirm this order under price 2000tk?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, Confirm Order!',
                closeOnConfirm: false,
                //closeOnCancel: false
            },
            function() {
                swal("Order Confirmed!", "Order has been confirmed!", "success");
            });
    };

    document.getElementById('b4').onclick = function() {
        swal({
                title: "Are you sure?",
                text: "This order will be canceled!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, Cancel Order!',
                closeOnConfirm: false,
                //closeOnCancel: false
            },
            function() {
                swal("Canceled!", "Order has been canceled!", "success");
            });
    };

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script> -->