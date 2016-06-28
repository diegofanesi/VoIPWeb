<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php foreach ($list as $item) : ?>
<span>
<strong><?php echo $item->title ?></strong>
:
<?php echo $item->data ?>
</span>
<?php endforeach; ?>

