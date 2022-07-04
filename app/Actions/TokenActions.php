<?php

namespace App\Actions;

use JetBrains\PhpStorm\ArrayShape;
use TCG\Voyager\Actions\AbstractAction;

class TokenActions extends AbstractAction
{
    public function getTitle(): string
    {
        return 'Tokens';
    }

    public function getIcon(): string
    {
        return 'voyager-plug';
    }

    public function getPolicy(): string
    {
        return 'read';
    }

    #[ArrayShape(['class' => "string", 'style' => "string"])]
    public function getAttributes(): array
    {
        return [
            'class' => 'btn btn-sm btn-dark pull-right',
            'style' => 'margin-right: 5px;'
        ];
    }

    public function getDefaultRoute(): string
    {
        return route('voyager.'.$this->dataType->slug.'.tokens.index', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType(): bool
    {
        return $this->dataType->slug === 'services';
    }
}
