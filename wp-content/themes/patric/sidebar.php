<!--<div class="sidebar-block">
<h2>eNews Archives</h2>
<ul class="vertnav">
	<li class="nav-archives"><a href="">Read Past Archives</a></li>
	
</ul>
</div> /sidebar-block -->

<div class="sidebar-block">
<h2>Browse</h2>
<ul class="vertnav">
	<?php if (!is_front_page()): ?>
		<li class="nav-all-news"><a href="/">All PATRIC eNews</a></li>
	<?php endif; ?>
	<?php 
		$args = array("title_li"=>'');
		$categories = get_categories($args);
		foreach($categories as $c):
		$current = (is_category($c->slug)) ? 'active-category ' : '';
	?>
		<li class="<?php echo $current ?>nav-<?php echo $c->slug ?>"><a href="<?php echo '/' . $c->taxonomy . '/'. $c->slug ?>"><?php echo $c->name ?></a></li>
	<?php 
		endforeach;
	?>

	<li class="nav-videos"><a href="http://enews.patricbrc.org/tutorials-and-use-cases/">Videos</a></li>
</ul>
</div>

<div class="sidebar-block">
<h2><a href="<?php echo get_page_link(87); ?>" style="text-decoration: none">Frequently Asked Questions (FAQs)</a></h2>
	<ul class="vertnav textonly">
	<?php 
		$args = array(
			'title_li' => '',
			'child_of' => '87'
		);
		wp_list_pages($args); 
	?>
	</ul>
</div>