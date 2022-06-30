<?php

namespace App\Actions;

use JetBrains\PhpStorm\ArrayShape;
use TCG\Voyager\Actions\AbstractAction;

class TokenActions extends AbstractAction
{
    public function getTitle(): string
    {
        return 'Token';
    }

    public function getIcon(): string
    {
        return 'voyager-eye';
    }

    public function getPolicy(): string
    {
        return 'read';
    }

    #[ArrayShape(['class' => "string", 'style' => "string"])]
    public function getAttributes(): array
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
            'style' => 'margin-right: 5px;'
        ];
    }

    public function getDefaultRoute(): string
    {
        return route('voyager.'.$this->dataType->slug.'.tokens.index', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType(): string
    {
        return $this->dataType->slug === 'services';
    }
}
