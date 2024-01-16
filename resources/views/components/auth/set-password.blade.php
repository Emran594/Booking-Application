<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <h5 class="text-primary">Create new password</h5>
        <p class="text-muted">Your new password must be different from previous used password.</p>

        <div class="p-2">
            <form action="{{ url('/reset-password') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="password-input">Password</label>
                    <div class="position-relative ">
                        <input type="password" class="form-control pe-5 password-input" name="password" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="confirm-password-input">Confirm Password</label>
                    <div class="position-relative  mb-3">
                        <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Confirm password" id="confirm-password-input" required>
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                </div>

                <div class="mt-4">
                    <button class="btn btn-success w-100" type="submit">Reset Password</button>
                </div>

            </form>
        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">Wait, I remember my password... <a href="auth-signin-cover.html" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
        </div>
    </div>
</div>
