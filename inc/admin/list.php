<?php $this->adminHeader() ?>
  
  <div class="wrap">
    <h2>Campanhas</h2> 
    <?php if(isset($this->forcefetched)): ?>
    <div id="fetched-warning" class="updated">
      <p><?php printf(__("Campanha processada. %s posts importados", 'wpomatic'), $this->forcefetched) ?></p>
    </div>
    <?php endif; ?>
  
    <table class="widefat"> 
      <thead>
        <tr>
          <th scope="col" style="text-align: center">ID</th>
          <th scope="col"><?php _e('Título', 'wpomatic') ?></th>
          <th style="text-align: center" scope="col"><?php _e('Ativo', 'wpomatic') ?></th>
      	  <th style="text-align: center" scope="col"><?php _e('Total de posts', 'wpomatic') ?></th>
      	  <th scope="col"><?php _e('Última atividade', 'wpomatic') ?></th>
      	  <th scope="col" colspan="4" style="text-align: center"><?php _e('Ações', 'wpomatic') ?></th>
        </tr>
      </thead>
      
      <tbody id="the-list">            
        <?php if(!$campaigns): ?>
          <tr> 
            <td colspan="5"><?php _e('Nenhuma campanha para mostrar', 'wpomatic') ?></td> 
          </tr>  
        <?php else: ?>     
          <?php $class = ''; ?>  
          
          <?php foreach($campaigns as $campaign): ?>
          <?php $class = ('alternate' == $class) ? '' : 'alternate'; ?>             
          <tr id='campaign-<?php echo $campaign->id ?>' class='<?php echo $class ?> <?php if($_REQUEST['id'] == $campaign->id) echo 'highlight'; ?>'> 
            <th scope="row" style="text-align: center"><?php echo $campaign->id ?></th> 
            <td><?php echo attribute_escape($campaign->title) ?></td>          
            <td style="text-align: center"><?php echo _e($campaign->active ? 'Sim' : 'Não', 'wpomatic') ?></td>
            <td style="text-align: center"><?php echo $campaign->count ?></td>        
            <td><?php echo $campaign->lastactive != '0000-00-00 00:00:00' ? WPOTools::timezoneMysql('F j, g:i a', $campaign->lastactive) : __('Never', 'wpomatic') ?></td>
            <td><a href="<?php echo $this->adminurl ?>&amp;s=edit&amp;id=<?php echo $campaign->id ?>" class='edit'>Edit</a></td> 
            <td><?php echo "<a href='" . wp_nonce_url($this->adminurl . '&amp;s=forcefetch&amp;id=' . $campaign->id, 'forcefetch-campaign_' . $campaign->id) . "' class='edit' onclick=\"return confirm('". __('Tem certeza que deseja processar todos os feeds da campanha?', 'wpomatic') ."')\">" . __('Importar', 'wpomatic') . "</a>"; ?></td>
            <td><?php echo "<a href='" . wp_nonce_url($this->adminurl . '&amp;s=reset&amp;id=' . $campaign->id, 'reset-campaign_' . $campaign->id) . "' class='delete' onclick=\"return confirm('". __('Tem certeza que deseja resetar a campanha? Resetar não influencia os posts já criados no WP.', 'wpomatic') ."')\">" . __('Resetar', 'wpomatic') . "</a>"; ?></td>
            <td><?php echo "<a href='" . wp_nonce_url($this->adminurl . '&amp;s=delete&amp;id=' . $campaign->id, 'delete-campaign_' . $campaign->id) . "' class='delete' onclick=\"return confirm('" . __("Você vai apagar a campanha '%s'. Esta ação não remove os posts já criados no WP.\n'OK' para apagar, 'Cancelar' para desistir.") ."')\">" . __('Apagar', 'wpomatic') . "</a>"; ?></td>            
          </tr>              
          <?php endforeach; ?>                    
        <?php endif; ?>
      </tbody>
    </table>
    
    <div id="ajax-response"></div>
    
  </div>
  
<?php $this->adminFooter() ?>
