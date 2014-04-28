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

        \Route::any('Module/{module}/{class}/{method}', function($module,$class,$method) {
            return $this->transformToDirectCall($module,$class,$method);
        });

        \Route::any('Module/{module}/{class}/{method}/{arguments}', function($module,$class,$method,$arguments) {
            return $this->transformToDirectCall($module,$class,$method,$arguments);
        })->where('arguments', '.*');;

    }

    private function transformToDirectCall($module,$class,$method,$arguments = null) {
                    if( strpos($module, ".") !== false ) {
                    $exploded = explode(".", $module);
                    $package = $exploded[0];
                    $module = $exploded[1];
                    $args   = ( strpos($arguments, "/") !== false ? explode("/",$arguments) : (is_null($arguments) ? array() : array($arguments) ) );

                    if( $mod = \Modules::get($package,$module) ) {
                        $module = $mod->get($class);
                        if( isset( $module->directCalling ) ) {
                            if( $module->directCalling !== false ) {
                                if( !is_array($module->directCalling) && $module->directCalling === true ) {
                                    return $mod->getAdvanced($module,$method,$args);
                                } elseif( is_array($module->directCalling) && in_array($method, $module->directCalling) ) {
                                    return $mod->getAdvanced($module,$method,$args);
                                }
                            } 
                        }

                         throw new \Exception(sprintf("%s of %s does not allow direct calling",$method,$class));
                    
                    } else {
                        throw new \Exception( sprintf("Module %s does not exist.",$module) );
                    }
                } else {
                    throw new \Exception( sprintf("First url parameter must be in format Package.Modulename. %s given. ", $module) );
                }
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