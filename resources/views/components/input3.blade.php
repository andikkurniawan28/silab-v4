<div class="form-group row">
    <label for="{{ $name }}" class="col-sm-6 col-form-label">{{ $label }}</label>
    <div class="col-sm-6">
      <input type="{{ $type }}" step="any" class="form-control" id="{{ $name }}" value="{{ $value }}" name="{{ $name }}" {{ $modifier }}>
    </div>
</div>