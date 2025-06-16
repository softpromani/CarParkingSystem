<div class="col-md-12 mb-2">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>

    <select id="{{ $id }}" name="{{ $name }}[]"
        class="form-control @error($name) is-invalid @enderror"
        multiple {{ $required ? 'required' : '' }}>

        @foreach ($options as $key => $option)
            <option value="{{ $key }}" {{ in_array($key, old($name, $selected)) ? 'selected' : '' }}>
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
