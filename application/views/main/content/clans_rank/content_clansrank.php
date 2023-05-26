<section class="page-banner" style="border-bottom:none;">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <ul class="bread-crumb clearfix">
                <li><a href="<?= base_url() . index_page() . '/home' ?>">Home</a></li>
                <li>Clans Rank</li>
            </ul>
            <h1>Clans Rank</h1>
        </div>
    </div>
</section>

<section class="clans-section">
    <div class="auto-container">
        <div class="row clearfix justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table class="nk-table text-center mt-5">
                    <thead style="text-transform: uppercase;">
                        <th>Pos</th>
                        <th>Clan Rank</th>
                        <th>Clan Name</th>
                        <th>Total EXP</th>
                    </thead>
                    <tbody>
                        <?php if ($list == null) : ?>
                            <tr>
                                <td colspan="5">Clans Data Not Found</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($list as $key => $value) : ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><img src="<?= base_url('base/gamon/images/img_clan/' . $value['clan_rank'] . '.jpg') ?>" alt="<?= $value['clan_rank'] ?>"></td>
                                    <td><?= $value['clan_name'] ?></td>
                                    <td><?= number_format($value['clan_exp'], '0', ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</section>