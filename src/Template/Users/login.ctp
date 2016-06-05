<h1>Login</h1>
<?= $this->Form->create();?>
<?= $this->Form->input('email');?>
<?= $this->Form->input('password');?>
<?= $this->Form->button('Entrar');?>
<?= //$this->Form->button('', array(
//    'type' => 'button',
//    'onclick' =>$this->Html->link('Cadastrar-se',
//                                    array(
//                                        'controller' => 'users',
//                                        'action' => 'add'
//                                    )
//                                    )
//    ));
        
//        $this->Html->link($this->Form->button('Cadastrar-se'),
//                        array(
//                            'controller' => 'users',
//                            'action' => 'add'
//                        )
//                        )-->

        
        

       
$this->Html->link('Registrar',
                array('action' => 'add',
                'controller' => 'users'),
        array('escape'=>false,
               'title' => "Clique aqui para se cadastrar")) ?>

<?= $this->Form->end();?>