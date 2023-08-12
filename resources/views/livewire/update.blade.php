<form>
    <input type="hidden" wire:model="content_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Text:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="text">
        @error('text') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Images:</label>
        <input type="file" class="form-control" id="exampleFormControlInput2" wire:model="images">
        @error('images') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Videos:</label>
        <input type="file" class="form-control" id="exampleFormControlInput2" wire:model="videos">
        @error('videos') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Price:</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="price">
        @error('price') <span class="text-danger">{{ $message }}</span>@enderror
        <p>Your name: {{ $price }}</p>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Duration:</label>
        <input type="date" class="form-control" id="exampleFormControlInput2" wire:model="duration">
        <p>Your name: {{ $duration }}</p>
        @error('duration') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
