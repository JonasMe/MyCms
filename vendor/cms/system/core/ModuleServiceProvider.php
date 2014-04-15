<?php

namespace Cms\System\Core;

 class ModuleServiceProvider extends \Illuminate\Support\ServiceProvider {
 
    /**
     * Boots the application and makes routes for easy module fetching
     * @return none
     */
    public function boot()
    {
        $modules = \App::make('Modules');
        $modules->fetchModules();
        $modules->registerModules();

        \Route::any('Module/{module}/{class}', function($module,$class) {
                    if( strpos($module, ".") !== false ) {
                    $exploded = explode(".", $module);
                    $package = $exploded[0];
                    $module = $exploded[1];
                    $class  = \Input::get('class',  $class );
                    $method = \Input::get('method', null );
                    $args   = \Input::get('args',   array() );
                    $args   = ( !is_array($args) ? json_decode($args,true) : $args);
                    if( $mod = \Modules::get($package,$module) ) {
                        if( is_null($class) ) {
                            return ""; //$class = $mod->getMain();
                        }
                        return $mod->getAdvanced($class,$method,$args);
                    }
                }

        });

        \Route::any('Module/{module}/{class}/{method}', function($module,$class,$method) {
                    if( strpos($module, ".") !== false ) {
                    $exploded = explode(".", $module);
                    $package = $exploded[0];
                    $module = $exploded[1];
                    $class  = \Input::get('class',  $class );
                    $method = \Input::get('method', $method );
                    $args   = \Input::get('args',   array() );
                    $args   = ( !is_array($args) ? json_decode($args,true) : $args);
                    if( $mod = \Modules::get($package,$module) ) {
                        if( is_null($class) ) {
                            return ""; //$class = $mod->getMain();
                        }
                        return $mod->getAdvanced($class,$method,$args);
                    }
                }

        });

        \Route::any('Module/{module}/{class}/{method}/{arguments}', function($module,$class,$method,$arguments) {
                    if( strpos($module, ".") !== false ) {
                    $exploded = explode(".", $module);
                    $package = $exploded[0];
                    $module = $exploded[1];
                    $class  = \Input::get('class',  $class );
                    $method = \Input::get('method', $method );
                    $args   = \Input::get('args',   ( strpos($arguments, "/") !== false ? explode("/",$arguments) : array($arguments) ) );
                    $args   = ( !is_array($args) ? json_decode($args,true) : $args);
                    if( $mod = \Modules::get($package,$module) ) {
                        if( is_null($class) ) {
                            return ""; //$class = $mod->getMain();
                        }
                        return $mod->getAdvanced($class,$method,$args);
                    }
                }

        })->where('arguments', '.*');;

    }
 
    /**
     * Registers the Modules class
     * @return none
     */
    public function register()
    {
        \App::singleton('Modules', function()
        {
            return new \Cms\System\Core\Modules();
        });
    }
 
}