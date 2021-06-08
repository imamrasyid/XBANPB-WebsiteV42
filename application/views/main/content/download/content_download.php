<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?php echo base_url('home') ?>">Home</a></li>
                <li>Download</li>
            </ul>
            <h1>Download</h1>
        </div>
    </div>
</section>

<section class="download-section">
    <div class="atuo-container">
        <div class="row clearfix justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
                <h1 class="text-center text-white" style="text-transform: uppercase;">Client</h1>
                <div class="container">
                    <div class="row justify-content-center mt-5 mb-5">
                        <?php foreach ($client as $row) : ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 mt-5">
                                <div class="nk-feature-2 text-center">
                                    <div class="nk-feature-title">
                                        <div class="nk-feature-icon">
                                            <i class="fa fa-download" style="font-size: 50px;"></i>
                                        </div>
                                    </div>
                                    <div class="nk-feature-cont">
                                        <h2 class="text-white"><?php echo $row['file_name'] ?></h2>
                                        <p class="text-white">Size: <?php echo $row['size'] ?></p>
                                        <br>
                                        <a href="https://<?php echo $row['file_url'] ?>" target="_blank" class="btn btn-outline-primary">Download</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
                <h1 class="text-center text-white" style="text-transform: uppercase;">Launcher</h1>
                <div class="container">
                    <div class="row justify-content-center mt-5 mb-5">
                        <?php foreach ($launcher as $row) : ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 mt-5">
                                <div class="nk-feature-2 text-center">
                                    <div class="nk-feature-title">
                                        <div class="nk-feature-icon">
                                            <i class="fa fa-download" style="font-size: 50px;"></i>
                                        </div>
                                    </div>
                                    <div class="nk-feature-cont">
                                        <h2 class="text-white"><?php echo $row['file_name'] ?></h2>
                                        <p class="text-white">Size: <?php echo $row['size'] ?></p>
                                        <br>
                                        <a href="https://<?php echo $row['file_url'] ?>" target="_blank" class="btn btn-outline-primary">Download</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
                <h1 class="text-center text-white" style="text-transform: uppercase;">Support Application</h1>
                <div class="container">
                    <div class="row justify-content-center mt-5 mb-5">
                        <?php foreach ($supportapp as $row) : ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 mt-5">
                                <div class="nk-feature-2 text-center">
                                    <div class="nk-feature-title">
                                        <div class="nk-feature-icon">
                                            <i class="fa fa-download" style="font-size: 50px;"></i>
                                        </div>
                                    </div>
                                    <div class="nk-feature-cont">
                                        <h2 class="text-white"><?php echo $row['file_name'] ?></h2>
                                        <p class="text-white">Size: <?php echo $row['size'] ?></p>
                                        <br>
                                        <a href="https://<?php echo $row['file_url'] ?>" target="_blank" class="btn btn-outline-primary">Download</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>