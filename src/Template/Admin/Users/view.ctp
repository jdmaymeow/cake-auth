<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><i class="fa fa-diamond text-amethyst"></i> <?= h($user->username) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>
    </div>
</div>


<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">

        <table class="table table-hover">
            <tr>
                <th><?= __('Username') ?></th>
                <td style="text-align: right"><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th><?= __('Password') ?></th>
                <td style="text-align: right"><?= h($user->password) ?></td>
            </tr>
            <tr>
                <th><?= __('Role') ?></th>
                <td style="text-align: right"><?= h($user->role) ?></td>
            </tr>
            <tr>
                <th><?= __('Uid') ?></th>
                <td style="text-align: right"><?= h($user->uid) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td style="text-align: right"><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Password reset requested') ?></th>
                <td style="text-align: right"><?= h($user->password_reset) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td style="text-align: right"><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Image') ?></th>
                <td style="text-align: right"><?= $user->image ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td style="text-align: right"><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td style="text-align: right"><?= h($user->modified) ?></td>
            </tr>
            <tr>
                <th><?= __('Verified') ?></th>
                <td style="text-align: right"><label class="label label-info"><?= $user->verified ? __('Yes') : __('No'); ?></label></td>
            </tr>
        </table>


        <div>
            <h4 class="page-header">Image</h4>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-3">Here you can change your image</div>
                <div class="col-md-9">
                    <?= $user->image ? $this->Html->image('/' . $user->image, ['height' => '180', 'width' => '180', 'class' => 'img img-circle']) : '' ?>
                </div>
            </div>
            <?= $this->Form->create($user, [
                'type' => 'file',
                'url' => ['action' => 'updateImage'],
                'align' => [
                    'sm' => [
                        'left' => 6,
                        'middle' => 6,
                        'right' => 12
                    ],
                    'md' => [
                        'left' => 3,
                        'middle' => 9
                    ]
                ]
            ]) ?>

            <div class="form-body">
                <?php
                echo $this->Form->input('image_file', ['type' => 'file']);
                ?>
            </div>
            <div class="form-action">
                <div class="row">
                    <div class="col-md-offset-3 col-md-4">
                        <?= $this->Form->button(__('Update account'), ['class' => 'btn green']) ?>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
            <h4 class="page-header">Deactivate profile</h4>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-3">Here you can change your image</div>
                <div class="col-md-9">
                    <a href="#" class="btn btn-danger">Deactivate profile</a>
                </div>
            </div>
        </div>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
