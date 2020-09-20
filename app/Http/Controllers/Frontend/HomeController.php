<?php


namespace App\Http\Controllers\Frontend;


use App\Models\Category;
use App\Models\Product;
use App\Services\Categories\CategoryService;
use App\Services\Pages\PageService;
use App\Services\Products\ProductService;

class HomeController extends BaseController
{
    /**
     * @var PageService
     */
    private $pageService;
    private $categoryService;
    private $productService;

    /**
     * HomeController constructor.
     * @param PageService $pageService
     * @param CategoryService $categoryService
     * @param ProductService $productService
     */
    public function __construct(PageService $pageService, CategoryService $categoryService, ProductService $productService)
    {
        $this->pageService = $pageService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    /**
     * @param false $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pageForSlug($slug = false)
    {
        $pages = $this->pageService->getAll()->where('status', '=', 1);

        if ($slug){
            $currentPage = $pages->where('slug', '=', $slug)->first();

            if (isset($currentPage)){
                return view("frontend.pages.$slug.index", compact('currentPage'));
            } else {
                $currentPage = $pages->where('slug', '=', 404)->first();
                return view("frontend.pages.not-found.index", compact('currentPage'));
            }
        } else {
            return view("frontend.index");
        }
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catalog(Category $category)
    {
        $currentLocale = getCurrentLocale();

        return view("frontend.pages.products.catalog", compact('category', 'currentLocale'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categories(Category $category)
    {
        $currentLocale = getCurrentLocale();

        return view("frontend.pages.products.categories", compact('category', 'currentLocale'));
    }

    public function products(Product $product)
    {
        $currentLocale = getCurrentLocale();

        return view("frontend.pages.products.offer.index", compact('product', 'currentLocale'));
    }

}
