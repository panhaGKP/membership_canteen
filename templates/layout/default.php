<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Wellness center
    </title>
    <?= $this->Html->meta(
        'favicon.ico',
        'img/profile_pictures/logo.png',
        ['type' => 'icon']
    );
    ?>


<!--    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <?php
        echo $this->Html->css('BootstrapUI.bootstrap.min');
        echo $this->Html->css(['BootstrapUI./font/bootstrap-icons', 'BootstrapUI./font/bootstrap-icon-sizes']);
        echo $this->Html->script(['BootstrapUI.popper.min', 'BootstrapUI.bootstrap.min']);
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <style>
        img{
            height: 100px;
            width: 100px;
            object-fit: cover;
        }
        *{
            font-family: 'Poppins', sans-serif;
        }
        .table-header > a{
            color: black;
            text-decoration: none;
        }
        .deleted_button > a{
            color: white;
            background-color: red;
            text-decoration: none;
            padding: 2px 1rem;
            border-radius: .25rem;
        }
        .radio > div{
            margin-right: 1rem;
        }
        .profile_picture{
            width: 200px;
            height: 200px;
            object-fit: cover;
            aspect-ratio: 1/1;
        }
        .logo{
            height: 60px;
            width: 60px;
        }
    </style>
</head>
<body>
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
    <main class="main ">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
        <footer>
        </footer>
    </body>
</html>
