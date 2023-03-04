<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    private Product $models;

    public function __construct()
    {
        $this->models = new Product();
    }


    public function index()
    {
        $product = $this->models
            ->addSelect('products.*')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('brands', 'brands.id', 'products.brand_id')
            ->addSelect('categories.name as categoryname')
            ->addSelect('brands.name as brandname')
            ->paginate();
//        $product = DB::table('products')
//            ->select('categories.name as categoryname')
//            ->join('categories', 'products.category_id', '=', 'categories.id')
//            ->select('brands.name as brandname')
//            ->join('brands', 'products.brand_id', '=', 'brands.id')
//            ->get();

        return view('admin.product.product', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $category = Category::all()->toArray();
        $brand = Brand::all()->toArray();

        return view('admin.product.create',[
            'category'=>$category,
            'brand'=>$brand,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request )
    {
        $path = Storage::disk('public')->putFile('avatar',$request->file('img'));
        $arr = $request->validated();
        $arr['img'] = $path;
        $this->models->create($arr);
        return redirect()->route('quan-tri.product.index');
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
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'data' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateProductRequest $request, $product)
    {
        $obj = $this->models->find($product);
        $obj->fill($request->except('_token'));
        $obj->save();
        return redirect(route('quan-tri.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Product $product)
    {
        // dd($product);
        //        $this->models->query()->where('id', $product)->delete();
        //        $this->models->find($product)->delete();
        $product->delete();
        return redirect(route('quan-tri.product.index'));
    }
}
