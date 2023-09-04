<div class="form-group row">
    <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ $label }}</label>
    <div class="col-sm-10">
      <input type="{{ $type }}" step="any" class="form-control" id="{{ $name }}" value="{{ $value }}" name="{{ $name }}" {{ $modifier }}>
    </div>
</div>