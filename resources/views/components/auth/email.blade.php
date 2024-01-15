<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <h5 class="text-primary">Forgot Password?</h5>
        <p class="text-muted">Reset password with Bookie</p>

        <div class="mt-2 text-center">
            <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl">
            </lord-icon>
        </div>

        <div class="alert border-0 alert-warning text-center mb-2 mx-2" role="alert">
            Enter your email and you will get a 4 digit otp code for reset password
        </div>
        <div class="p-2">
            <form action="/send-otp" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address">
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-success w-100" type="submit">Request OTP</button>
                </div>
            </form><!-- end form -->
        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">Wait, I remember my password... <a href="{{ url('/') }}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
        </div>
    </div>
</div>