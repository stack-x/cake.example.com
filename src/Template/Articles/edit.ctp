<?php
echo $this->Form->create($article);
echo $this->Form->control('title');
echo $this->Form->control('body', ['rows' => '5']);
echo $this->Form->button('Update Article');
echo $this->Form->end();