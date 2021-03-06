
<label class="label">{{ $field->title() }}</label>

<label class="select state-disabled {{ $field->isMultiple() ? 'select-multiple' : '' }}">
    <select disabled="disabled" {{ $field->isMultiple() ? 'multiple' : '' }} class="custom-scroll">
        @if ($field->isAjax() && $field->isRelationField() && $field->isSelect2Type())
            @foreach ($field->getSelectedOptions($model) as $option => $title)
                <option selected value="{{ $option }}">{{ $title }}</option>
            @endforeach
        @else
            @if ($field->isGroupedRelation())
                @foreach ($field->getGroupedOptions() as $group => $options)
                    <optgroup label="{{ $group }}">
                        @foreach ($options as $option => $title)
                            <option {{ $field->isCurrentOption($option, $model, $loop->index) ? 'selected' : '' }} value="{{ $option }}">{{ $title }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            @else
                @if ($field->isNullable())
                    <option value="">{{ __('jarboe::fields.select.none') }}</option>
                @endif
                @foreach ($field->getOptions() as $option => $title)
                    <option {{ $field->isCurrentOption($option, $model) ? 'selected' : '' }} value="{{ $option }}">{{ $title }}</option>
                @endforeach
            @endif
        @endif
    </select>

    @if ($field->isSelect2Type() || !$field->isMultiple())
        <i></i>
    @endif
</label>
