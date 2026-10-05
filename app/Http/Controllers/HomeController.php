<?php

namespace App\Http\Controllers;

use App\Support\CategoryCatalog;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Home', [
            'categories' => CategoryCatalog::all(),
            'faqs' => CategoryCatalog::faqs(),
        ]);
    }

    public function show(string $category): Response
    {
        $item = CategoryCatalog::find($category);

        abort_if($item === null, 404);

        return Inertia::render('Category', [
            'category' => $item,
            'categories' => CategoryCatalog::all(),
            'faqs' => CategoryCatalog::faqs(),
        ]);
    }
}
