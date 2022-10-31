<?php

namespace TALLKit\Components\Forms;

class InputImage extends Input
{
    /**
     * @var string|bool
     */
    public $accept;

    /**
     * @var string|null
     */
    public $empty;

    /**
     * @var string|null
     */
    public $emptyText;

    /**
     * @var string|null
     */
    public $emptyIcon;

    /**
     * @var string|null
     */
    public $loading;

    /**
     * @var string|null
     */
    public $loadingIcon;

    /**
     * @var string|null
     */
    public $error;

    /**
     * @var string|null
     */
    public $errorText;

    /**
     * @var string|null
     */
    public $errorIcon;

    /**
     * @var string|null
     */
    public $edit;

    /**
     * @var string|null
     */
    public $editIcon;

    /**
     * @var string|null
     */
    public $delete;

    /**
     * @var string|null
     */
    public $deleteIcon;

    /**
     * @var string|null
     */
    public $deleteConfirm;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  string|null  $modifier
     * @param  mixed  $default
     * @param  string|bool|null  $language
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @param  string|bool|null  $accept
     * @param  string|null  $empty
     * @param  string|null  $emptyText
     * @param  string|null  $emptyIcon
     * @param  string|null  $loading
     * @param  string|null  $loadingIcon
     * @param  string|null  $error
     * @param  string|null  $errorText
     * @param  string|null  $errorIcon
     * @param  string|null  $edit
     * @param  string|null  $editIcon
     * @param  string|null  $delete
     * @param  string|null  $deleteIcon
     * @param  string|null  $deleteConfirm
     * @return void
     */
    public function __construct(
        $name = null,
        $id = null,
        $label = null,
        $bind = null,
        $modifier = null,
        $default = null,
        $language = null,
        $showErrors = null,
        $theme = null,
        $accept = null,
        $empty = null,
        $emptyText = null,
        $emptyIcon = null,
        $loading = null,
        $loadingIcon = null,
        $error = null,
        $errorText = null,
        $errorIcon = null,
        $edit = null,
        $editIcon = null,
        $delete = null,
        $deleteIcon = null,
        $deleteConfirm = null
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            'file',
            $bind,
            $modifier,
            $default,
            null,
            null,
            null,
            null,
            $language,
            $showErrors,
            $theme,
            false
        );

        $this->accept = $accept ?? 'image/*';
        $this->empty = $empty;
        $this->emptyText = $emptyText;
        $this->emptyIcon = $emptyIcon;
        $this->loading = $loading;
        $this->loadingIcon = $loadingIcon;
        $this->error = $error;
        $this->errorText = $errorText;
        $this->errorIcon = $errorIcon;
        $this->edit = $edit;
        $this->editIcon = $editIcon;
        $this->delete = $delete;
        $this->deleteIcon = $deleteIcon;
        $this->deleteConfirm = $deleteConfirm;
    }
}
