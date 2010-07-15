<?php $this->adminHeader() ?>

  <form action="<?php echo $this->adminurl ?>&amp;s=setup" method="post">
    <input type="hidden" name="dosetup" value="1" id="dosetup" />
    
    <div id="wpo-section-setup" class="wrap">
      <h2><?php _e('Configurar', 'wpomatic') ?></h2>     
    
      <p><?php _e('Por favor, siga algumas orientações para que o WB4B-o-Matic funcione perfeitamente para você.', 'wpomatic') ?></p>
    
      <ol id="setup_steps">
        <li id="step_1" class="current">
          <p><?php _e('Primeiramente, tenha certeza que o <a href="http://simplepie.org" target="_blank">SimplePie</a>, o mecanismo de importações de feed que o WB4B-o-Matic usa, é compatível com a configuração do seu servidor.', 'wpomatic') ?></p>          
          <p><?php printf(__('Para isso, por favor execute <a href="%s" target="_blank">esse teste</a> e avalie os resultados. Tipicamente, <em>Você tem tudo o que precisa para que o SimplePie funcione corretamente! Parabéns!</em> é o resultado esperado.', 'wpomatic'), $this->pluginpath . '/inc/simplepie/simplepie.tests.php') ?></p>
          <p><?php _e('Mesmo que o WB4B-o-Matic seja equipado com a última versão do SimplePie até então já lançada, nós encorajamos você a instalar o plugin <a href="http://wordpress.org/extend/plugins/simplepie-core/">SimplePie Core Wordpress</a>. É uma maneira automatica de manter o SimplePie atualizado em todos os plugins que o utilizam.', 'wpomatic') ?></p>
        </li>
      
        <li id="step_2">
          <p><?php _e('Horário é a chave para que esse tipo de plugin de agregador de conteúdo funcione da forma esperada.', 'wpomatic') ?></p>
          <p><?php printf(__('Para que o WB4B-o-Matic funcione como desejado, você deve ter certeza que o horário do servidor está configurado corretamente, e a sua timezone esteja correta <a href="%s">aqui</a> (dica: <strong>Data e hora</strong> - subsessão)', 'wpomatic'), $this->optionsurl) ?></p>
          <p><?php _e('Tenha certeza que os dados abaixo estejam corretos:', 'wpomatic') ?></p>
          <div class="command">
             <strong><?php _e('Horário UTC:', 'wpomatic') ?></strong> <?php echo gmdate('d F, Y H:i:s', current_time('timestamp', true)) ?> <br />
             <strong><?php _e('Seu horário:', 'wpomatic') ?></strong> <?php echo gmdate('d F, Y H:i:s', current_time('timestamp')) ?>
          </div>
          <p><?php _e('Não continue até que seu horário esteja correto.', 'wpomatic') ?></p>
        </li>
      
        <li id="step_3">
          <p><?php _e('Se você quer automatizar, e deixar o WB4B-o-Matic fazer o trabalho pesado de postar os feeds para você, configure o <strong>cron job</strong>. Por questões de performance, nós recomendamos que vocâ faça isso, porém você pode rodar manualmente.', 'wpomatic') ?></p>
        
          <p><?php printf(__('Adicione essa linha ao crontab ou use o painel de controle fornecido pelo seu servidor. %s', 'wpomatic'), ($nophp) ? __('<strong>Warning!</strong> WP-o-Matic has been unable to detect the location of the wget command. This means you\'ll have to check it exists from the command line or find it by your own. In the case it\'s not installed, you can alternative use the ftp command, or lynx -dump', 'wpomatic') : '') ?></p>
        
          <div class="command"><?php echo $command ?></div>
        
          <p><?php _e('Existe uma opção para quem não quer usar o cron. Chama-se <a href="http://webcron.org/index.php?&lang=en">WebCron</a>, é um serviço que executa o uma página de tempos em tempos (igual a um cron). Caso deseje usá-lo, aponte para a seguinte URL: ', 'wpomatic') ?>
                
          <div class="command"><?php echo $url ?></div>
        
          <p><input type="checkbox" name="option_unixcron" checked="checked" id="option_unixcron" /> <label for="option_unixcron"><?php _e('Vou usar o cron-job no meu servidor (desmarque caso use um serviço de pseudo cron)', 'wpomatic') ?></label></p>
        </li>
      
        <?php /* if($safe_mode): ?>
        <li id="step_4">
          <p><?php _e('Parece que você está rodando o Wordpress em <strong>Safe Mode</strong>. Se você <strong>não for</strong> usar o cron,.', 'wpomatic') ?></p>
        
          <p><?php _e('PHP sets a limit (that you hosting provider can tweak) for execution time of scripts, except when running from command line. WP-o-Matic tries to override it, but is unable to do so when safe_mode directive is enabled, like in this case.', 'wpomatic') ?></p>
        
          <p><?php _e('The solution typically involves contacting your hosting support, or switching to a new host (d\'uh)', 'wpomatic') ?></p>
        </li>
        <?php endif */?>
      
        <li id="step_<?php echo ($safe_mode) ? 5 : 4 ?>">
          <p><?php _e('Está pronto!', 'wpomatic') ?></p>
          <p><?php _e('Lembre-se que estas opções podem ser editadas na aba Opções no futuro.') ?></p>
          <p><strong><?php _e('Clique em Continuar para finalizar a instalação.') ?></strong></p>
        </li>
      </ol>
    
      <div id="setup_buttons" class="submit">      
        <input id="setup_button_submit" class="disabled" type="submit" value="<?php _e('Continuar', 'wpomatic') ?>" disabled="disabled" />      
        <input id="setup_button_previous" class="disabled" type="button" name="next" value="Anterior" disabled="disabled" />
        <input id="setup_button_next" type="button" name="next" value="Next" /> <span id="current_indicator">1</span> / <?php echo ($safe_mode) ? 5 : 4 ?>
      </div>
    
    </div>
  </form>

<?php $this->adminFooter() ?>
