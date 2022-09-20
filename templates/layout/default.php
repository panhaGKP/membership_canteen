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
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

<!--    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
<!--    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>-->
<!--    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>-->
<!--    <script>-->
<!--        $(document).ready(function () {-->
<!--            $('#test').DataTable();-->
<!--        });-->
<!--    </script>-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">-->
    <style>
        img{
            height: 100px;
            width: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <?= $this->Html->link('Customers', [
                'controller' => 'Customers',
                'action'=> 'index'
            ])?>
            <?= $this->Html->link('Memberships', [
                'controller' => 'Memberships',
                'action'=> 'index'
            ])?>
            <?= $this->Html->link('Checkins', [
                'controller' => 'Checkins',
                'action'=> 'index'
            ])?>
            <?= $this->Html->link('Bundles', [
                'controller' => 'Bundles',
                'action'=> 'index'
            ])?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
