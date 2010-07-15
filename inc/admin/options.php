<?php require_once(WPOTPL . '/helper/form.helper.php' ) ?>
<?php $this->adminHeader() ?>
      
  <div id="wpo-section-options" class="wrap">
    <h2>Opções</h2>     
    
    <?php if(isset($updated)): ?>    
      <div id="added-warning" class="updated"><p><?php _e('Opções salvas.', 'wpomatic') ?></p></div>
    <?php endif ?>

    <?php if(isset($not_writable)): ?>
      <div class="error"><p><?php _e('Pasta para armazenamento de imagens ' . WPODIR . get_option('wpo_cachepath') . ' não tem permissão de escrita!' ) ?></p></div>
    <?php endif ?>

    <form action="" method="post" accept-charset="utf-8">      
      <input type="hidden" name="update" value="1" />
      
      <ul id="options">
        <li id="options_cron">
          <?php echo label_for('option_unixcron', __('CRON Unix', 'wpomatic')) ?>
          <?php echo checkbox_tag('option_unixcron', 1, get_option('wpo_unixcron')) ?>
        
          <h3>Comando do Cron:</h3>
          <div id="cron_command" class="command"><?php echo $this->cron_command ?></div>
          
          <h3>WebCron URL:</h3>
          <div id="cron_command" class="command"><?php echo $this->cron_url ?></div>
        
          <p class="note"><?php _e('Cron está configurado para importar.', 'wpomatic') ?> <a href="<?php echo $this->helpurl ?>cron" class="help_link"><?php _e('Mais', 'wpomatic') ?></a></p>
        </li>

        <li>
          <?php echo label_for('option_logging', __('Ativar gravação de log', 'wpomatic')) ?>
          <?php echo checkbox_tag('option_logging', 1, get_option('wpo_log')) ?>
        
          <p class="note"><?php _e('Ativar gravação de eventos em log na base de dados.', 'wpomatic') ?> <a href="<?php echo $this->helpurl ?>logging" class="help_link"><?php _e('Mais', 'wpomatic') ?></a></p>
        </li>
      
        <li>
          <?php echo label_for('option_logging_stdout', __('Ativar logging stdout', 'wpomatic')) ?>
          <?php echo checkbox_tag('option_logging_stdout', 1, get_option('wpo_log_stdout')) ?>
        
          <p class="note"><?php _e('Com essa opção ativa, o WB4B-o-Matic tentará mostrar o log em tempo real enquanto é solicitada a importação manual.', 'wpomatic') ?> <a href="<?php echo $this->helpurl ?>logging" class="help_link"><?php _e('Mais', 'wpomatic') ?></a></p>
        </li>
      
        <li>
          <?php echo label_for('option_caching', __('Armazenar imagens', 'wpomatic')) ?>
          <?php echo checkbox_tag('option_caching', 1, get_option('wpo_cacheimages')) ?>
        
          <p class="note"><?php _e('Esta opção sobrescreve todas as opções de campanhas', 'wpomatic') ?> <a href="<?php echo $this->helpurl ?>image_caching" class="help_link"><?php _e('Mais', 'wpomatic') ?></a></p>
        </li>
        
        <li>
          <?php echo label_for('option_cachepath', __('Pasta do armazenamento de imagens')) ?>
          <?php echo input_tag('option_cachepath', get_option('wpo_cachepath')) ?>           
          
          <p class="note"><?php printf(__('A pasta %s deve existir, estar com permissão de escrita pelo servidor e poder ser acessada via navegador.', 'wpomatic'), '<span id="cachepath">'. WPODIR . '<span id="cachepath_input">' . get_option('wpo_cachepath') . '</span></span>') ?></p>                 
        </li>
      </ul>     
    
      <p class="submit">
      <?php echo submit_tag(__('Salvar', 'wpomatic')) ?>
      </p>
    </form>
  </div>
  
<?php $this->adminFooter() ?>
