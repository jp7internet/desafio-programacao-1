	<h2>Visualizar Compra</h2>
<div >
	<?php echo $this->Form->create('Purchase', array('class'=>'pmsp-form pmsp-form-stacked')); ?>
	<fildset>
		<?php 
			echo $this->Form->input('purchaser_name', array('label'=>'Nome do Comprador'));
			echo $this->Form->input('item_description', array('label'=>'Descrição do item'));
			echo $this->Form->input('item_price', array('label'=>'Preço do Item'));
			echo $this->Form->input('purchase_count', array('label'=>'Contagem da compra'));
			echo $this->Form->input('merchant_addres', array('label'=>'Endereço do comerciante'));
			echo $this->Form->input('merchant_name', array('label'=>'Nome do comerciante'));
				
			?>
	</fildset>
	<?php

		echo $this->Html->link('Editar', array('action'=>'edit', $purchase), array('class'=>'pmsp-btn btn-primary'));
	?>	
</div>
