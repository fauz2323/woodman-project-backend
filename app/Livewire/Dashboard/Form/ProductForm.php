<?php

namespace App\Livewire\Dashboard\Form;

use App\Models\Product;
use App\Services\FileServices;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Ramsey\Uuid\Uuid;

class ProductForm extends Component
{
    use WithFileUploads;
    public $name, $description, $price, $stock, $dimension, $weight, $height, $width, $material, $images = [
        ['image' => null],
        ['image' => null],
        ['image' => null],
    ], $isEdited = false, $listImages = [], $uuid;

    public function mount($id = null)
    {
        if ($id != null) {
            $product = Product::find($id);
            if ($product) {
                $this->uuid = $product->uuid;
                $this->name = $product->name;
                $this->description = $product->description;
                $this->price = $product->price;
                $this->stock = $product->stock;
                $this->dimension = $product->dimension;
                $this->weight = $product->weight;
                $this->height = $product->height;
                $this->material = $product->material;

                foreach ($product->images as $key => $image) {
                    if ($image) {
                        $this->listImages[] = Storage::url($image->path);
                    }
                }
                $this->isEdited = true;
            }
        }
    }

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

    public function updatedName($value)
    {
        // dd($value);
    }

    public function save()
    {


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


        $saveFileService = new FileServices();

        if ($this->isEdited == false) {
            if ($this->images[0]['image'] == null) {
                $this->addError('images.0.image', 'Image is required');
                return;
            }
        } else {
            if ($this->images[0]['image'] != null) {
                $product = Product::where('uuid', $this->uuid)->first();
                $product->images()->delete();
            }
        }

        foreach ($this->images as $key => $image) {
            if ($image['image'] != null) {
                $this->validate([
                    'images.' . $key . '.image' => 'image|max:1024|mimes:png,jpg,jpeg',
                ]);
            }
        }

        // save to database
        if ($this->isEdited == false) {
            $product = new Product();
            $product->uuid = Uuid::uuid4();
        }

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
                $path = $saveFileService->saveFile($key['image']);

                $product->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.product')->with('success', 'Product has been saved');
    }
}
