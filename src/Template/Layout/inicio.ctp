<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset(); ?>
		<title>Series</title>
		<?php
			echo $this->Html->meta('icon');

			echo $this->Html->css(array('cake', 'jquery.dataTables.min', 'jquery-ui', 'style'));
			echo $this->Html->script(array('jquery-1.12.4.min', 'jquery-ui.min', 'jquery.dataTables.min', 'jslistado', 'jquery.jeditable'));

			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
		<script type="text/javascript">
			urls = {};
			urls['up'] = '<?= $this->Url->build(["controller" => "series", "action" => "up"]);?>';
			urls['upd'] = '<?= $this->Url->build(["controller" => "series", "action" => "upd"]);?>';
		</script>
	</head>
	<body>
		<div id="page">
			<div id="header">
				<h1>MyList</h1>
				<div class="description">Listado de Series</div>
			</div>
			<div id="menulinks">
				<?= $this->Html->link("<span>Viendo</span>", ['action' => 'index', 'viendo'], ['escapeTitle' => false, 'class' => $estado == 'viendo' ? 'active' : '']);?>
				<div class="menulines"></div>
				<?= $this->Html->link("<span>Descargando</span>", ['action' => 'index', 'descargando'], ['escapeTitle' => false, 'class' => $estado == 'descargando' ? 'active' : '']);?>
				<div class="menulines"></div>
				<?= $this->Html->link("<span>En Espera</span>", ['action' => 'index', 'espera'], ['escapeTitle' => false, 'class' => $estado == 'espera' ? 'active' : '']);?>
				<div class="menulines"></div>
				<?= $this->Html->link("<span>Por Ver</span>", ['action' => 'index', 'ver'], ['escapeTitle' => false, 'class' => $estado == 'ver' ? 'active' : '']);?>
				<div class="menulines"></div>
				<?= $this->Html->link("<span>Completados</span>", ['action' => 'index', 'completado'], ['escapeTitle' => false, 'class' => $estado == 'completado' ? 'active' : '']);?>
				<div class="menulines"></div>
				<?= $this->Html->link("<span>Todos</span>", ['action' => 'index', 'todo'], ['escapeTitle' => false, 'class' => $estado == 'todo' ? 'active' : '']);?>
				<div class="menulines"></div>
			</div>
			<div id="mainarea">
			<div id="contentarea">
				<h2><?= $this->Html->link("Agregar Serie", ['action' => 'add', $estado]);?></h2>
				<?= $this->Flash->render() ?>
				<div class="content">
					<?= $this->fetch('content') ?>
				</div>
			</div>
			
			<div id="footer">
				<div id="footerleft">&copy; <?= date("Y"); ?>. Todos los derechos reservados. </div>
				<div id="footerright">Spock Bros.</div>
			</div>

		</div>
	</body>
</html>
