<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header card-theme second_box">
                <div class="d-flex align-items-center">
                    <h2 class="modal-title " id="loginLabel">loggedin Successfully...</h2>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        ></button>
                </div>
            </div>

            <div class="modal-header  card-theme first_box">
                <h5 class="modal-title" id="loginLabel">Login</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    ></button>
            </div>

            <div class="modal-body card-theme first_box ">
                <form method="post">


                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" name="mail" class="form-element" id="email" placeholder="email@example.com">
                        <span id="alert1"></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="pass" class="form-element" id="password" placeholder="Password">
                        <span id="alert2"></span>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="check" class="form-check-input" id="check">
                            <label class="form-check-label" for="check">
                                Remember me
                            </label>
                        </div>
                        
                    </div>
                    <span><a class="dropdown-item card-theme" href="#" data-bs-toggle="modal"
                            data-bs-target="#signupModal">New
                            around here? Sign up</a></span>
                    <span><a class="dropdown-item card-theme" href="#">Forgot password?</a></span>
                    <div class="mb-4">
                        <span id="alert8"></span>
                    
                    </div>
                    <div class="modal-footer my-4">
                        <button type="button" class="btn btn-primary" onclick="login()">Login</button>
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