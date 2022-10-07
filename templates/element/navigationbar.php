
<?php
    $controller_name = $this->request->getParam('controller');
//    echo $controller_name;
?>
<nav class="border-bottom mb-3 shadow-sm ">
    <div class="container">
        <header class="d-flex flex-wrap  py-3 ">
            <a href="<?= $this->Url->build('/') ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <?= $this->Html->image('profile_pictures/logo.png',['class'=>'logo'])?>
                <span class="fs-5 fw-bold text-black-50">Wellness <br>Center</span>
            </a>
            <ul class="nav nav-pills fw-bold fs-5  align-content-center ">
                <li class="nav-item  nav-link <?=$controller_name == 'Customers'?' bg-lol':''?>">
                    <a class="text-decoration-none <?= $controller_name=='Customers'?'text-white':'text-black-50' ?>" href=<?= $this->Url->build(['controller'=>'customers','action'=>'index'])?> > Customers</a>
                </li>
                <li class="nav-item  nav-link <?=$controller_name == 'Memberships'?' bg-lol':''?>">
                    <a class="text-decoration-none <?= $controller_name=='Memberships'?'text-white':'text-black-50' ?>" href=<?= $this->Url->build(['controller'=>'memberships','action'=>'index'])?> > Memberships</a>
                </li>
                <li class="nav-item  nav-link <?=$controller_name == 'Checkins'?' bg-lol':''?>">
                    <a class="text-decoration-none <?= $controller_name=='Checkins'?'text-white':'text-black-50' ?>" href=<?= $this->Url->build(['controller'=>'checkins','action'=>'index'])?> > Check-Ins</a>
                </li>
                <li class="nav-item  nav-link <?=$controller_name == 'Bundles'?' bg-lol':''?>">
                    <a class="text-decoration-none <?= $controller_name=='Bundles'?'text-white':'text-black-50' ?>" href=<?= $this->Url->build(['controller'=>'bundles','action'=>'index'])?> > Bundles</a>
                </li>

            </ul>
        </header>
    </div>

</nav>
