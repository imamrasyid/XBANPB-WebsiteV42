<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?php echo base_url() . index_page() . '/home' ?>">Home</a></li>
                <li>Players Rank</li>
            </ul>
            <h1>Players Rank</h1>
        </div>
    </div>
</section>

<section class="players-section">
    <div class="auto-container">
        <div class="row clearfix justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table class="nk-table text-center mt-5">
                    <thead style="text-transform: uppercase;">
                        <th>Pos</th>
                        <th>Rank</th>
                        <th>Nickname</th>
                        <th>VIP</th>
                        <th>Total EXP</th>
                    </thead>
                    <tbody>
                        <?php if ($list == null) : ?>
                            <tr>
                                <td colspan="5">Players Data Not Found</td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($list != null) : ?>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><img src="<?php echo base_url() ?>base/gamon/images/img_rank/<?php echo $row['rank'] ?>.gif" alt="<?php echo $row['rank'] ?>"></td>
                                    <td><?php echo $row['player_name'] ?></td>
                                    <td>
                                        <?php if ($row['pc_cafe'] == 1) : ?>
                                            <button type="button" title="XBAN VIP" class="btn btn-outline-primary">XBAN VIP</button>
                                        <?php endif; ?>
                                        <?php if ($row['pc_cafe'] == 2) : ?>
                                            <button type="button" title="XBAN VVIP" class="btn btn-outline-success">XBAN VVIP</button>
                                        <?php endif; ?>
                                        <?php if ($row['pc_cafe'] == 3) : ?>
                                            <button type="button" title="XBAN DEV" class="btn btn-outline-warning">XBAN DEV</button>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo number_format($row['exp'], '0', ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</section>