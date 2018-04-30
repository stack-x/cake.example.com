<h1>Articles</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($article->title, ['action' => 'view', $article->slug]); ?>
        </td>
        <td>
            <?php echo $article->created; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
