<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Text</th>
                <th>Images</th>
                <th>Videos</th>
                <th>Price</th>
                <th>Duration</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Contents as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->text }}</td>
                <td><img src="" alt="Images"></td>
                <td><img src="" alt="Videos"></td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->duration }}</td>
                <td>
                <button wire:click="edit({{ $item->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
