<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?= base_url() . index_page() . '/home' ?>">Home</a></li>
                <li>Player Panel</li>
            </ul>
            <h1>Player Panel</h1>
        </div>
    </div>
</section>

<section class="playerpanel-section">
    <div class="auto-container mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="result">
                    <?php if ($this->session->flashdata('false')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('false') ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php elseif ($this->session->flashdata('true')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('true') ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="nk-feature-2 mt-3">
                    <div class="nk-feature-icon mb-1" style="margin-bottom: -8px;">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="nk-feature-cont text-center">
                        <div class="row justify-content-center">
                            <h3 class="nk-feature-title text-white mb-2" style="text-transform: uppercase;">Account Details</h3>
                            <table class="table table-borderless table-hover text-white" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>Username</td>
                                        <td><?= $account['login'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Player ID</td>
                                        <td><?= $account['player_id'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Player Name</td>
                                        <td><?= $account['player_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Rank</td>
                                        <td><img src="<?= base_url('base/gamon/images/img_rank/' . $account['rank'] . '.gif') ?>" alt="<?= $account['rank'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Points</td>
                                        <td><?= number_format($account['gp'], '0', ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Exp</td>
                                        <td><?= number_format($account['exp'], '0', ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Badges</td>
                                        <td>
                                            <?php if ($account['pc_cafe'] == 1) : ?>
                                                <button type="button" title="Default Badges For Player" class="btn btn-outline-primary">XBAN VIP</button>
                                            <?php elseif ($account['pc_cafe'] == 2) : ?>
                                                <button type="button" title="Default Badges For Player" class="btn btn-outline-success">XBAN VVIP</button>
                                            <?php elseif ($account['pc_cafe'] == 5) : ?>
                                                <button type="button" title="Developer & Game Master Badges" class="btn btn-outline-warning">DEV & GM</button>
                                            <?php else : ?>
                                                <button type="button" title="Normal Badges" class="btn btn-outline-secondary">Normal</button>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Account Status</td>
                                        <td>
                                            <?php if ($account['access_level'] == -1) : ?>
                                                <p class="text-danger" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">BANNED</p>
                                            <?php elseif ($account['access_level'] == 0) : ?>
                                                <p class="text-success" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ACTIVE</p>
                                            <?php elseif ($account['access_level'] == 1) : ?>
                                                <p class="text-success" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ACTIVE</p>
                                            <?php elseif ($account['access_level'] == 2) : ?>
                                                <p class="text-success" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ACTIVE</p>
                                            <?php elseif ($account['access_level'] == 3) : ?>
                                                <p class="text-warning" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ADMIN</p>
                                            <?php elseif ($account['access_level'] == 4) : ?>
                                                <p class="text-warning" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">GAME MASTER</p>
                                            <?php elseif ($account['access_level'] == 5) : ?>
                                                <p class="text-warning" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ADMIN</p>
                                            <?php elseif ($account['access_level'] == 6) : ?>
                                                <p class="text-warning" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">DEVELOPER</p>
                                            <?php else : ?>
                                                <p class="text-danger" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">BANNED</p>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Last IP Address</td>
                                        <td><?= $account['lastip'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?= $account['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>D-Cash</td>
                                        <td><?= number_format($account['money'], '0', ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last MAC</td>
                                        <td><?= $account['last_mac'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Web Coin</td>
                                        <td><?= @number_format($account['kuyraicoin'], '0', ',', '.'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="nk-feature-2 mt-3">
                    <div class="nk-feature-icon">
                        <span class="fa fa-history"></span>
                    </div>
                    <div class="nk-feature-cont text-center">
                        <div class="row justify-content-center">
                            <h3 class="nk-feature-title text-white mb-2" style="text-transform: uppercase;">Match Details</h3>
                            <table class="table table-borderless table-hover text-white" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="50%">Total Match</td>
                                        <td width="50%"><?= number_format($account['fights'], '0', ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Win Match</td>
                                        <td><?= number_format($account['fights_win'], '0', ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lose Match</td>
                                        <td><?= number_format($account['fights_lost'], '0', ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Kills</td>
                                        <td><?= number_format($account['kills_count'], '0', ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Deaths</td>
                                        <td><?= number_format($account['deaths_count'], '0', ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Headshots</td>
                                        <td><?= number_format($account['headshots_count'], '0', ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Escapes</td>
                                        <td><?= number_format($account['escapes'], '0', ',', '.') ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="nk-feature-2 mt-3">
                    <div class="nk-feature-icon">
                        <span class="fa fa-lock"></span>
                    </div>
                    <div class="nk-feature-cont text-center">
                        <h3 class="nk-feature-title text-white mb-2" style="text-transform: uppercase;">Security Details</h3>
                        <div class="row">
                            <?php if (@$account['hint_question'] != '') : ?>
                                <table class="table table-borderless table-hover text-white" style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>Hint Question</td>
                                            <td><?= @$account['hint_question'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hint Answer</td>
                                            <td id="hint_answer" class="text-success" style="font-style: italic;">SECRET</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="btn_hint" class="auto-container">
                                    <button type="button" onclick="show_hint()" class="btn btn-block btn-outline-primary"><span class="fa fa-eye mr-2"></span>Show Hint</button>
                                    <script>
                                        function show_hint() {
                                            $.ajax({
                                                type: 'GET',
                                                url: '<?= base_url() . index_page() . '/playerpanel/show_hint' ?>?token=<?= $this->lib_a->pass_encrypt($this->session->userdata('uid')) ?>',
                                                dataType: 'json',
                                                success: function(result) {
                                                    $('#hint_answer').html(result);
                                                    $('#btn_hint').html('<button type="button" onclick="hide_hint()" class="btn btn-block btn-outline-primary"><span class="fa fa-eye-slash mr-2"></span>Hide Hint</button>');
                                                }
                                            })
                                        }

                                        function hide_hint() {
                                            $('#btn_hint').html('<button type="button" onclick="show_hint()" class="btn btn-block btn-outline-primary"><span class="fa fa-eye mr-2"></span>Show Hint</button>');
                                            $('#hint_answer').html('SECRET');
                                        }
                                    </script>
                                </div>

                            <?php elseif (@$account['hint_question'] == '' || $account['hint_answer']) : ?>
                                <table class="table table-borderless table-hover text-white" style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>Hint Question</td>
                                            <td class="text-danger">Empty</td>
                                        </tr>
                                        <tr>
                                            <td>Hint Answer</td>
                                            <td id="hint_answer" class="text-danger">Empty</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-danger">Your Account Is Not Safe!. Please Create Your Hint Immediately</td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php endif ?>
                            <a href="<?= base_url() . index_page() . '/playerpanel/create_hint' ?>" class="btn btn-block btn-outline-primary">Create New One</a>
                        </div>
                    </div>
                </div>
                <div class="nk-feature-2 mt-3">
                    <div class="nk-feature-icon">
                        <span class="fa fa-cog"></span>
                    </div>
                    <div class="nk-feature-cont text-center">
                        <h3 class="nk-feature-title text-white mb-3" style="text-transform: uppercase;">Custom Menu</h3>
                        <div class="row">
                            <a href="<?= base_url() . index_page() . '/playerpanel/changepassword' ?>" class="btn btn-block btn-outline-primary">Change Password</a>
                            <a href="<?= base_url() . index_page() . '/playerpanel/changeemail' ?>" class="btn btn-block btn-outline-primary">Change Email</a>
                            <button type="button" onclick="reset_equipment()" class="btn btn-block btn-outline-primary">Reset Equipment</button>
                            <a href="<?= base_url() . index_page() . '/playerpanel/exchangecash' ?>" class="btn btn-block btn-outline-primary">Exchange Cash</a>
                        </div>
                        <script>
                            function reset_equipment() {
                                $.ajax({
                                    type: 'GET',
                                    url: '<?= base_url() . index_page() . '/playerpanel/resetequipment?token=' ?><?= $this->lib_a->pass_encrypt($this->session->userdata('uid')) ?>',
                                    dataType: 'json',
                                    success: function(result) {
                                        $('#result').html(result)
                                    },
                                    error: function(result) {
                                        $('#result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed To Reset Equipment. Please Contact DEV / GM For Detail Information.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
                                    }
                                })
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>