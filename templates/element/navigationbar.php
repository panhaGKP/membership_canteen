<nav class="border-bottom mb-3 shadow-sm ">
    <div class="container">
        <header class="d-flex flex-wrap  py-3">
            <a href="<?= $this->Url->build('/') ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <?= $this->Html->image('profile_pictures/logo.png',['class'=>'logo'])?>
                <span class="fs-5 fw-bold text-black-50">Wellness <br>Center</span>
            </a>
            <ul class="nav nav-pills fw-bold fs-5  align-content-center">
                <li class="nav-item me-lg-3 ">
                    <?= $this->Html->link('Customers', [
                        'controller' => 'Customers',
                        'action'=> 'index'
                    ], ['class'=>'text-decoration-none text-black-50 ']
                    )?>
                </li>
                <li class="nav-item me-lg-3">
                    <?= $this->Html->link('Memberships', [
                        'controller' => 'Memberships',
                        'action'=> 'index'
                    ], ['class'=>'text-decoration-none text-black-50'])?>
                </li>
                <li class="nav-item me-lg-3">
                    <?= $this->Html->link('Checkins', [
                        'controller' => 'Checkins',
                        'action'=> 'index'
                    ], ['class'=>'text-decoration-none text-black-50'])?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Bundles', [
                        'controller' => 'Bundles',
                        'action'=> 'index'
                    ], ['class'=>'text-decoration-none text-black-50'])?>
                </li>
            </ul>
        </header>
    </div>

</nav>
