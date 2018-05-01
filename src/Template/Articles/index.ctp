<h1>Articles</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($article->title, ['action' => 'view', $article->slug]); ?>
        </td>
        <td>
            <?php echo $article->created; ?>
        </td>
        <td>
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
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div>
    <?php
        echo $this->Html->link(
            'Create',
            ['action' => 'create']
        );
    ?>
</div>
