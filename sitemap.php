<?php

require_once('api/Simpla.php');
$simpla = new Simpla();

header("Content-type: text/xml; charset=UTF-8");
print '<?xml version="1.0" encoding="UTF-8"?>'."\n";
print '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

// Главная страница
$url = $simpla->config->root_url;
$lastmod = date("Y-m-d");

print "\t<sitemap>"."\n";
print "\t\t<loc>$url/sitemap-pages.xml</loc>"."\n";
print "\t\t<lastmod>$lastmod</lastmod>"."\n";
print "\t</sitemap>"."\n";

print "\t<sitemap>"."\n";
print "\t\t<loc>$url/sitemap-blogs.xml</loc>"."\n";
print "\t\t<lastmod>$lastmod</lastmod>"."\n";
print "\t</sitemap>"."\n";

print "\t<sitemap>"."\n";
print "\t\t<loc>$url/sitemap-categories.xml</loc>"."\n";
print "\t\t<lastmod>$lastmod</lastmod>"."\n";
print "\t</sitemap>"."\n";

print "\t<sitemap>"."\n";
print "\t\t<loc>$url/sitemap-brands.xml</loc>"."\n";
print "\t\t<lastmod>$lastmod</lastmod>"."\n";
print "\t</sitemap>"."\n";

print "\t<sitemap>"."\n";
print "\t\t<loc>$url/sitemap-products.xml</loc>"."\n";
print "\t\t<lastmod>$lastmod</lastmod>"."\n";
print "\t</sitemap>"."\n";


print '</sitemapindex>'."\n";

function esc($s)
{
    return(htmlspecialchars($s, ENT_QUOTES, 'UTF-8'));
}