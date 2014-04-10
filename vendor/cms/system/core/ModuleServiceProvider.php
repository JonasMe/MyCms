<?php

namespace Cms\System\Core;

 class ModuleServiceProvider extends \Illuminate\Support\ServiceProvider {
 
    public function boot()
    {
        $modules = \App::make('Modules');
        $modules->fetchModules();
        $modules->registerModules();

        \Route::any('Module/{package}/{module}', function($package,$module) {
                    $class  = \Input::get('class',  $module );
                    $method = \Input::get('method', null );
                    $args   = \Input::get('args',   array() );
                    $args   = ( !is_array($args) ? json_decode($args) : $args);
                    if( $mod = \Modules::get($package,$module) ) {
                        return $mod->getController($class,$method,$args);
                    }
        });

        \Route::any('Module/{package}/{module}/{class}', function($package,$module,$class) {
                    $method = \Input::get('method', null );
                    $args   = \Input::get('args',   array() );
                    $args   = ( !is_array($args) ? json_decode($args) : $args);
                    if( $mod = \Modules::get($package,$module) ) {
                        return $mod->getController($class,$method,$args);
                    }
        });

        \Route::any('Module/{package}/{module}/{class}/{method}', function($package,$module,$class,$method) {
                    $args   = \Input::get('args',   array() );
                    $args   = ( !is_array($args) ? json_decode($args) : $args);

                    if( $mod = \Modules::get($package,$module) ) {
                        return $mod->getController($class,$method,$args);
                    }
        });

    }
 
    public function register()
    {
        \App::singleton('Modules', function()
        {
            return new \Cms\System\Core\Modules();
        });



    }
 
    public function getModule($args)
    {
        $module = (isset($args[0]) and is_string($args[0])) ? $args[0] : null;
        return $module;
    }

    public function registerModule(\Cms\System\Core\Models\Module $module) {
        print $module->name;
    }

    public function fetchModulesAndRegister() { 
        $allModules = \Cms\System\Core\Models\Module::where('is_active','=','1')->get();
        foreach($allModules as $module) {
            \Modules::register($module);
        }
        \Event::fire('Modules.Ready');
    }

    private function returnModuleFolder($module) {
        if( is_dir( public_path() . "/modules/" . $module ) ) {
            return public_path() . "/modules/" . $module;
        } elseif( is_dir( app_path() . "/modules/" . $module ) ) {
            return app_path() . "/modules/" . $module;
        } else {
            return false;
        }
    }
 
}