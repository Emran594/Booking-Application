<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <div>
            <h5 class="text-primary">Welcome Back !</h5>
            <p class="text-muted">Sign in to continue to Bookie.</p>
        </div>

        <div class="mt-4">
            <form action="{{ url("/user-login") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter username">
                </div>

                <div class="mb-3">
                    <div class="float-end">
                        <a href="{{ url('/forgot-pass') }}" class="text-muted">Forgot password?</a>
                    </div>
                    <label class="form-label" for="password">Password</label>
                    <label for="password" class="form-label">Email</label>
                    <input type="password" class="form-control" id="email" name="password" placeholder="Enter Password">
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
