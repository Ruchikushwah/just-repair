@extends('layout')
@section('content')

<div class="relative w-[900px] h-[550px] mx-auto mt-10 bg-white rounded-[20px] shadow-[_-10px_-10px_15px_rgba(255,255,255,0.3),_10px_10px_15px_rgba(70,70,70,0.15),_inset_-10px_-10px_15px_rgba(255,255,255,0.3),_inset_10px_10px_15px_rgba(70,70,70,0.15)] overflow-hidden">
    <!-- Sub Container -->
    <div class="absolute left-[640px] top-0 w-[900px] h-full pl-[260px] bg-white transition-transform duration-[1.2s] ease-in-out">
        <!-- Image Section -->
        <div class="absolute left-0 top-0 w-[260px] h-full pt-[360px] overflow-hidden z-[2]">
            <div class="absolute left-0 top-[50px] w-full px-[20px] text-center text-white transition-transform duration-[1.2s] ease-in-out">
                <h3 class="font-normal">Don't have an account? Please Sign up!</h3>
            </div>
            <div class="absolute left-0 top-[50px] w-full px-[20px] text-center text-white transition-transform duration-[1.2s] ease-in-out transform translate-x-[-520px]">
                <h3 class="font-normal">If you already have an account, just sign in.</h3>
            </div>
            <div class=" relative w-[100px] h-[36px] mx-auto bg-transparent text-white uppercase text-[15px] cursor-pointer">
                <span class="absolute left-0 top-0 w-full h-full flex justify-center items-center transition-transform duration-[1.2s]">Sign Up</span>
                <span class="absolute left-0 top-0 w-full h-full flex justify-center items-center transition-transform duration-[1.2s] transform translate-y-[-72px]">Sign In</span>
            </div>
            <div class="absolute right-0 top-0 w-[900px] h-full bg-[url('ext.jpg')] opacity-80 bg-cover transition-transform duration-[1.2s] ease-in-out"></div>
            <div class="absolute left-0 top-0 w-full h-full bg-[rgba(0,0,0,0.6)]"></div>
        </div>

        <!-- Sign Up Form -->
        <div class="form sign-up absolute w-[640px] h-full transition-transform duration-[1.2s] ease-in-out p-[50px_30px_0] transform translate-x-[-900px]">
            <h2 class="w-full text-[26px] text-center">Create your Account</h2>
            <label class="block w-[260px] mx-auto mt-[25px] text-center">
                <span class="text-[12px] text-[#cfcfcf] uppercase">Name</span>
                <input type="text" class="block w-full mt-[5px] pb-[5px] text-[16px] border-b border-[rgba(0,0,0,0.4)] text-center outline-none bg-transparent" />
            </label>
            <label class="block w-[260px] mx-auto mt-[25px] text-center">
                <span class="text-[12px] text-[#cfcfcf] uppercase">Email</span>
                <input type="email" class="block w-full mt-[5px] pb-[5px] text-[16px] border-b border-[rgba(0,0,0,0.4)] text-center outline-none bg-transparent" />
            </label>
            <label class="block w-[260px] mx-auto mt-[25px] text-center">
                <span class="text-[12px] text-[#cfcfcf] uppercase">Password</span>
                <input type="password" class="block w-full mt-[5px] pb-[5px] text-[16px] border-b border-[rgba(0,0,0,0.4)] text-center outline-none bg-transparent" />
            </label>
            <button type="button" class="submit block mx-auto w-[260px] h-[36px] rounded-[30px] bg-[#d4af7a] text-white text-[15px] uppercase cursor-pointer mt-[40px] mb-[20px]">Sign Up</button>
        </div>
    </div>
</div>

<script>
    document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
    });
</script>

@endsection