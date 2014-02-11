

<h1><?php echo h($item['Item']['title']);?> (<?php echo h($item['Item']['year']); ?>)</h1>

<p> Description: <?php echo h($item['Item']['description']);?> </p>
<p> Type: <?php echo h($item['Category']['name']);?> </p>
<?php echo $this->element('quote_block',array('quote'=>'To infinity and beyond'));
?>
<div> <?php echo h($item['Item']['year']);?></div>
