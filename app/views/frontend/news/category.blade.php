@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ isset($category->name) ? $category->name : 'Tin tức - Cẩm nang' }} ::
@parent
@stop

{{-- Page content --}}
@section('content')
		<!-- START PRIMARY SECTION -->
<div id="primary" class="inner group">
	<div class="layout-sidebar-right group">
		<!-- START CONTENT -->
		<div id="content" class="blog group">
			<div class="clear"></div>
			<div class="posts group">
				<div class="posts_space"></div>
				<div id="post-105" class="post-105 post type-post status-publish format-standard hentry category-glasses category-uncategorized category-vintage hentry-post group blog-small">
					<div class="post_content group">
						<div class="post_header">
							<img width="295" height="295" src="images/blog/blog3-295x295.jpg" class="attachment-blog_small wp-post-image" alt="blog3" title="blog3" />
							<div class="post_meta">
								<div class="post_date">
									<span class="day">04</span>
									<span class="month">Sep</span>
									<span class="year">2011</span>
								</div>
								<div class="post_comments"><a href="#" title="Comment on -50% on all vintage glasses, enjoy it">No comments</a></div>
								<div class="post_twitter"><a href="#">Tweet this</a></div>
								<div class="post_author">by <a href="#" title="Posts by nando" rel="author">nando</a></div>
							</div>
						</div>
						<div class="post_title">
							<h2><a href="article.html" title="Permalink to -50% on all vintage glasses, enjoy it" rel="bookmark">-50% on all vintage glasses, enjoy it</a></h2>
						</div>
						<p>Phasellus gravida augue sit amet leo dapibus a congue velit semper. Aliquam erat volutpat. Vivamus sed nisl erat. Aliquam aliquet mi a massa facilisis sit amet pharetra turpis porta. Fusce vulputate porttitor erat quis consequat. <strong>Cras auctor sagittis</strong> risus. Maecenas vel orci risus, et rutrum erat. Donec varius neque tristique felis aliquam sodales. Donec viverra, turpis quis blandit eleifend, neque nisi bibendum ligula, ut ultrices nisi orci ac lorem.</p>
						<p> <a href="article.html" class="more-link">Read more</a></p>
					</div>
					<div class="post_ group">
					</div>
				</div>
				<div id="post-106" class="post-106 post type-post status-publish format-standard hentry category-e-commerce category-uncategorized category-wordpress hentry-post group blog-small">
					<div class="post_content group">
						<div class="post_header">
							<img width="295" height="295" src="images/blog/blog1-295x295.jpg" class="attachment-blog_small wp-post-image" alt="blog1" title="blog1" />
							<div class="post_meta">
								<div class="post_date">
									<span class="day">12</span>
									<span class="month">Aug</span>
									<span class="year">2011</span>
								</div>
								<div class="post_comments"><a href="#" title="Comment on Sommerce &ndash; a beautiful ecommerce solution">No comments</a></div>
								<div class="post_twitter"><a href="#">Tweet this</a></div>
								<div class="post_author">by <a href="#" title="Posts by nando" rel="author">nando</a></div>
							</div>
						</div>
						<div class="post_title">
							<h2><a href="article.html" title="Permalink to Sommerce &ndash; a beautiful ecommerce solution" rel="bookmark">Sommerce &#8211; a beautiful ecommerce solution</a></h2>
						</div>
						<p>Etiam semper magna sit amet augue blandit vel cursus erat egestas. Aenean venenatis tincidunt diam non fermentum. <a href="#">Phasellus volutpat</a> massa vitae justo varius porta. Morbi congue ullamcorper risus, eget euismod ligula feugiat non.</p>
						<p>Sed ac egestas ipsum. Nunc in ante est, vitae congue dui.</p>
						<p> <a href="article.html" class="more-link">Read more</a></p>
					</div>
					<div class="post_ group">
					</div>
				</div>
			</div>
			<div class="general-pagination group"><a href="#" class="selected">1</a><a href="#">2</a><a href=#">&rsaquo;</a></div>
		</div>
		<!-- END CONTENT -->
		<!-- START SIDEBAR -->
		<div id="sidebar" class="blog group">
			<div id="search-3" class="widget-1 widget-first widget widget_search">
				<h3>Search</h3>
				<form role="search" method="get" id="searchform" action="#" class="group">
					<div><label class="screen-reader-text" for="s">Search</label>
						<input type="text" value="" name="s" id="s" />
						<input type="submit" id="searchsubmit" value="Search" />
						<input type="hidden" name="post_type" value="post" />
					</div>
				</form>
			</div>
			<div id="popular-posts-3" class="widget-2 widget popular-posts">
				<h3>Popular Posts</h3>
				<div class="recent-post group">
					<div class="hentry-post group">
						<div class="thumb-img"><a href="article.html"><img width="55" height="55" src="images/blog/blog2-55x55.jpg" class="attachment-thumb_recentposts wp-post-image" alt="blog2" title="blog2" /></a></div>
						<a href="article.html" title="Looking for a nice theme for your shop?" class="title">Looking for a nice theme for your shop?</a>
						<p class="post-date">July 26, 2011</p>
					</div>
					<div class="hentry-post group">
						<div class="thumb-img"><a href="article.html"><img width="55" height="55" src="images/blog/blog3-55x55.jpg" class="attachment-thumb_recentposts wp-post-image" alt="blog3" title="blog3" /></a></div>
						<a href="article.html" title="-50% on all vintage glasses, enjoy it" class="title">-50% on all vintage glasses, enjoy it</a>
						<p class="post-date">September 4, 2011</p>
					</div>
					<div class="hentry-post group">
						<div class="thumb-img"><a href="article.html"><img width="55" height="55" src="images/blog/blog1-55x55.jpg" class="attachment-thumb_recentposts wp-post-image" alt="blog1" title="blog1" /></a></div>
						<a href="article.html" title="Sommerce &ndash; a beautiful ecommerce solution" class="title">Sommerce &#8211; a beautiful ecommerce solution</a>
						<p class="post-date">August 12, 2011</p>
					</div>
				</div>
			</div>
			<div id="almost-all-categories-3" class="widget-3 widget almost-all-categories">
				<h3>Categories</h3>
				<ul id="almost_all_categories_widget">
					<li>No categories</li>
				</ul>
			</div>
			<div id="archives-3" class="widget-4 widget-last widget widget_archive">
				<h3>Archives</h3>
				<ul>
					<li><a href="#" title="September 2011">September 2011</a>&nbsp;(1)</li>
					<li><a href="#" title="August 2011">August 2011</a>&nbsp;(1)</li>
					<li><a href="#" title="July 2011">July 2011</a>&nbsp;(1)</li>
				</ul>
			</div>
		</div>
		<!-- END SIDEBAR -->
	</div>
	<!-- START EXTRA CONTENT -->
	<!-- END EXTRA CONTENT -->
</div>
<!-- END PRIMARY SECTION -->
@stop
