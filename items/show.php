<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>
    <div id="main-block">

      <div id="viewer-block">
          <?php if (metadata('item', array('Item Type Metadata', 'Player'))): ?> 
              <?php echo all_element_texts('item', array('show_element_sets' => 'Item Type Metadata')); ?>
          
          <?php elseif (metadata('item', array('Item Type Metadata', 'Text'))): ?>
              <?php echo files_for_item(); ?>
              <?php echo all_element_texts('item', array('show_element_sets' => 'Item Type Metadata')); ?>
          <?php else: ?>
              <?php if (metadata('item', 'has files')): ?>
                  <?php echo item_image_gallery(array('link'=>array('data-lightbox'=>'lightbox')), 'fullsize'); ?>
              <?php endif; ?>
              <?php echo all_element_texts('item', array('show_element_sets' => 'Item Type Metadata')); ?>
          <?php endif; ?>

      </div>

      <!-- The following prints a citation for this item. -->
      <div id="item-citation" class="element">
          <h3><?php echo __('Citation'); ?></h3>
          <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
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

      <!-- Item files -->

      <?php if (metadata('item', 'has files')): ?>
        <div id="collection" class="element">
          <h3><?php echo __('Files for Download'); ?></h3>
          <div class="element-text">
              <ul>
                  <?php foreach (loop('files', $this->item->Files) as $file): ?>
                      <li><?php echo link_to_file_show(array('class'=>'show', 'title'=>__('View File Metadata'))); ?></li>
                  <?php endforeach; ?>
              </ul>         
          </div>
        </div>
      <?php endif; ?>
           
           <? //php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
      </div>


    <!-- Items metadata -->
    <div id="metadata-sidebar" class="accent-background">
      <?php echo all_element_texts('item', array('show_element_sets' => 'Dublin Core')); ?>
    </div>


    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>

</div> <!-- End of Primary. -->
<?php echo js_tag('lightbox', 'javascripts/vendor'); ?>
 <?php echo foot(); ?>
