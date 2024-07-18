@if($attributeValues)
@foreach ($attributeValues as $data)
@foreach ($data->attributeValues->attributeLabel as $attr)
<div class="mb-3 form-group col-lg-6">
    @if($attr->language_id == 1)
    <label for="commodity_type" class="form-label"> {{$attr->label}} </label>
    <input value="{{$data->value ?? ''}}" type="text" name="attribute_values[]" class="form-control attribute_values" id="attribute_values" placeholder="{{$attr->label}}">
</div>
@endif
@endforeach
@endforeach
@else
@foreach ($categoryAttribute as $data)
@foreach ($data->attributeDetails->attributeLabel as $attr)

<div class="mb-3 form-group col-lg-6">
    @if($attr->language_id == 1)
    <label for="commodity_type" class="form-label"> {{$attr->label}} </label>
    <input type="text" name="attribute_values[]" class="form-control attribute_values" id="attribute_values" placeholder="{{$attr->label}}">
</div>
@endif
@endforeach
@endforeach
@endif