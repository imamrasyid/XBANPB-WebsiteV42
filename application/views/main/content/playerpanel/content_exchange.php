<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?php echo base_url('home') ?>">Home</a></li>
                <li>Exchange Cash</li>
            </ul>
            <h1>Exchange Cash</h1>
        </div>
    </div>
</section>

<section class="exchange-section">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="default-form">
                    <?php echo form_open(base_url('playerpanel/exchangecash'), '') ?>
                        <?php if ($this->session->flashdata('false')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('false') ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('true')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('true') ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="text" value="<?php echo $_SESSION['username'] ?>" disabled readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?php echo number_format($details->money, '0',',','.') ?>" disabled readonly>
                        </div>
                        <div class="form-group">
                            <select name="cash_value" required>
                                <option value="" disabled selected>Select Cash Amount</option>
                                <option value="1">250.000</option>
                                <option value="2">500.000</option>
                                <option value="3">1.000.000</option>
                                <option value="4">2.000.000</option>
                                <option value="5">4.000.000</option>
                                <option value="6">8.000.000</option>
                                <option value="7">16.000.000</option>
                                <option value="8">32.000.000</option>
                                <option value="9">64.000.000</option>
                                <option value="10">128.000.000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="player_id_receiver" value="<?php echo set_value('player_id_receiver') ?>" placeholder="Enter Player ID Receiver" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <select name="hint_question" required>
                                <option value="" disabled selected>Select Your Hint Question</option>
                                <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
                                <option value="In what city or town did your mother and father meet?">In what city or town did your mother and father meet?</option>
                                <option value="What is your favorite team?">What is your favorite team?</option>
                                <option value="What is your favorite movie?">What is your favorite movie?</option>
                                <option value="What was your favorite sport in high school?">What was your favorite sport in high school?</option>
                                <option value="What was your favorite food as a child?">What was your favorite food as a child?</option>
                                <option value="What is the first name of the boy or girl that you first kissed?">What is the first name of the boy or girl that you first kissed?</option>
                                <option value="What was the make and model of your first car?">What was the make and model of your first car?</option>
                                <option value="What was the name of the hospital where you were born?">What was the name of the hospital where you were born?</option>
                                <option value="Who is your childhood sports hero?">Who is your childhood sports hero?</option>
                                <option value="What school did you attend for sixth grade?">What school did you attend for sixth grade?</option>
                                <option value="What was the last name of your third grade teacher?">What was the last name of your third grade teacher?</option>
                                <option value="In what town was your first job?">In what town was your first job?</option>
                                <option value="What was the name of the company where you had your first job?">What was the name of the company where you had your first job?</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="hint_answer" value="<?php echo set_value('hint_answer') ?>" placeholder="Enter Your Hint Answer" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn btn-block btn-style-four">Exchange Cash</button>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>