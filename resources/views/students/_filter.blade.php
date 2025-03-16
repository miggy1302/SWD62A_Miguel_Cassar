<form method="GET" action="{{ route('students.index') }}">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <select id="filter_college_id" name="college_id" class="custom-select" 
                                style="background-color: #444; color: #fff; border: 1px solid #555;" 
                                onchange="this.form.submit()">
                            @foreach ($colleges as $id => $name)
                                <option style="background-color: #444; color: #fff;" 
                                        {{ $id == request('college_id') ? 'selected' : '' }} 
                                        value="{{ $id }}">
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
