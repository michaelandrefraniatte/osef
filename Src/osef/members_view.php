<html>
    <head>
        <title>All posts by member</title>
    </head>
    <body>
        <?php foreach($posts as $post): ?>
            <h1><?=$post['title']?></h1>
            <span><?=$post['date']?></span>
            <?=$post['body']?>
        <?php endforeach; ?>
    </body>
</html>