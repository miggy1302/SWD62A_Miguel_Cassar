<div class="modal-body" style="background-color: #333; color: #fff;">
    <div class="form-group">
    <label style="color: #fff;">Student Name</label>
    <input type="text" name="name" id="name" value="{{old('name', $student->name)}}" class="form-control @error('name') is-invalid @enderror" style="background-color: #444; color: #fff; border: 1px solid #555;">
    @error('name')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
    <label style="color: #fff;">Student Email</label>
    <input type="text" name="email" id="email" value="{{old('email', $student->email)}}" class="form-control @error('email') is-invalid @enderror" style="background-color: #444; color: #fff; border: 1px solid #555;">
    @error('email')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
    <label style="color: #fff;">Student Phone</label>
    <input type="text" name="phone" id="phone" value="{{old('phone', $student->phone)}}" class="form-control @error('phone') is-invalid @enderror" style="background-color: #444; color: #fff; border: 1px solid #555;">
    @error('phone')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
    <label style="color: #fff;">Student Date of Birth</label>
    <input type="date" name="dob" id="dob" value="{{ old('dob', $student->dob) }}" 
           class="form-control @error('dob') is-invalid @enderror" 
           style="background-color: #444; color: #fff; border: 1px solid #555;">
    @error('dob')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    

    <div class="form-group">
        <label for="college_id" style="color: #fff;">College</label>
        <div class="col-md-9">
            <select name="college_id" id="college_id" class="form-control @error('college_id') is-invalid @enderror" 
                    style="background-color: #444; color: #fff; border: 1px solid #555;">
                @foreach($colleges as $id => $name)
                    <option style="background-color: #444; color: #fff;" 
                            {{ $id == old('college_id', $student->college_id) ? 'selected' : '' }} value="{{ $id }}">
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @error('college_id')
            <div class="invalid-feedback" style="color: #f8d7da; background-color: #721c24; border: 1px solid #f5c6cb;">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    
    </div>
    <div class="modal-footer" style="background-color: #444;">
        <a href="{{route('students.index')}}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>

