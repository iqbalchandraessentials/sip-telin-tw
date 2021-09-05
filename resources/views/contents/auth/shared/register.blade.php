<div class="login-form login-signup">
    {{-- begin::Form --}}
    <form class="form" novalidate="novalidate" id="kt_login_signup_form" method="POST"
        action="{{ route('auth.register') }}">
        @csrf
        {{-- begin::Title --}}
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
            <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your
                account</p>
        </div>
        {{-- end::Title --}}
        {{-- begin::Form group --}}
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email"
                placeholder="Email" name="email" id="email" autocomplete="off" />
        </div>
        {{-- end::Form group --}}
        {{-- begin::Form group --}}
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="text"
                placeholder="Full Name" name="nama" id="nama" autocomplete="off" />
        </div>
        {{-- end::Form group --}}
        {{-- begin::Form group --}}
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="text"
                placeholder="Username" name="username" id="username" autocomplete="off" />
        </div>
        {{-- end::Form group --}}
        {{-- begin::Form group --}}
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password"
                placeholder="Password" name="password" id="password" autocomplete="off" />
        </div>
        {{-- end::Form group --}}
        {{-- begin::Form group --}}
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password"
                placeholder="Confirm password" name="password2" id="password2" autocomplete="off" />
        </div>
        {{-- end::Form group --}}
        {{-- begin::Form group --}}
        <div class="form-group">
            <label class="checkbox mb-0">
                <input type="checkbox" name="agree" />
                <span></span>
                <div class="ml-2">I Agree the
                    <a href="#">terms and conditions</a>.
                </div>
            </label>
        </div>
        {{-- end::Form group --}}
        {{-- begin::Form group --}}
        <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
            <button type="submit" id="kt_login_signup_submit"
                class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
            <button type="button" id="kt_login_signup_cancel"
                class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
        </div>
        {{-- end::Form group --}}
    </form>
    {{-- end::Form --}}
</div>
