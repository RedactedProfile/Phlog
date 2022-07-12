<?php require_once __DIR__ . '/_header.php'; ?>

    <a href="/">Go Back</a> <br />

    <h1><?php echo $post->getTitle(); ?></h1>
    <hr />

    <article>
        <p><?php echo $post->getContent(); ?></p>
    </article>


<?php require_once __DIR__ . '/_footer.php'; ?>
