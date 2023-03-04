<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private Category $models;

    public function __construct()
    {
        $this->models = new Category();
    }

    public function index(): Factory|View|Application
    {
        $category = $this->models->query()
//            ->addSelect('products.*')
//            ->join('brands', 'brands.id', 'products.brand_id')
//            ->join('categories', 'categories.id', 'products.category_id')
//            ->addSelect('categories.name as categoryname')
//            ->addSelect('brands.name as brandname')
            ->get();

        return view('admin.category.category', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $category = $this->models->query()
            ->get();
        return view('admin.category.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @return RedirectResponse
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
//        $request->parent_id = $request->parent_id;
//        dd( $this->models->parent_id);
        $this->models->parent_id = $request->parent_id;

        $this->models::create($request->validated());
        return redirect()->route('quan-tri.category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(Category $category,Request $request)
    {
        $data = $this->models->query()
            ->get();


        return view('admin.category.edit', [
            'category' => $category,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|\Illuminate\Routing\Redirector|RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, $category)
    {
        $a = $this->models->find($category);
        $a->fill($request->except('_token'));
        $a->parent_id = $request->parent_id;
        $a->save();

        return redirect(route('quan-tri.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('quan-tri.category.index'));
    }
}
