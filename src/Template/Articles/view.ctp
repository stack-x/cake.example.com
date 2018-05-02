<?php $session = $this->request->getSession()->read(); ?>
<h1><?php echo $article->title; ?></h1>
<div>Created: <?php echo $article->created; ?></div>
<div><?php echo $article->body; ?></div>
<?php if(!empty($session['Auth']['User']['id'])): ?>
    <div>
        <?php
            echo $this->Html->link(
                'Edit',
                ['action' => 'edit', $article->id]
            );
            echo '&nbsp;|&nbsp;';
            echo $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $article->id],
                ['confirm' => __('Are you sure, you want to delete {0}?', $article->title)]
            );
        ?>
    </div>
<?php endif; ?>

