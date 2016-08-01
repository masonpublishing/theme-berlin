<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>
    <div id="main-block">

      <div id="viewer-block">
          <?php if (metadata('item', array('Item Type Metadata', 'Player'))): ?> 
              <div class="item-player">
                  <?php echo metadata('item', array('Item Type Metadata', 'Player')); ?>
              </div>
              <div id="transcription-window" class="element">
                  <p><?php echo metadata('item', array('Item Type Metadata', 'Transcription')); ?></p>
              </div>
          <?php elseif (metadata('item', array('Item Type Metadata', 'Text'))): ?>
              <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
              <div id="transcription-window" class="element">
                  <h3><?php echo __('Annotations'); ?></h3>
                  <?php echo metadata('item', array('Item Type Metadata', 'Text')); ?>
              </div>
          <?php else: ?>
              <?php if (metadata('item', 'has files')): ?>
                  <?php echo files_for_item(array('imageSize' => 'fullsize', 'imgAttributes' => array('class' => 'fullsize-image'))); ?>
              <?php endif; ?>
          <?php endif; ?>

      </div>

      <h3><?php echo __('Files'); ?></h3>
      <div id="item-images">
           <?php echo files_for_item(); ?>
      </div>

     <?php if(metadata('item','Collection Name')): ?>
        <div id="collection" class="element">
          <h3><?php echo __('Collection'); ?></h3>
          <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
        </div>
     <?php endif; ?>

       <!-- The following prints a list of all tags associated with the item -->
      <?php if (metadata('item','has tags')): ?>
      <div id="item-tags" class="element">
          <h3><?php echo __('Tags'); ?></h3>
          <div class="element-text"><?php echo tag_string('item'); ?></div>
      </div>
      <?php endif;?>

      <!-- The following prints a citation for this item. -->
      <div id="item-citation" class="element">
          <h3><?php echo __('Citation'); ?></h3>
          <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
      </div>
         <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
    </div>

    <!-- Items metadata -->
    <div id="metadata-sidebar">
      <?php echo all_element_texts('item', array('show_element_sets' => 'Dublin Core')); ?>
    </div>


    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>

</div> <!-- End of Primary. -->

 <?php echo foot(); ?>
