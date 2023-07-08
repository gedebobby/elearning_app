@if ($action == 'add')
<div {{$attributes->merge(['class' => 'form-group'])}}>
    <label for="{{$key}}">{{$label}}</label>
    <input type="{{$type}}" class="form-control @error($key) is-invalid @enderror" id="{{$key}}" name='{{$key}}' placeholder="Masukkan {{$label}}" @if ($value !== null && $value !== "")
        value="{{$value}}"
     @else
        value="{{old($key)}}"
    @endif>
    <x-error-validation input="{{$key}}" />
</div> 
@else
<div {{$attributes->merge(['class' => 'form-group'])}}>
    <label for="{{$key}}">{{$label}}</label>
    <input type="{{$type}}" class="form-control @error($key) is-invalid @enderror" id="{{$key}}" name='{{$key}}' placeholder="Masukkan {{$label}}" value="{{$data->$key}}">
    <x-error-validation input="{{$key}}" />
</div>
@endif



