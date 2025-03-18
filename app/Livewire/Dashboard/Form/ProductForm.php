<?php

namespace App\Livewire\Dashboard\Form;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Ramsey\Uuid\Uuid;

class ProductForm extends Component
{
    use WithFileUploads;
    public $name,$description,$price,$stock,$dimension,$weight,$height,$width,$material,$images =[
        ['image' => null],
        ['image' => null],
        ['image' => null],
    ];


    public function render()
    {
        return view('livewire.dashboard.form.product-form');
    }

    // function addImageForm() {
    //     $this->images[] = ['image' => null];
    // }

    // function removeImage($key) {
    //    unset($this->images[$key]);
    // }

    function save() {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'dimension' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'material' => 'required',
        ]);

        if ($this->images[0]['image'] == null) {
            $this->addError('images.0.image', 'Image is required');
        }

        foreach ($this->images as $key => $image) {
            if ($image['image'] != null) {
                $this->validate([
                    'images.'.$key.'.image' => 'image|max:1024|mimes:png,jpg,jpeg',
                ]);
            }
        }


        // save to database
        $product = new Product();
        $product->uuid = Uuid::uuid4();
        $product->name = $this->name;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->stock = $this->stock;
        $product->dimension = $this->dimension;
        $product->weight = $this->weight;
        $product->height = $this->height;
        $product->material = $this->material;
        $product->save();

        // save images
        foreach ($this->images as $key) {
            if ($key['image'] != null) {
                $imageName = Uuid::uuid4().'.'.$key['image']->extension();
               $path =  $key['image']->storeAs('product', $imageName,'s3');



                $product->images()->create([
                    'path' => Storage::disk('s3')->url($path)
                ]);
            }
        }

        return redirect()->route('admin.product')->with('success', 'Product has been saved');
    }
}
