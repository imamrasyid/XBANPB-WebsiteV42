<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?= base_url() . index_page() . '/home' ?>">Home</a></li>
                <li>Redeem Code</li>
            </ul>
            <h1>Redeem Code</h1>
        </div>
    </div>
</section>

<section class="redeemcode-section">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="default-form">
                    <?= form_open(base_url() . index_page() . '/playerpanel/redeemcode', 'autocomplete="off"') ?>
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
                        <input type="text" value="<?= $this->session->userdata('username') ?>" disabled readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" name="code" value="<?= set_value('code') ?>" placeholder="Enter Your Code" autofocus required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="theme-btn btn-block btn-style-four">Redeem Code</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>