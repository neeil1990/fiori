<?php

require_once('api/Simpla.php');
$simpla = new Simpla();

header("Content-type: text/xml; charset=UTF-8");
print '<?xml version="1.0" encoding="UTF-8"?>'."\n";
print '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'."\n";

// Главная страница
$url = $simpla->config->root_url;
$lastmod = date("Y-m-d");
print "\t<url>"."\n";
print "\t\t<loc>$url</loc>"."\n";
print "\t\t<lastmod>$lastmod</lastmod>"."\n";
print "\t</url>"."\n";

// Страницы
foreach($simpla->pages->get_pages() as $p)
{
	if($p->visible && $p->menu_id == 1)
	{
		$url = $simpla->config->root_url.'/'.esc($p->url);
		print "\t<url>"."\n";
		print "\t\t<loc>$url</loc>"."\n";
		print "\t</url>"."\n";
	}
}

// Блог
foreach($simpla->blog->get_posts(array('visible'=>1)) as $p)
{
	$url = $simpla->config->root_url.'/blog/'.esc($p->url);
	print "\t<url>"."\n";
	print "\t\t<loc>$url</loc>"."\n";
	print "\t</url>"."\n";
}

// Категории
foreach($simpla->categories->get_categories() as $c)
{
	if($c->visible)
	{
		$url = $simpla->config->root_url.'/catalog/'.esc($c->url);
		print "\t<url>"."\n";
		print "\t\t<loc>$url</loc>"."\n";
		print "\t</url>"."\n";
	}
}

// Бренды
foreach($simpla->brands->get_brands() as $b)
{
	$url = $simpla->config->root_url.'/brands/'.esc($b->url);
	print "\t<url>"."\n";
	print "\t\t<loc>$url</loc>"."\n";
	print "\t</url>"."\n";
}

// Товары
$simpla->db->query("SELECT url FROM __products WHERE visible=1");
foreach($simpla->db->results() as $p)
{
	$url = $simpla->config->root_url.'/products/'.esc($p->url);
	print "\t<url>"."\n";
	print "\t\t<loc>$url</loc>"."\n";
	
// Images
$simpla->db->query("SELECT v.price, v.id as variant_id, p.name as product_name, v.name as variant_name, v.position as variant_position, p.id as product_id, p.url, p.annotation, p.body, pc.category_id, i.filename as image, b.id, b.name
					FROM __variants v LEFT JOIN __products p ON v.product_id=p.id
					
					LEFT JOIN __products_categories pc ON p.id = pc.product_id AND pc.position=(SELECT MIN(position) FROM __products_categories WHERE product_id=p.id LIMIT 1)	
					LEFT JOIN __images i ON p.id = i.product_id AND i.position=(SELECT MIN(position) FROM __images WHERE product_id=p.id LIMIT 1)	
					LEFT JOIN __brands b ON p.brand_id = b.id 
					WHERE p.visible AND (v.stock >0 OR v.stock is NULL) GROUP BY p.id ORDER BY p.id, v.position ");
foreach($simpla->db->results() as $p)
{
$url = $simpla->design->resize_modifier($p->url, 200, 200);
print "\t<image:image>"."\n";
print "\t\t<image:loc>$url</image:loc>"."\n";
print "\t</image:image>"."\n";
}
	
	print "\t</url>"."\n";
}

print '</urlset>'."\n";

function esc($s)
{
	return(htmlspecialchars($s, ENT_QUOTES, 'UTF-8'));	
}