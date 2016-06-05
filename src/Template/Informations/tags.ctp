<h1>
    Getting all information with title: 
    <?= $this->Text->toList($paramsForFind)?>
</h1>

<section>
    
    <?php
    foreach ($informations as $information) { ?>
        
    <article>
        <h4> <?= $this->Html->link($information->title, array ('controller' => 'informations',
                                                                'action' => 'view', $information->id)); ?> </h4>
        
        
        <?=$this->Text->autoParagraph("Argumento: ". $information->argument) ?>
        <?=$this->Text->autoParagraph("Confiabilidade: ". $information->trust_score) ?>
        <?=$this->Text->autoParagraph("Referência eletrônica: ". $this->Html->link($information->reference_link, $information->reference_link)) ?>
        

        
    </article>
    
    
    <?php } ?>
    
</section>>

<!--        <h4> <?= print_r((array)$information); ?> </h4>-->