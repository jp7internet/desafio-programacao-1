<h2>Compras</h2>
<div class="pmsp-menu pmsp-menu-h">
	<ul>
		<li><?php echo $this->Html->link('Adicionar Compra', array('action'=>'add'),array("escape"=>false));?>
	</ul>
</div>
<table class="pmsp-table pmsp-table-hover">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('purchaser_name', 'Nome');?></th>
			<th><?php echo $this->Paginator->sort('item_description', 'Descrição do item');?></th>
			<th><?php echo $this->Paginator->sort('item_price', 'Preço do Item')?></th>
			<th><?php echo $this->Paginator->sort('purchase_count', 'Contagem da compra')?></th>
			<th><?php echo $this->Paginator->sort('merchant_addres', 'Endereço do comerciante')?></th>
			<th><?php echo $this->Paginator->sort('merchant_name', 'Nome do comerciante')?></th>
			<th><?php echo $this->Paginator->sort('receita', 'Receita')?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($purchases as $purchase): ?>
			<tr>
				<td><?php echo $this->Html->link($purchase['Purchase']['purchaser_name'], array('controller'=>'purchases', 'action'=>'view', $purchase['Purchase']['id']));?></td>
				<td><?php echo $purchase['Purchase']['item_description']?></td>
				<td><?php echo $purchase['Purchase']['item_price']?></td>
				<td><?php echo $purchase['Purchase']['purchase_count']?></td>
				<td><?php echo $purchase['Purchase']['merchant_addres']?></td>
				<td><?php echo $purchase['Purchase']['merchant_name']?></td>
				<td><?php echo $purchase['Purchase']['item_price']*$purchase['Purchase']['purchase_count']?></td>
				
				<td class="center">
					<?php
						echo $this->Html->link(' Editar', array('action'=>'edit', $purchase['Purchase']['id']));
					?>
					<?php 
						echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $purchase['Purchase']['id']), array(), __('Tem certeza que deseja deletar essa compra?'));
					?>
						
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
<div class="pmsp-paginator">
	<?php
		echo $this->Paginator->prev('<<', array(), null, array('class'=>'pmsp-paginator-disabled'));
		echo $this->Paginator->numbers();
		echo $this->Paginator->next('>>', array(), null, array('class' => 'pmsp-paginator-disabled'));
	?>
</div> 