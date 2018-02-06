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

// Блог
foreach($simpla->blog->get_posts(array('visible'=>1)) as $p)
{
    $url = $simpla->config->root_url.'/blog/'.esc($p->url);
    print "\t<url>"."\n";
    print "\t\t<loc>$url</loc>"."\n";
    print "\t</url>"."\n";
}

print '</urlset>'."\n";

function esc($s)
{
    return(htmlspecialchars($s, ENT_QUOTES, 'UTF-8'));
}