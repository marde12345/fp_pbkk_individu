<div class="row justify-content-center">
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-20">
        <!-- Login Form s-->
        <form action="{{url('register')}}" method="POST">

            <div class="login-form">
                <h4 class="login-title">Register</h4>

                <div class="row">
                    <div class="col-md-12 mb-20">
                        <label>Username</label>
                        <input class="mb-0" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="col-md-12 mb-20">
                        <label>Name</label>
                        <input class="mb-0" type="text" placeholder="Name">
                    </div>
                    <div class="col-md-12 mb-20">
                        <label>Email Address</label>
                        <input class="mb-0" type="email" placeholder="Email Address">
                    </div>
                    <div class="col-md-6 mb-20">
                        <label>Password</label>
                        <input class="mb-0" type="password" placeholder="Password">
                    </div>
                    <div class="col-md-6 mb-20">
                        <label>Confirm Password</label>
                        <input class="mb-0" type="password" placeholder="Confirm Password">
                    </div>
                    <div class="col-12">
                        <button class="register-button mt-0" type="submit">Register</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>