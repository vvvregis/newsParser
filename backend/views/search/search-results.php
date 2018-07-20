<?php if ($results) :?>
    <?php foreach ($results as $result) :?>
        <p><a target="_blank" href="/admin/news/update?id=<?php echo $result['id']?>"><?php echo $result['title']?></a></p>
    <?php endforeach;?>
<?php else :?>
    <p>По данному запросу результатов не найдено</p>
<?php endif;?>
