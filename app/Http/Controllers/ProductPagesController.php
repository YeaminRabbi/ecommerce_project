<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Product;
use App\Brand;
use App\Color;
use App\Category;
use App\Size;
use App\SubCategory;

use App\Attribute;
class ProductPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $products = Product::all();
        return view ('pages.products.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $sizes = Size::all();
        $colors = Color::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands       = Brand::all();
       
        return view('pages.products.create',['sizes'=>$sizes,'colors'=>$colors,
     
        'categories'=>$categories,'subCategories'=>$subCategories,'brands'=>$brands]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //

        $this->validate($req,[
            'product_title' => 'required|string',
            'slug' => 'required|string',
            'unit_price'=>'required|string',
            'description'=>'required|string',
            'specification'=>'required|string',
            'summary'=>'required|string',
            'category_id'=>'required|string',
            
            'subcategory_id'=>'required|string',
           

        ]);

        

        if($req->hasFile('image'))
        {
            $prod = new Product;
            $image= $req->file('image');
            
            Storage::putFile('public/img/',$image);
            $prod->image ="storage/img/".$image->hashName();

           
            $prod->product_title = $req->product_title;
            $prod->slug = $req->slug;
            $prod->category_id = $req->category_id;
            $prod->subcategory_id = $req->subcategory_id;
            $prod->brand_id = $req->brand_id;
            $prod->unit_price = $req->unit_price;
            $prod->summary = $req->summary;
            $prod->description = $req->description;
            $prod->specification = $req->specification;

           
            $prod->save();

            foreach ($req->color_id as $key => $value) {
                $attribute = new Attribute;
                $attribute->product_id = $prod->id;
                $attribute->size_id = $req->size_id[$key];
                $attribute->color_id = $value;
                $attribute->quantity = $req->quantity[$key];
                $attribute->save();
            }  
        }

        // if($req->hasFile('images')){

        //     $images = $req->file('images');

        //     $new_location = 'gallery/'
        //         . Carbon::now()->format('Y/m/')
        //         . $prod->id .'/';

        //     File::makeDirectory($new_location, $mode=0777, true, true);

        //     foreach ($images as $img) {
        //         $img_ext = Str::random(10).'.'.$img->getClientOriginalExtension();
        //         Image::make($img)->save(public_path($new_location. $img_ext));

        //         $gallery = new Gallery;
        //         $gallery->product_id = $prod->id;
        //         $gallery->images = $img_ext;
        //         $gallery->save();
        //     }
            
        // }

        return redirect()->route('admin.products.create')->with('success','New Product Created Successfully');



       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $products = Product::find($id);
        return view('pages.products.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $products = Product::find($id);
        $products->delete();
        return redirect()->route('admin.products.list')->with('success',"Product Informations Deleted Successfully");
    }
}
