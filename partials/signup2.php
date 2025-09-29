<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">
        Launch demo modal
    </button> -->

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <!-- <div class="modal-header card-theme second_box2">
                        <div class="d-flex align-items-center">
                            <h2 class="modal-title " id="loginLabel">SignUp Successfully...</h2>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                onclick="second_box()"></button>
                        </div>
                    </div> -->
            <div class="modal-header card-theme">

                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body card-theme">

                <form method="post">
                    <div class="mb-3 first_box2">
                        <label for="email1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-element" id="email1" aria-describedby="emailHelp"
                            placeholder="name@example.com">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        <span id="alert3"></span>
                    </div>
                    <div class="mb-3 first_box2">
                        <label for="username1" class="form-label">Username</label>
                        <input type="text" name="uname" class="form-element" id="username1" aria-describedby="emailHelp"
                            placeholder="username">
                        <span id="alert4"></span>
                    </div>
                    <div class="mb-3 second_box2">
                        <label for="otp1" class="form-label">Enter OTP</label>
                        <input type="text" name="otp" maxlength="4" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code" class="form-element" id="otp" aria-describedby="emailHelp"
                            placeholder="Enter OTP" value="">
                        <span id="alertotp" class="my-2"></span>
                    </div>
                    <div class="mb-3 first_box2">
                        <label for="password1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-element" id="password1">
                        <span id="alert5"></span>
                    </div>
                    <div class="mb-3 first_box2">
                        <label for="cpassword1" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-element" id="cpassword1">
                        <span id="alert6"></span>
                    </div>
                    <div class="mb-3 form-check first_box2">
                        <input type="checkbox" class="form-check-input" id="check1">
                        <label class="form-check-label" for="check1">Check me out</label>
                    </div>
                    <div class="modal-footer first_box2">
                        <button type="button" class="btn btn-primary" id="signbtn" onclick="signup()">Send OTP</button>
                        <button class="btn btn-primary" id="loading" type="button" disabled style="display:none">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            &nbspSending OTP...
                        </button>
                        
                    </div>
                    <div class="modal-footer second_box2">
                        <button type="button" class="btn btn-primary" onclick="signup()">Submit</button>
                    </div>

                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>