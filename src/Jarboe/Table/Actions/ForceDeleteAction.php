<?php

namespace Yaro\Jarboe\Table\Actions;

class ForceDeleteAction extends AbstractAction
{
    protected $ident = 'force-delete';

    public function render($model = null)
    {
        $crud = $this->crud();
        $isVisible = $crud->isSoftDeleteEnabled() && $model->trashed();

        return view('jarboe::crud.actions.force_delete', compact('crud', 'model', 'isVisible'));
    }

    public function isAllowed($model = null)
    {
        if (!$this->crud()->isSoftDeleteEnabled()) {
            return false;
        }

        return parent::isAllowed($model);
    }
}
