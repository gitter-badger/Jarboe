<?php

namespace Yaro\Jarboe\Table\Fields;

use Illuminate\Http\Request;
use Yaro\Jarboe\Table\Fields\Traits\Clipboard;
use Yaro\Jarboe\Table\Fields\Traits\Inline;
use Yaro\Jarboe\Table\Fields\Traits\Nullable;
use Yaro\Jarboe\Table\Fields\Traits\Orderable;
use Yaro\Jarboe\Table\Fields\Traits\Placeholder;
use Yaro\Jarboe\Table\Fields\Traits\Tooltip;

class Number extends AbstractField
{
    use Orderable;
    use Nullable;
    use Tooltip;
    use Clipboard;
    use Inline;
    use Placeholder;

    public function value(Request $request)
    {
        $value = $request->get($this->name());
        if (!$value && $value !== "0" && $this->isNullable()) {
            return null;
        }

        return is_null($value) ? 0 : $value;
    }

    public function getListValue($model)
    {
        return view('jarboe::crud.fields.number.list', [
            'model' => $model,
            'field' => $this,
        ])->render();
    }

    public function getEditFormValue($model)
    {
        $template = $this->isReadonly() ? 'readonly' : 'edit';

        return view('jarboe::crud.fields.number.'. $template, [
            'model' => $model,
            'field' => $this,
        ])->render();
    }

    public function getCreateFormValue()
    {
        return view('jarboe::crud.fields.number.create', [
            'field' => $this,
        ])->render();
    }
}
