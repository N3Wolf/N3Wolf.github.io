<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
$epoliticaDescription = 'ePolitica: Confiabilidade criada por você';
$epoliticaShortDescription = 'ePolitica';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $epoliticaDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""> <?= $this->Html->link($epoliticaShortDescription, array('controller' => '/'))  ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                
            <?php 
            //se o visitante já estiver logado, exdibi opção para sair
            //se não estiver logado, exibe para fazer login
            if (empty($this->request->session()->read('Auth.User.id'))){
            //exibe a opção de realiar login
                echo '<li>';
                echo $this->Html->link("Entrar",
                    array(
                        'controller' => 'users',
                        'action' => 'login'
                    )    
                );
                echo '</li>';
            } else {
                echo '<li>';
                echo $this->Html->link("Bem vindo ".$this->request->session()->read('Auth.User.email') ,
                        array(
                            'controller' => 'users',
                            'action' => 'view', $this->request->session()->read('Auth.User.id')
                        )
                );
                echo '</li>';
                echo '<li>';
                echo $this->Html->link("Sair",
                        array(
                            'controller' => 'users',
                            'action' => 'logout'
                        )    
                ); 
                echo '</li>';
                } ?>
            
            
<!--                  
                <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>-->
            </ul>
        </div>
    </nav>
    
    <?= $this->Flash->render() ?>
   
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    
    <!--<pre>
    <?= var_dump($_SESSION) ?>
    </pre>

    </div>
    <footer>
    </footer>
</body>
</html>
