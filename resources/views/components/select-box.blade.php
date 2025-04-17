<div>
    <div class="col-md-12">
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>

        <select id="{{ $id }}" name="{{ $name }}"
            class="form-control @error($name) is-invalid @enderror"
            {{ $required ? 'required' : '' }}>

            <option value="">-- Select {{ $label }} --</option> <!-- Optional placeholder -->

            @foreach ($options as $key => $option)
                <option value="{{ $key }}" {{ old($name, $selected) == $key ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>

        @error($name)
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
