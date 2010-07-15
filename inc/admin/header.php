<link rel="stylesheet" href="<?php echo $this->tplpath ?>/css/admin.css" type="text/css" media="all" title="" />
<?php if($this->newadmin): ?>
<link rel="stylesheet" href="<?php echo $this->tplpath ?>/css/admin-new.css" type="text/css" media="all" title="" />  
<?php endif ?>

<div id="wpomain">

  <div id="wpomenu" class="wrap">   
    <div> 
      <ul>
        <li <?php echo $current['home'] ?>><a id="menu_home" href="<?php echo $this->adminurl ?>&amp;s=home"><?php _e('Painel', 'wpomatic') ?></a></li>
        <li <?php echo $current['list'] ?>><a id="menu_list" href="<?php echo $this->adminurl ?>&amp;s=list"><?php _e('Campanhas', 'wpomatic') ?></a></li>
        <li <?php echo $current['add'] ?>><a id="menu_add" href="<?php echo $this->adminurl ?>&amp;s=add"><?php _e('Incluir campanha', 'wpomatic') ?></a></li>
        <li <?php echo $current['options'] ?>><a id="menu_options" href="<?php echo $this->adminurl ?>&amp;s=options"><?php _e('Opções', 'wpomatic') ?></a></li>
        <li <?php echo $current['import'] ?>><a id="menu_backup" href="<?php echo $this->adminurl ?>&amp;s=import"><?php _e('Importar', 'wpomatic') ?></a></li>
        <li <?php echo $current['export'] ?>><a id="menu_backup" href="<?php echo $this->adminurl ?>&amp;s=export"><?php _e('Exportar', 'wpomatic') ?></a></li>
      </ul>
    </div>     
  </div>  

  <div id="wpocontent">