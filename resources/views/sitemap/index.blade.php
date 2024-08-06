<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if($category != null)
    <sitemap>
        <loc>{{ route('sitemap.category.index') }}</loc>
        <lastmod>{{ $category->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    @endif
    @if($product != null)
    <sitemap>
        <loc>{{ route('sitemap.product.index') }}</loc>
        <lastmod>{{ $product->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    @endif
    @if($blog != null)
    <sitemap>
        <loc>{{ route('sitemap.blog.index') }}</loc>
        <lastmod>{{ $blog->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    @endif
    <sitemap>
        <loc>{{ route('sitemap.page.index') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
</sitemapindex>