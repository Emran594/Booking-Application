<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <div class="mb-4">
            <div class="avatar-lg mx-auto">
                <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                    <i class="ri-mail-line"></i>
                </div>
            </div>
        </div>
        <div class="text-muted text-center mx-lg-3">
            <h4 class="">Verify Your Email</h4>
            <p>Please enter the 4 digit code sent to <span class="fw-semibold">example@abc.com</span></p>
        </div>

        <div class="mt-4">
            <form autocomplete="off" action="{{ url('/verify-otp') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit1-input" class="visually-hidden">Digit 1</label>
                            <input type="text" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(1, event)" maxLength="1" id="digit1-input">
                        </div>
                    </div><!-- end col -->
                
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit2-input" class="visually-hidden">Digit 2</label>
                            <input type="text" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(2, event)" maxLength="1" id="digit2-input">
                        </div>
                    </div><!-- end col -->
                
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit3-input" class="visually-hidden">Digit 3</label>
                            <input type="text" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(3, event)" maxLength="1" id="digit3-input">
                        </div>
                    </div><!-- end col -->
                
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit4-input" class="visually-hidden">Digit 4</label>
                            <input type="text" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(4, event)" maxLength="1" id="digit4-input">
                        </div>
                    </div><!-- end col -->
                </div>

                <div class="mt-3">
                    <button type="button" class="btn btn-success w-100">Confirm</button>
                </div>

            </form>

        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">Didn't receive a code ? <a href="{{ url('/forgot-pass') }}" class="fw-semibold text-primary text-decoration-underline">Resend</a> </p>
        </div>
    </div>
</div>