<div class="cont">
    <nav>
        <div class="link">
            <div style="background-color:black">
                <ul>
                    <li><a href="<?php echo site_url('canteen'); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('canteen/login'); ?>">Login</a></li>
                    <li><a href="<?php echo site_url('canteen/signout') ?>">Loguot</a></li>
                </ul>
            </div>
        </div>

    </nav>

    <div class="sub-cont">

    </div>
    <form action="<?php echo site_url('canteen/check_login'); ?>" method="post">

        <div class="form">
            <h2>SIG-IN</h2>

            <label>
                <span>Email</span>
                <input type="text" name="email">
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="password">
            </label>
            <button type="submit" class="btn btn-secondary">Login</button>
            <p class="forgot">Forgot password?</p>
            <center>

            </center>

        </div>
</div>
</form>