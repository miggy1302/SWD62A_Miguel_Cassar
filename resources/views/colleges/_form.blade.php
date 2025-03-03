<div class="modal-body" style="background-color: #333; color: #fff;">
    <div class="form-group">
      <label style="color: #fff;">College Name</label>
      <input type="text" name="name" id="name" value="{{old('name', $college->name)}}" class="form-control @error('name') is-invalid @enderror" style="background-color: #444; color: #fff; border: 1px solid #555;">
      @error('name')
      <div class="invalid-feedback">
          {{$message}}
      </div>
      @enderror
      <label style="color: #fff;">College Address</label>
      <input type="text" name="address" id="address" value="{{old('address', $college->address)}}" class="form-control @error('address') is-invalid @enderror" style="background-color: #444; color: #fff; border: 1px solid #555;">
      @error('address')
      <div class="invalid-feedback">
          {{$message}}
      </div>
      @enderror
    </div>
  <div class="modal-footer" style="background-color: #444;">
    <a href="{{route('colleges.index')}}" class="btn btn-outline-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</div>
  