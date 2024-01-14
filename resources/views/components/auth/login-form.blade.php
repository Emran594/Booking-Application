<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <div>
            <h5 class="text-primary">Welcome Back !</h5>
            <p class="text-muted">Sign in to continue to Velzon.</p>
        </div>

        <div class="mt-4">
            <form action="">

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                </div>

                <div class="mb-3">
                    <div class="float-end">
                        <a href="auth-pass-reset-cover.html" class="text-muted">Forgot password?</a>
                    </div>
                    <label class="form-label" for="password-input">Password</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                </div>

                <div class="mt-4">
                    <button class="btn btn-success w-100" type="submit">Sign In</button>
                </div>

            </form>
        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">Don't have an account ? <a href="{{ url('/userRegistration') }}" class="fw-semibold text-primary text-decoration-underline"> Signup</a> </p>
        </div>
    </div>
</div>