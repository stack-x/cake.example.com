<?php $session = $this->request->getSession()->read(); ?>
<h1>Articles</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <?php if(!empty($session['Auth']['User']['id'])): ?>
            <th>Action</th>
        <?php endif; ?>
    </tr>

    <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($article->title, ['action' => 'view', $article->slug]); ?>
        </td>
        <td>
            <?php echo $article->created; ?>
        </td>
        <?php if(!empty($session['Auth']['User']['id'])): ?>
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
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
</table>

<?php if(!empty($session['Auth']['User']['id'])): ?>
    <div>
        <?php
            echo $this->Html->link(
                'Create',
                ['action' => 'create']
            );
        ?>
    </div>
<?php endif; ?>
