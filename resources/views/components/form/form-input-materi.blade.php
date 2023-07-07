@if ($action == 'add')
<div class="form-group">
    <label for="{{$key}}">{{$label}}</label>
    <input type="text" class="form-control @error($key) is-invalid @enderror" id="{{$key}}" name='{{$key}}' placeholder="Masukkan {{$label}}" value="{{old($data->$key)}}">
    <x-error-validation input="{{$key}}" />
</div>
@else
<div class="form-group">
    <label for="{{$key}}">{{$label}}</label>
    <input type="text" class="form-control @error($key) is-invalid @enderror" id="{{$key}}" name='{{$key}}' placeholder="Masukkan {{$label}}" value="{{$data->$key}}">
    <x-error-validation input="{{$key}}" />
</div>
@endif