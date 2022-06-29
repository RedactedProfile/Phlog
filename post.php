<?php
require_once './src/bootstrap.php';

$request = \Helpers\Request::Get();

require_once './src/Repositories/PostRepository.php';

$post = \Repositories\PostRepository::getPost($request->getQuery()->getString('id'));

?>

<?php require_once __DIR__ . '/template_header.php'; ?>

<a href="/">Go Back</a> <br />

<h1><?php echo $post->getTitle(); ?></h1>
<hr />

<article>
    <p><?php echo $post->getContent(); ?></p>
</article>


<?php require_once __DIR__ . '/template_footer.php'; ?>
