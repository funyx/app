<?php

namespace App;

use Atk4\Ui\App;
use Atk4\Ui\Layout\Admin;
use Illuminate\Support\Facades\Config;

class Application extends \Illuminate\Foundation\Application
{
    public function __construct($basePath = null) {
        parent::__construct( $basePath );
        $this->singleton('admin', function(){
            $app = new App(['title' => Config::get('app.name')]);
            $app->initLayout([Admin::class]);
            return $app;
        });
    }
}
