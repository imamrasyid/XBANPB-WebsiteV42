<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?= base_url() . index_page() . '/home' ?>">Home</a></li>
                <li>Create Hint</li>
            </ul>
            <h1>Create Hint</h1>
        </div>
    </div>
</section>

<section class="createhint-section">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="default-form">
                    <?= form_open(base_url() . index_page() . '/playerpanel/create_hint', 'autocomplete="off"') ?>
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
                        <input type="text" name="hint_answer" value="<?= set_value('hint_answer') ?>" placeholder="Enter Your Hint Answer" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="theme-btn btn-block btn-style-four">Create Hint</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>