<h1><?php echo $article->title; ?></h1>
<div>Created: <?php echo $article->created; ?></div>
<div><?php echo $article->body; ?></div>
<div>
    <?php
    debug($article);
        echo $this->Html->link(
            'Edit',
            ['action' => 'edit', $article->id]
        );
    ?>
</div>

