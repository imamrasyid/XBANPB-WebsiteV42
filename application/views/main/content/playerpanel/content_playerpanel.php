<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?php echo base_url('home') ?>">Home</a></li>
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
                            <?php echo $this->session->flashdata('false') ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('true')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('true') ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                    <?php foreach ($account as $row) : ?>
                                            <tr>
                                                <td>Username</td>
                                                <td><?php echo $row['login'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Player ID</td>
                                                <td><?php echo $row['player_id'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Player Name</td>
                                                <td><?php echo $row['player_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Rank</td>
                                                <td><img src="<?php echo base_url() ?>base/gamon/images/img_rank/<?php echo $row['rank'] ?>.gif" alt="<?php echo $row['rank'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Points</td>
                                                <td><?php echo number_format($row['gp'], '0',',','.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Exp</td>
                                                <td><?php echo number_format($row['exp'], '0',',','.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Badges</td>
                                                <td>
                                                    <?php
                                                    if ($row['pc_cafe'] == "1") 
                                                    {
                                                        echo '<button type="button" title="Default Badges For Player" class="btn btn-outline-primary">XBAN VIP</button>';
                                                    }
                                                    else if ($row['pc_cafe'] == "2") 
                                                    {
                                                        echo '<button type="button" title="Default Badges For Player" class="btn btn-outline-success">XBAN VVIP</button>';
                                                    }
                                                    else if ($row['pc_cafe'] == "5")
                                                    {
                                                        echo '<button type="button" title="Developer & Game Master Badges" class="btn btn-outline-warning">DEV & GM</button>';
                                                    }
                                                    else
                                                    {
                                                        echo '<button type="button" title="Developer & Game Master Badges" class="btn btn-outline-secondary">Normal</button>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Account Status</td>
                                                <td>
                                                    <?php
                                                    if ($row['access_level'] == "-1") 
                                                    {
                                                        echo '<p class="text-danger" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">BANNED</p>';
                                                    }
                                                    else if ($row['access_level'] == "0") 
                                                    {
                                                        echo '<p class="text-success" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ACTIVE</p>';
                                                    }
                                                    else if ($row['access_level'] == "1") 
                                                    {
                                                        echo '<p class="text-success" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ACTIVE</p>';
                                                    }
                                                    else if ($row['access_level'] == "2")
                                                    {
                                                        echo '<p class="text-success" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ACTIVE</p>';
                                                    }
                                                    else if ($row['access_level'] == "3")
                                                    {
                                                        echo '<p class="text-warning" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ADMIN</p>';
                                                    }
                                                    else if ($row['access_level'] == "4")
                                                    {
                                                        echo '<p class="text-warning" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">GAME MASTER</p>';
                                                    }
                                                    else if ($row['access_level'] == "5")
                                                    {
                                                        echo '<p class="text-warning" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">ADMIN</p>';
                                                    }
                                                    else if ($row['access_level'] == "6") 
                                                    {
                                                        echo '<p class="text-warning" style="font-weight: bold; font-style: italic; margin-bottom: -10px;">DEVELOPER</p>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Last IP Address</td>
                                                <td><?php echo $row['lastip'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $row['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>D-Cash</td>
                                                <td><?php echo number_format($row['money'], '0',',','.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Last MAC</td>
                                                <td><?php echo $row['last_mac'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Web Coin</td>
                                                <td><?php echo number_format($row['kuyraicoin'], '0',',','.'); ?></td>
                                            </tr>
                                    <?php endforeach; ?>
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
                                    <?php foreach ($account as $row) :?>
                                        <tr>
                                            <td width="50%">Total Match</td>
                                            <td width="50%"><?php echo number_format($row['fights'], '0',',','.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Win Match</td>
                                            <td><?php echo number_format($row['fights_win'], '0',',','.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Lose Match</td>
                                            <td><?php echo number_format($row['fights_lost'], '0',',','.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Kills</td>
                                            <td><?php echo number_format($row['kills_count'], '0',',','.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Deaths</td>
                                            <td><?php echo number_format($row['deaths_count'], '0',',','.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Headshots</td>
                                            <td><?php echo number_format($row['headshots_count'], '0',',','.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Escapes</td>
                                            <td><?php echo number_format($row['escapes'], '0',',','.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
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
                            <?php foreach ($account as $row) : ?>
                                <?php
                                if (!empty($row['hint_question']) || !empty($row['hint_answer']))
                                { 
                                ?>     
                                    <table class="table table-borderless table-hover text-white" style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td>Hint Question</td>
                                                <td><?php echo $row['hint_question'] ?></td>
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
                                        function show_hint()
                                        {
                                            $.ajax({
                                                type: 'GET',
                                                url: '<?php echo base_url('playerpanel/show_hint') ?>?token=<?php echo $this->lib_a->pass_encrypt($_SESSION['uid']) ?>',
                                                dataType: 'json',
                                                success : function(result){
                                                    $('#hint_answer').html(result),
                                                    $('#btn_hint').html('<button type="button" onclick="hide_hint()" class="btn btn-block btn-outline-primary"><span class="fa fa-eye-slash mr-2"></span>Hide Hint</button>')
                                                }
                                            })
                                        }
                                        function hide_hint()
                                        {
                                            $('#btn_hint').html('<button type="button" onclick="show_hint()" class="btn btn-block btn-outline-primary"><span class="fa fa-eye mr-2"></span>Show Hint</button>'),
                                            $('#hint_answer').html('SECRET')
                                        }
                                        </script>
                                    </div>
                                <?php
                                }
                                else
                                {
                                ?>
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
                                    <a href="<?php echo base_url('playerpanel/create_hint') ?>" class="btn btn-block btn-outline-primary">Create New One</a>
                                <?php 
                                } 
                                ?>
                            <?php endforeach; ?>
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
                            <a href="<?php echo base_url('playerpanel/changepassword') ?>" class="btn btn-block btn-outline-primary">Change Password</a>
                            <a href="<?php echo base_url('playerpanel/changeemail') ?>" class="btn btn-block btn-outline-primary">Change Email</a>
                            <button type="button" onclick="reset_equipment()" class="btn btn-block btn-outline-primary">Reset Equipment</button>
                            <a href="<?php echo base_url('playerpanel/exchangecash') ?>" class="btn btn-block btn-outline-primary">Exchange Cash</a>
                        </div>
                        <script>
                            function reset_equipment()
                            {
                                $.ajax({
                                    type: 'GET',
                                    url: '<?php echo base_url('playerpanel/resetequipment?token='.$this->lib_a->pass_encrypt($_SESSION['uid'])) ?>',
                                    dataType: 'json',
                                    success : function(result){
                                        $('#result').html(result)
                                    },
                                    error : function(result){
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