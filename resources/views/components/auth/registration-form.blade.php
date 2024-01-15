<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <div>
            <h5 class="text-primary">Register Account</h5>
            <p class="text-muted">Get your Booking account now.</p>
        </div>

        <div class="mt-4">
            <form class="needs-validation" novalidate action="{{ url('/user-registration') }}" method="POST">
                @csrf


                <div class="mb-3">
                    <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter username" required>
                    <div class="invalid-feedback">
                        Please enter Your First Name
                    </div>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Your Last Name" required>
                    <div class="invalid-feedback">
                        Please enter Your Last Name
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Phone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Phone" required>
                    <div class="invalid-feedback">
                        Please enter Your Phone
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Enter Your Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Last Name" required>
                    <div class="invalid-feedback">
                        Please enter Email
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Enter Your Email <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Last Name" required>
                    <div class="invalid-feedback">
                        Please enter Password
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label" for="password-input">Select User Type</label>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Select User Type </option>
                        <option value="1">User</option>
                        <option value="2">Admin</option>
                    </select>
                </div> --}}
                <div class="mb-4">
                    <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the Velzon <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                </div>

                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                    <h5 class="fs-13 fw-semibold">Password must contain:</h5>
                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                    <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                </div>

                <div class="mt-4">
                    <button class="btn btn-success w-100" type="submit">Sign Up</button>
                </div>
            </form>
        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">Already have an account ? <a href="{{ '/' }}" class="fw-semibold text-primary text-decoration-underline"> Signin</a> </p>
        </div>
    </div>
</div>
