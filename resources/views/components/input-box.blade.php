<div>
    <div class="col-md-12">
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>

        <input
            type="{{ $type }}"
            class="
                @if($type == 'checkbox') form-check-input @else form-control @endif
                @error($name) is-invalid @enderror
            "
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
            {{ $required ? 'required' : '' }}
            {{ $pattern ? "pattern=$pattern" : '' }}
            {{ $checked ? 'checked' : '' }}
        >

        @error($name)
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
