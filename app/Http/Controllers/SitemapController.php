<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Corcel\Model\Post;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
{
    $sitemap = Sitemap::create();

    $sitemap->add(Url::create('/')->setPriority(1.0));
    $sitemap->add(Url::create('/about-us'));
    $sitemap->add(Url::create('/blog'));
    $sitemap->add(Url::create('/contact-us'));
    $sitemap->add(Url::create('/shipping-return'));
    $sitemap->add(Url::create('/privacy-policy'));
    $sitemap->add(Url::create('/conditions'));
    $sitemap->add(Url::create('/instock'));
    $sitemap->add(Url::create('/event/mothers-day'));
    $sitemap->add(Url::create('/event/weekly-sales'));
    $sitemap->add(Url::create('/event/clearance-store'));
    $sitemap->add(Url::create('/event/gift-for-him'));
    $sitemap->add(Url::create('/category/featured'));
    $sitemap->add(Url::create('/category/trending'));
    $sitemap->add(Url::create('/category/bestseller'));

    $categories = Category::where('is_active', 1)->get();

    foreach ($categories as $category) {
        $sitemap->add(Url::create("/product-category/{$category->slug}")
            ->setLastModificationDate($category->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));
    }

    $products = Product::get();

    foreach ($products as $product) {
        $sitemap->add(Url::create("/product/{$product->slug}")
            ->setLastModificationDate($product->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));
    }

    $blogs = Post::type('post')->published()->get();

    foreach ($blogs as $blog) {
        $sitemap->add(Url::create("https://blog.artistrybazaar.com/{$blog->post_name}")
            ->setLastModificationDate($blog->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));
    }

    $sitemap->writeToFile(public_path('sitemap.xml'));

    return response()->json(['message' => 'Sitemap generated successfully']);
}

}