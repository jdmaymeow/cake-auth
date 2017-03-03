<div class="cinema border-bottom-gray">
    <h3><i class="fa fa-shield"></i> IAM & Admin</h3>
</div>
<ul class="nav nav-sidebar">
    <li class="<?= $this->request->params['controller'] == 'Users' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-user"></i> Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?> </li>
</ul>