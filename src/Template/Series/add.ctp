<h1>Agregar Series</h1>
<?php
echo $this->Form->create('Series');
echo $this->Form->input('nombre', array('autofocus' => 'autofocus'));
echo $this->Form->input('total', ['type' => 'number']);
echo $this->Form->input('progreso', ['type' => 'number']);
echo $this->Form->input('descarga', ['type' => 'number']);
echo $this->Form->input('fini', array('label' => 'Fecha Inicio', 'value' => date("Y-m-d"), 'type' => 'text', 'class' => 'datepicker'));
echo $this->Form->input('ffin', array('label' => 'Fecha Fin', 'empty' => true, 'type' => 'text', 'class' => 'datepicker'));
echo $this->Form->input('estado', array('options' => array('viendo' => 'Viendo', 'espera' => 'En Espera', 'ver' => 'Por Ver', 'completado' => 'Completado', 'descargando' => 'Descargando')));
echo $this->Form->input('tipo', array('options' => array('serie' => 'Serie TV', 'webtoon' => 'Webtoon', 'anime' => 'Anime', 'manga' => 'Manga')));
echo $this->Form->submit('Guardar');
echo $this->Form->end();
?>