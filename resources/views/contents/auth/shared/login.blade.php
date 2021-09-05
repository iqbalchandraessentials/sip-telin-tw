<div class="login-form login-signin">
    {{-- begin::Form --}}
    <form role="form" id="kt_login_signin_form" method="POST" action="{{ route('auth.login') }}"
        enctype="multipart/form-data">
        @csrf
        {{-- begin::Title --}}
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">
                Welcome to SIP Telkom Taiwan
            </h3>
            {{-- <span class="text-muted font-weight-bold font-size-h4">
                New Here?
                <a href="javascript:;" id="kt_login_signup" class="text-primary font-weight-bolder">
                    Create an Account
                </a>
            </span> --}}
        </div>
        {{-- begin::Title --}}
        {{-- begin::Form group --}}
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">Username</label>
            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="username"
                autocomplete="off" />
        </div>
        {{-- end::Form group --}}
        {{-- begin::Form group --}}
        <div class="form-group">
            <div class="d-flex justify-content-between mt-n5">
                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                {{-- <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5"
                    id="kt_login_forgot">Forgot Password ?</a> --}}
            </div>
            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="password"
                autocomplete="off" />
        </div>
        {{-- end::Form group --}}
        {{-- begin::Action --}}
        <div class="pb-lg-0 pb-5">
            <button id="kt_login_signin_submit" type="submit"
                class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                Sign In
            </button>
        </div>
        {{-- end::Action --}}
    </form>
    {{-- end::Form --}}
</div>
