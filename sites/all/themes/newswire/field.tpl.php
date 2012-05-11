<?php // $Id$ ?>
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if (!$label_hidden) : ?>
    <?php if ($element['#view_mode']=='full') { ?>
      <h2 class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</h2>
    <?php } else { ?>
      <h3 class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</h3>
    <?php } ?>
  <?php endif; ?>
  <?php foreach ($items as $delta => $item) : ?>
    <div class="field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>><?php print render($item); ?></div>
  <?php endforeach; ?>
</div>
