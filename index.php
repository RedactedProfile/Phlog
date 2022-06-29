<?php
require_once './src/bootstrap.php';

require_once './src/Repositories/PostRepository.php';

$posts = \Repositories\PostRepository::getPosts();

?>

<?php require_once __DIR__ . '/template_header.php'; ?>

<h1>My Phlog</h1>
<hr />

<?php foreach($posts as $post): ?>
<article>
    <h3><a href="post.php?id=<?php echo $post->getId(); ?>"><?php echo $post->getTitle(); ?></a></h3>
    <p><?php echo $post->getSummary(); ?></p>
    <p>Posted on <?php echo (new DateTime($post->getDatePublished()))->format('M d, Y H:i:s'); ?></p>
</article>
<?php endforeach; ?>

<?php require_once __DIR__ . '/template_footer.php'; ?>
