<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Collection;

class Many extends Group
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $fields;

    /**
     * @var mixed
     */
    public $bind;

    /**
     * @var bool
     */
    public $allowEmpty;

    /**
     * @var bool
     */
    public $showHeaderCreate;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $cols;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $footer;

    /**
     * @var bool
     */
    public $tooltip;

    /**
     * @var bool
     */
    public $heading;

    /**
     * @var mixed
     */
    public $labels;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $fields
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  bool|null  $fieldset
     * @param  bool|null  $showErrors
     * @param  mixed  $bind
     * @param  bool|null  $allowEmpty
     * @param  bool|null  $showHeaderCreate
     * @param  mixed  $cols
     * @param  mixed  $footer
     * @param  bool|null  $tooltip
     * @param  bool|null  $heading
     * @param  mixed  $labels
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $fields = null,
        $name = null,
        $label = null,
        $fieldset = null,
        $showErrors = null,
        $bind = null,
        $allowEmpty = null,
        $showHeaderCreate = null,
        $cols = null,
        $footer = null,
        $tooltip = null,
        $heading = null,
        $labels = null,
        $theme = null
    ) {
        $this->fields = Collection::make($fields)->map(function ($field, $key) {
            $field = is_array($field) ? $field : [
                'name' => is_int($key) ? $field : $key,
                'label' => is_string($field) ? $field : $key,
            ];

            data_set($field, 'label', data_get($field, 'name'), false);
            data_set($field, 'title', data_get($field, 'label'), false);

            return $field;
        });

        parent::__construct(
            $name,
            $label ?? $this->fields->count() > 1 ? $name : false,
            false,
            false,
            $fieldset,
            $showErrors,
            $theme
        );

        $this->bind = $bind;
        $this->allowEmpty = $allowEmpty;
        $this->fieldset = $fieldset ?? $this->allowEmpty ?? $this->label ?? $this->name;
        $this->showHeaderCreate = $showHeaderCreate ?? $this->allowEmpty ?? $this->fieldset && $this->fields->count() > 1;
        $this->cols = Collection::make($cols ?? $this->fields);
        $this->footer = Collection::make($footer);
        $this->tooltip = $tooltip ?? true;
        $this->heading = $heading ?? $this->allowEmpty ?? ! $this->fieldset || $this->fields->count() > 1;
        $this->labels = $labels ?? ! $this->heading;
    }

    /**
     * items.
     *
     * @return string
     */
    public function items()
    {
        return json_encode((object) $this->getFieldValue($this->bind, []));
    }
}
