<?php
namespace App\View\Helper;

use Cake\View\Helper\FormHelper as Helper;


/**
 * Form helper
 */
class FormHelper extends Helper {

    protected $_defaultTemplate = [
        'formGroup' => '{{label}}<div class="col">{{input}}</div>',
        'error' => '<div class="invalid-feedback">{{content}}</div>',
        'errorList' => '<ul class="list-group "  >{{content}}</ul>',
        'errorItem' => '<li class="list-group-item "  >{{text}}</li>',
        'inputContainer' => '<div class="form-group row {{type}} {{required}}">{{content}}</div>',
        'inputContainerError' => '<div class="form-group row is-invalid {{type}} {{required}}">{{content}}</div>',
        'submitContainer' => '<div class="col-4">{{content}}</div>'
    ];


    public function create($context = null, array $options = []) {
        $options += [
            "templates" => [],
            "novalidate" => true
        ];
        $options["templates"] += $this->_defaultTemplate;
        return parent::create($context, $options);
    }


    public function label($fieldName, $text = null, array $options = []) {
        $options = parent::addClass($options, "col-sm-12 col-md-6 col-lg-4 col-xl-2");
        return parent::label($fieldName, $text, $options);
    }


    public function text($fieldName, array $options = []) {
        $options = parent::addClass($options, "form-control");
        return parent::text($fieldName, $options);
    }


    public function email($fieldName, array $options = []) {
        $options = parent::addClass($options, "form-control");
        return parent::email($fieldName, $options);
    }


    public function password($fieldName, array $options = []) {
        $options = parent::addClass($options, "form-control");
        return parent::password($fieldName, $options);
    }


    public function number($fieldName, array $options = []) {
        $options = parent::addClass($options, "form-control");
        $options = parent::addClass($options, "w-auto");
        $options = parent::addClass($options, "text-right");

        return parent::number($fieldName, $options);
    }


    public function select($fieldName, $options = [], array $attributes = []) {
        $attributes = parent::addClass($attributes, "form-control");
        return parent::select($fieldName, $options, $attributes);
    }


    public function submit($caption = null, array $options = []) {
        $options += [
            "button-type" => "primary",
            "button-block" => true
        ];

        $options = parent::addClass($options, "btn");
        if ($options["button-block"]) {
            $options = parent::addClass($options, "btn-block");
        }
        $options = parent::addClass($options, "btn-" . $options["button-type"]);

        unset($options["button-type"]);
        unset($options["button-block"]);

        return parent::submit($caption, $options);
    }


    public function button($caption = null, array $options = []) {
        $options += [
            "button-type" => "secondary",
            "button-block" => true
        ];

        $options = parent::addClass($options, "btn");
        if ($options["button-block"]) {
            $options = parent::addClass($options, "btn-block");
        }
        $options = parent::addClass($options, "btn-" . $options["button-type"]);

        unset($options["button-type"]);
        unset($options["button-block"]);

        return parent::button($caption, $options);
    }


    public function reset($caption = null, array $options = []) {
        $options += [
            "button-type" => "secondary",
            "button-block" => true,
            "type" => "reset"
        ];

        $options = parent::addClass($options, "btn");
        if ($options["button-block"]) {
            $options = parent::addClass($options, "btn-block");
        }
        $options = parent::addClass($options, "btn-" . $options["button-type"]);

        unset($options["button-type"]);
        unset($options["button-block"]);

        return parent::button($caption, $options);
    }
}
