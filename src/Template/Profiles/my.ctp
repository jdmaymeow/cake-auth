<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->


<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container" style="padding-top: 24px">
        <div class="row">
            <div class="col-md-3">
                <span class="vcard-avatar d-block">
                    <?= $this->Html->image('/' . $profile->user->image, ['class' => 'img img-responsive img-rounded']) ?>
                </span>
                <div class="vcard-container pa-3">
                    <span class="vcard-fullname d-block"><?= $profile->name ?></span>
                    <span class="vcard-username d-block"><?= $profile->user->username ?></span>
                </div>
                <div class="border-bottom-gray">
                    <?= $profile->bio ?>
                </div>
                <div class="border-bottom-gray pa-3">
                    <ul class="fa-ul">
                        <li><i class="fa-li fa fa-group"></i> <?= $profile->company ?></li>
                        <li><i class="fa-li fa fa-globe"></i><a href="<?= $profile->url ?>"><?= $profile->url ?></a></li>
                        <li><i class="fa-li fa fa-map-marker"></i> <?= $profile->location ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">

                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">Overview</a></li>
                    <li role="presentation"><a href="#">My Resources</a></li>
                    <li role="presentation"><a href="#">Projects</a></li>
                </ul>

                <h4 class="page-header">Activity</h4>
                Comming Soon

            </div>
        </div>
    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
