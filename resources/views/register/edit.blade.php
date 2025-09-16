
<!-- Modal -->
<div class="modal fade" id="edit{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit User {{$item->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/user/update') .'/'. $item->id }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
                <div class="mb-3">

   <label for="name" class="form-label">Nama Lengkap</label>
        <input id="name" type="text" 
               class="form-control @error('name') is-invalid @enderror" 
               name="name" value="{{ $item->name }}" required autofocus>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input id="email" type="email" 
               class="form-control @error('email') is-invalid @enderror" 
               name="email" value="{{ $item->email }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password -->
    

    <!-- Confirm Password -->
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button></form>

      </div>
    </div>
  </div>
</div>