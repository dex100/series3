<?php 
// $correlativo = $ucons['Constancia']['correlativo'];
// $correlativo += 1;
// echo str_pad($correlativo, 5, "0", STR_PAD_LEFT); 
// echo '<p>' . Inflector::singularize( 'cars' ) . '</p>'; # prints "Pois"
// echo '<p>' . Inflector::pluralize( 'car' ) . '</p>';   

// echo $this->Html->link("Agregar Serie", array('action' => 'add', $estado));
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista">
<thead>
	<tr>
		<th>Nombre</th>
		<th>Progreso</th>
		<th>Descarga</th>
		<th>Fecha Inicio</th>
		<th>Fecha Fin</th>
		<th>Tipo</th>
	</tr>
</thead>
<tbody>
	<?php foreach ($listado as $serie): ?>
		<tr>
			<td><?= $this->Html->link($serie->nombre, ['action' => 'edit', $serie->id, $estado]); ?></td>
			<td>
				<?php 
					$total = $serie->total != '' ? $serie->total : '-';
					echo '<span class="edit" id="'.$serie->id.'">'
						.($serie->progreso >= '0' ? $serie->progreso : '-')
						.'</span>/'.$total.'   '
						.$this->Html->link('+', '#', ['id' => 'link_'.$serie->id, 'class' => 'link', 'data-link' => $serie->progreso ? $serie->progreso + 1 : 1]);
				?>
			</td>
			<td>
				<?php 
					echo '<span class="dl" id="d_'.$serie->id.'">'
						.($serie->descarga >= '0' ? $serie->descarga : '-')
						.'</span>/'.$total.'   '
						.$this->Html->link('+', '#', ['id' => 'link2_'.$serie->id, 'class' => 'link2', 'data-link' => $serie->descarga ? $serie->descarga + 1 : 1]); 
				?>
			</td>
			<td><?= $serie->fini ? $serie->fini->format('d/m/Y') : '' ?></td>
			<td><?= $serie->ffin ? $serie->ffin->format('d/m/Y') : '' ?></td>
			<td style="text-transform: capitalize">
				<?= str_replace('serie', 'serie TV', $serie->tipo) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php unset($listado); ?>
</tbody>
</table>
