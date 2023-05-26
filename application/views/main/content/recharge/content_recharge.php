<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?= base_url() . index_page() . '/home' ?>">Home</a></li>
                <li>Recharge</li>
            </ul>
            <h1>Recharge</h1>
        </div>
    </div>
</section>

<section class="recharge-section">
    <div class="auto-container">
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
        <div class="row clearfix justify-content-center mb-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="mpl-pricing">
                    <div class="mpl-pricing-head">
                        <h3><?= $package_1->package_name ?></h3>
                        <div class="mpl-pricing-price h3">$<?= $package_1->package_price ?></div>
                    </div>
                    <div class="mpl-pricing-body">
                        <p><?= $package_1->package_details ?></p>
                        <ul class="list-unstyled mpl-pricing-list">
                            <li><?= $package_1->prize_1 ?></li>
                            <li><?= $package_1->prize_2 ?></li>
                            <li><?= $package_1->prize_3 ?></li>
                            <li><?= $package_1->prize_4 ?></li>
                            <li><?= $package_1->prize_5 ?></li>
                        </ul>
                    </div>
                    <div class="mpl-pricing-footer">
                        <a href="<?= base_url('recharge/buy_package?idx=1') ?>" class="btn btn-block btn-outline-primary">BUY NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="mpl-pricing">
                    <div class="mpl-pricing-head">
                        <h3><?= $package_2->package_name ?></h3>
                        <div class="mpl-pricing-price h3">$<?= $package_2->package_price ?></div>
                    </div>
                    <div class="mpl-pricing-body">
                        <p><?= $package_2->package_details ?></p>
                        <ul class="list-unstyled mpl-pricing-list">
                            <li><?= $package_2->prize_1 ?></li>
                            <li><?= $package_2->prize_2 ?></li>
                            <li><?= $package_2->prize_3 ?></li>
                            <li><?= $package_2->prize_4 ?></li>
                            <li><?= $package_2->prize_5 ?></li>
                        </ul>
                    </div>
                    <div class="mpl-pricing-footer">
                        <a href="<?= base_url('recharge/buy_package?idx=2') ?>" class="btn btn-block btn-outline-primary">BUY NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="mpl-pricing">
                    <div class="mpl-pricing-head">
                        <h3><?= $package_3->package_name ?></h3>
                        <div class="mpl-pricing-price h3">$<?= $package_3->package_price ?></div>
                    </div>
                    <div class="mpl-pricing-body">
                        <p><?= $package_3->package_details ?></p>
                        <ul class="list-unstyled mpl-pricing-list">
                            <li><?= $package_3->prize_1 ?></li>
                            <li><?= $package_3->prize_2 ?></li>
                            <li><?= $package_3->prize_3 ?></li>
                            <li><?= $package_3->prize_4 ?></li>
                            <li><?= $package_3->prize_5 ?></li>
                        </ul>
                    </div>
                    <div class="mpl-pricing-footer">
                        <a href="<?= base_url('recharge/buy_package?idx=3') ?>" class="btn btn-block btn-outline-primary">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>