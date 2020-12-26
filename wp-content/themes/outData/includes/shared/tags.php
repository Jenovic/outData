<span class="icon is-large fas fa-2x"><i class="fas fa-tag"></i></span>
<?php $terms = get_terms('article_cat'); ?>
<?php foreach ($terms as $term) : ?>
	<a class="button button--white button--tag" href="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
<?php endforeach; ?>

