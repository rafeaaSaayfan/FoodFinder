@extends('layouts.auth.main')

@section('content')
<div class="flex items-center justify-center bg-pr" style="min-height: 100vh">
    <div class="w-1/2 bg-sec rounded-3xl shadow-xl px-8 pt-5 pb-8">
        <h3 class="text-qua mb-8 font-medium">{{ __('Verify Your Email Address') }}</h3>
        <div class="text-center">
            <div class="flex justify-center mb-5">
                <img src="{{ asset('images/logo/logo.png') }}" alt="" class="w-64">
            </div>
            <div>
                <p class="text-qua mb-2 opacity-80">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p class="text-qua mb-2 opacity-80">{{ __('If you did not receive the email') }}</p>
                <form class="mb-3" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="bg-ter py-2 px-3 rounded-3xl text-qua hover:bg-orange-700">{{ __('click here to request another') }}</button>
                </form>
                @if (session('resent'))
                  <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        color: "#fff",
                        background: "#48bb78",
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "{{ __('A fresh verification link has been sent to your email address.') }}"
                    });
                  </script>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
