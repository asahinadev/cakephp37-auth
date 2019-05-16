<?php
namespace App\View\Helper;

use Cake\View\View;
use Cake\View\Helper\PaginatorHelper as Helper;


/**
 * Paginator helper
 */
class PaginatorHelper extends Helper {

    // @formatter:off
    protected $_defaultConfig = [
        'options' => [],
        'templates' => [
            'nextActive'     => '<li class="page-item         "><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'nextDisabled'   => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevActive'     => '<li class="page-item         "><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevDisabled'   => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'first'          => '<li class="page-item         "><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'last'           => '<li class="page-item         "><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'number'         => '<li class="page-item         "><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'current'        => '<li class="page-item active  "><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'ellipsis'       => '<li class="page-item disabled">&hellip;</li>',
            'disabled'       => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            
            'counterRange'   => '{{start}} - {{end}} of {{count}}',
            'counterPages'   => '{{page}} of {{pages}}',
            
            'sort'           => '<a class="        " href="{{url}}">{{text}}<span class="mx-3 fa fa-sort     ">&nbsp;</span></a>',
            'sortAsc'        => '<a class="        " href="{{url}}">{{text}}<span class="mx-3 fa fa-sort-asc ">&nbsp;</span></a>',
            'sortDesc'       => '<a class="        " href="{{url}}">{{text}}<span class="mx-3 fa fa-sort-desc">&nbsp;</span></a>',
            'sortAscLocked'  => '<a class="disabled" href="{{url}}">{{text}}<span class="mx-3 fa fa-sort-asc ">&nbsp;</span></a>',
            'sortDescLocked' => '<a class="disabled" href="{{url}}">{{text}}<span class="mx-3 fa fa-sort-desc">&nbsp;</span></a>',
        ]
    ];
    
    // @formatter:on
    public function __construct(View $View, array $config = []) {
        parent::__construct($View, $config);
    }


    public function first($first = '<<', array $options = []) {
        $html = parent::first($first, $options);
        if (! $html) {
            $html = $this->templater()
                ->format('disabled', $this->urlOptions($first));
        }
        return $html;
    }


    public function numbers(array $options = []) {
        $after = "";
        if (isset($options["after"])) {
            $after = $options["after"];
            unset($options["after"]);
        }

        $options += [
            "modulus" => 10,
            "model" => $this->defaultModel()
        ];
        $html = parent::numbers($options);

        $params = (array) $this->params($options['model']);
        for ($i = $params['pageCount']; $i <= $options['modulus']; $i ++) {
            $html .= $this->templater()
                ->format('disabled', $this->urlOptions($this->Number->format($i)));
        }
        $html .= $after;
        return $html;
    }


    public function last($last = '>>', array $options = []) {
        $html = parent::last($last, $options);
        if (! $html) {
            $html = $this->templater()
                ->format('disabled', $this->urlOptions($last));
        }
        return $html;
    }


    private function urlOptions($text, $url = "#") {
        return compact("url", "text");
    }
}
