<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?= base_url() . index_page() . '/home' ?>">Home</a></li>
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
                    <?= form_open(base_url() . index_page() . '/login', 'autocomplete="off"') ?>
                    <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?php if ($this->session->flashdata('false')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('false') ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('true')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('true') ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Enter Your Username" value="<?= set_value('username') ?>" minlength="4" maxlength="16" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter Your Password" value="<?= set_value('password') ?>" minlength="4" maxlength="16" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="theme-btn btn-block btn-style-four"><span class="btn-title">LOGIN</span></button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>