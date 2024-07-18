<style>
    .custom-dropdown ul li {
        padding: 10px 20px;
    }
</style>
<div class="col-lg-2">  
    <div class="header-right d-flex"> 
        @if (auth()->check())
        @if (auth()->user()->customerDetails()->exists() || auth()->user()->sellerDetails()->exists())
        <div class="dropdown notification custom-dropdown"> 
            <button type="button" class="btn" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- <i class="fi flaticon-user"></i> --> 
                <img src="{{ asset('assets/revamp/images/bell.svg') }}" alt="" width="23px" class="bell-icon">  
                <span class="notification-count">{{ $notifications->count() }}</span>
            </button>  
            <ul class="dropdown-menu dropdown-menu-end my-0 py-0" aria-labelledby="dropdownMenuLink2">    

                <li class="border-bottom-dashed">
                    <h5 class="mb-0 text-dark fw-bold text-center"> বিজ্ঞপ্তি </h6> 
                </li> 
                @forelse($notifications as $notification)
                <li class="d-flex align-items-baseline">  
                    <img src="{{ asset('assets/revamp/images/check.svg') }}" alt="" width="16px" class="me-2 status-icon">   
                    <a class="viewNotifications" nid="{{ $notification->id }}" url="{{ $notification->redirect_url }}" href="#"> 
                    {{ $notification->message }}
                    </a> 
                </li>
                @empty
                <li><div class="p-4 text-center">কোন নতুন বিজ্ঞপ্তি নেই</div></li>
                @endforelse  
            </ul> 
        </div>  
        @endif
        @endif

        <div class="dropdown custom-dropdown"> 
            <button class="btn" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fi flaticon-user"></i>
            </button> 

            @if (auth()->check())
            @if (auth()->user()->user_type == 'admin')
                <ul class="dropdown-menu dropdown-menu-end my-0 py-0" aria-labelledby="dropdownMenuLink1">
                    <li><a href="#." data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                    <!-- <li><a href="register.html">Register</a></li> -->
                </ul>
            @endif
            @endif

            @guest
                <ul class="dropdown-menu dropdown-menu-end my-0 py-0" aria-labelledby="dropdownMenuLink1">
                    <li><a href="#." data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                    <!-- <li><a href="register.html">Register</a></li> -->
                </ul>
            @endguest

            @if (auth()->check())
            @if (auth()->user()->customerDetails()->exists() || auth()->user()->sellerDetails()->exists())
            <ul class="dropdown-menu dropdown-menu-end my-0 py-0" aria-labelledby="dropdownMenuLink1">
                <li class="border-bottom pb-2">
                    <div class="profile-name py-2">
                        <p class="text-muted mb-0"> স্বাগতম !</p>
                        <h6 class="mb-0 font-weight-medium" style="color:#434e6e"> {{ auth()->user()->name }} </h6>
                    </div>
                </li>
                <li><a href="{{route('customer.profile')}}">প্রোফাইল</a></li>
                <li><a href="{{ route('customer.profile',['parameters'=>'credentials']) }}">পাসওয়ার্ড পরিবর্তন</a></li>
                @if ( auth()->user()->sellerDetails()->doesntExist())
                <li><a href="{{ route('beSeller') }}">সেলার হিসেবে রেজিস্ট্রেশন</a></li>
                @endif
                <li><a href="{{ route('customer.logout') }}">লগ আউট</a></li>
            </ul>
            
            @endif
            @endif
        </div>   

    </div>

</div>

<script>
    jQuery(document).ready(function($) {
        $(document).on('click','.viewNotifications', function() {
            var redirectUrl = $(this).attr('url')
            var nid = $(this).attr('nid')

            $.ajax({
                type: 'POST',
                url: '{{ route("user-notification-view") }}',
                data: { redirectUrl:redirectUrl,nid:nid },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    window.location.href = redirectUrl;
                }
            })
        })
        
    })
</script>