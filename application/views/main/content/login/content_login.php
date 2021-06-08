<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?php echo base_url('home') ?>">Home</a></li>
                <li>Login</li>
            </ul>
            <h1>Login</h1>
        </div>
    </div>
</section>

<section class="login-section">
    <div class="auto-container">
        <div class="row clearfix justify-content-center mb-5">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="default-form contact-form">
                    <?php echo form_open(base_url('login'), '') ?>
                        <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
                        <?php
                        if ($this->session->flashdata('true')) 
                        {
                            echo '<div class="alert alert-success">';
                            echo $this->session->flashdata('true');
                            echo '</div>';
                        }
                        if ($this->session->flashdata('false')) 
                        {
                            echo '<div class="alert alert-danger">';
                            echo $this->session->flashdata('false');
                            echo '</div>';
                        }
                        ?>
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Enter Your Username" value="<?php echo set_value('username') ?>" minlength="4" maxlength="16" autocomplete="off" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Enter Your Password" value="<?php echo set_value('password') ?>" minlength="4" maxlength="16" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="theme-btn btn-block btn-style-four"><span class="btn-title">LOGIN</span></button>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>