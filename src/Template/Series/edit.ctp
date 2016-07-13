<h1>Editar Series</h1>
<?php
echo $this->Form->create($serie);
echo $this->Form->input('nombre', array('autofocus' => 'autofocus'));
echo $this->Form->input('total', ['type' => 'number']);
echo $this->Form->input('progreso', ['type' => 'number']);
echo $this->Form->input('descarga', ['type' => 'number']);
echo $this->Form->input('fini', array('label' => 'Fecha Inicio', 'type' => 'text', 'class' => 'datepicker'));
echo $this->Form->input('ffin', array('label' => 'Fecha Fin', 'type' => 'text', 'class' => 'datepicker'));
echo $this->Form->input('estado', array('options' => array('viendo' => 'Viendo', 'espera' => 'En Espera', 'ver' => 'Por Ver', 'completado' => 'Completado', 'descargando' => 'Descargando')));
echo $this->Form->input('tipo', array('options' => array('serie' => 'Serie TV', 'webtoon' => 'Webtoon', 'anime' => 'Anime', 'manga' => 'Manga')));
echo $this->Form->submit('Actualizar');
echo $this->Form->end();
?>