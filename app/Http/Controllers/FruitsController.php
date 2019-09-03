<?php

namespace App\Http\Controllers;
use App\Product;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class FruitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all()->where('category', 'Fruits');
        return view('admin/fruits', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $new_name
        );

        Product::create($form_data);

        return redirect('fruits')->with('success', 'Data Added successfully');
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
        $data = Product::findOrFail($id);
        return view('admin/fruits', compact('data'));
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
        if ($request->isMethod('get')) {
            return redirect('fruits', ['image' => Product::find($id)]);
        } else {
            $rules = [
                'name' => 'required',
                'price' => 'required',
                'category' => 'required',
            ];
            $this->validate($request, $rules);
            $image = Product::find($id);
            if ($request->hasFile('image')) {
                $dir = 'images/';
                if ($image->image != '' && File::exists($dir . $image->image)) {
                    File::delete($dir . $image->image);
                    $extension = strtolower($request->file('image')->getClientOriginalExtension());
                    $fileName = str_random() . '.' . $extension;
                    $request->file('image')->move($dir, $fileName);
                    $image->image = $fileName;
                } elseif ($request->remove == 1 && File::exists('images/' . $image->image)) {
                    File::delete('images/' . $image->post_image);
                    $image->image = null;
                }

            }
        }
        $image->name = $request->name;
        $image->price = $request->price;
        $image->category = $request->category;
        $image->save();
        return redirect('fruits')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (file_exists('images/'. $product->image)) {
            unlink('images/'.$product->image);
        }

        $product->delete();
        return redirect('fruits')->with('success', 'Data is successfully deleted');
    }
}
