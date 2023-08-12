<?php

namespace App\Http\Livewire;

use App\Models\Content;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class Contents extends Component
{
    public $Contents, $text, $images, $videos, $price, $duration,$content_id;
    public $updateMode = false;

    public function render()
    {
        $this->Contents = Content::all();
        return view('livewire.contents');
    }

    private function resetInputFields(){
        $this->text = '';
        $this->images = '';
        $this->videos = '';
        $this->price = '';
        $this->duration = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'text' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'videos'=>'required',
            'price'=>'required',
            'duration'=>'required|date',
        ]);

        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }

        Content::create($validatedDate);

        session()->flash('message', 'Post Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $Contents = Content::findOrFail($id);
        $this->content_id = $id;
        $this->text = $Contents->text;
        $this->images = $Contents->images;
        $this->videos = $Contents->videos;
        $this->price = $Contents->price;
        $this->duration = $Contents->duration;

        $this->updateMode = true;
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'text' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'videos'=>'required',
            'price'=>'required',
            'duration'=>'required|date',
        ]);

        $content = Content::find($this->content_id);
        $content->update([
            'text' => $this->text,
            // 'image' => $this->image,
            // 'videos' => $this->videos,
            'price' => $this->price,
            'duration' => $this->duration,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Content::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
