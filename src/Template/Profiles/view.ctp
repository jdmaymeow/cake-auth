<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3>Profiles / <?= h($profile->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Profile'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Profiles'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?> </li>
                                                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                                            </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('CakeAuth.admin_menu') ?>

    </div>
</div>


<!-- Begin page content -->
    <main id="main-container">

         <!-- Content -->
         <div class="container">

             <table class="table table-hover">
                                                                    <tr>
                     <th><?= __('Name') ?></th>
                     <td style="text-align: right"><?= h($profile->name) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Url') ?></th>
                     <td style="text-align: right"><?= h($profile->url) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Company') ?></th>
                     <td style="text-align: right"><?= h($profile->company) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Location') ?></th>
                     <td style="text-align: right"><?= h($profile->location) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('User') ?></th>
                     <td style="text-align: right"><?= $profile->has('user') ? $this->Html->link($profile->user->id, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></td>
                 </tr>
                                                                                                                       <tr>
                     <th><?= __('Id') ?></th>
                     <td style="text-align: right"><?= $this->Number->format($profile->id) ?></td>
                 </tr>
                                                                                 </table>



                                       <div class="">
                 <h4><?= __('Bio') ?></h4>
                 <?= $this->Text->autoParagraph(h($profile->bio)); ?>
             </div>
                                                </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
