<?php

namespace TALLKit\Components\Forms;

class InputImage extends Input
{
    /**
     * @var string|null
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
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  string|null  $language
     * @param  string|null  $accept
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
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @return void
     */
    public function __construct(
        $name = null,
        $id = null,
        $label = null,
        $bind = null,
        $default = null,
        $language = null,
        $accept = 'image/*',
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
        $showErrors = true,
        $theme = null,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            'file',
            $bind,
            $default,
            null,
            $language,
            $showErrors,
            $theme,
            false,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon
        );

        $this->accept = $accept;
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
    }
}
