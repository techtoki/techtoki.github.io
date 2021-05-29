
<?php
    session_start();
    $user = json_decode($_SESSION['user']);
?>

<div class="tab-tittle">
    <div id="tittle">
        ACCOUNT
    </div>
    <div id="sub-tittle">
        Change Credentials - Account Deactivation
    </div>
</div>
<style>
    #update-btn{
        font-weight: bolder;
    }
    .modal-title{
        font-weight: bolder;
    }
</style>
<hr>
<div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                </div>
                <div class="modal-body">
                    <form action="POST">
                        <div class="form-group mt-3">
                            <label for="password">Old Password</label>
                            <input type="password" class="form-control" id="password-old" placeholder="Password" required>
                            <div class="invalid-feedback">
                                Old password is incorrect!
                            </div>
                        </div>
                        <div class="form-group mt-5 password-field">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password-new" placeholder="Password" required>
                            <div class="invalid-feedback">
                                Does not matched.
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="password-confrim">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirm" placeholder="Password" required>
                            <div class="invalid-feedback">
                                Does not matched.
                            </div>
                        </div>
                        <button type="button" id="confirm-change-password"class="btn btn-primary mt-3">Confirm</button>
                    </form>
                    
                </div>
            <div class="modal-footer">
                <button type="button" id="close-change-password" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="tab-body">
    <script type="text/javascript" src="./js/account_tab.js"  async="false"></script>
    <form method="post" action="" id="registration-form">
        <div class="d-flex flex-row justify-content-between">
            <div class="w-50" style="padding-right:10px">
                <label class="sub-tittle">ACCOUNT</label>
                <div class="form-group email-field">
                    <label for="email">Email Address<button type="button" class="btn p-0 shadow-none edit-btn"><i class="bi bi-pencil-square"></i></button></label>
                    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email" value=<?php echo($user->{'email_address'}) ?> readonly>
                    <div class="invalid-feedback">
                        Plase enter email address.
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Change Password <button type="button" id="change-password" class="btn p-0 shadow-none edit-btn"><i class="bi bi-pencil-square"></i></button></label>
                </div>
            </div>
            <div class="w-50" style="padding-left:10px">
                <label class="sub-tittle">PERSONAL INFORMATION</label>
                <div class="form-group">
                    <label for="firstname">Firstname <button type="button" class="btn p-0 shadow-none edit-btn"><i class="bi bi-pencil-square"></i></button></label>
                    <input type="text" class="form-control" id="firstname" aria-describedby="firstname"  value=<?php echo($user->{'first_name'}) ?>  placeholder="Firstname" readonly>
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="lastname">Lastname <button type="button" class="btn p-0 shadow-none edit-btn"><i class="bi bi-pencil-square"></i></button></i></label>
                    <input type="text" class="form-control" id="lastname" aria-describedby="lastname" value=<?php echo($user->{'last_name'}) ?> placeholder="Lastname" readonly>
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <label class="sub-tittle">BILLING</label>
        <div class="form-group w-50" style="padding-right:10px">
            <label for="phone">Phone <button type="button" class="btn p-0 shadow-none edit-btn"><i class="bi bi-pencil-square"></i></button></i></label>
            <input type="phone" class="form-control" id="phone" value=<?php echo('0'.$user->{'phone'}) ?> aria-describedby="phone" placeholder="Phone" readonly>
            <div class="invalid-feedback">
                Invalid phone number.
            </div>
        </div>
        <div class="form-group mt-3 w-50" style="padding-right:10px">
            <label for="address">Address <button type="button" class="btn p-0 shadow-none edit-btn"><i class="bi bi-pencil-square"></i></button></i></label>
            <input type="text" class="form-control" id="address" value=<?php echo($user->{'billing_address'}) ?> aria-describedby="address" placeholder="Address" readonly>
            <div class="invalid-feedback">
                This field is required.
            </div>
        </div>
        <div style="width:30%;margin-top:25px" >
            <button id="update-btn" name="register" type="button" class="btn btn-primary w-100" >
            <i class="bi bi-pencil-square"></i> 
            Confirm Update</button>
        </div>
        <!-- <div class="d-flex flex-column w-100 justify-content-center mt-4">
            <div class="d-flex flex-row justify-content-center">
                Already have an account?
            </div>
            <div class="d-flex flex-row justify-content-center">
                <a href="login.php" style="text-decoration: none;"> Click Here</a>
            </div>
        </div> -->
    </form>
</div>
