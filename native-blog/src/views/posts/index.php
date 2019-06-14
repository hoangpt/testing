<p>Here is a list of all posts:</p>

<?php foreach($posts as $post) { ?>
  <p>
    <?php echo $post->getUserId(); ?>
    <a href='?controller=post&action=show&id=<?php echo $post->getId(); ?>'><?php echo $post->getTitle(); ?></a>
  </p>
<?php } ?>