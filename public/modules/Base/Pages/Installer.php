<?php
	namespace Modules\Base\Pages;

	class Installer extends \Cms\System\Core\ModuleInstaller {

		protected function uninstall() {
			//Remove tables
			\Schema::dropIfExists('page');
			\Schema::dropIfExists('placeholder');
			\Schema::dropIfExists('placeholder_object');
			\Schema::dropIfExists('placeholder_object_property');

		}

		protected function install() {
			//Adding the page table
			if (!\Schema::hasTable('page'))
			{
				\Schema::create('page', function($table)
				{
				    $table->increments('page_id');
				    $table->string('title',255);
				    $table->string('slug',255);
				    $table->string('view',255);
				    $table->tinyInteger('is_frontpage');
				    $table->tinyInteger('is_active');
				    $table->integer('parent_id');
				    $table->dateTime('created_at');
				    $table->dateTime('updated_at');

				    $table->index('parent_id');
				    $table->index('slug');

				});
			}

				//Adding the placeholder table
			if (!\Schema::hasTable('placeholder'))
			{
				\Schema::create('placeholder', function($table)
				{
				    $table->increments('placeholder_id');
				    $table->string('textual_id',255);
				    $table->string('title',255);
				    $table->integer('page_id');
				    $table->dateTime('created_at');
				    $table->dateTime('updated_at');

				    $table->index('textual_id');
				    $table->index('page_id');
				});
			}

				//Adding the placeholder object table
			if (!\Schema::hasTable('placeholder_object'))
			{
				\Schema::create('placeholder_object', function($table)
				{
				    $table->increments('placeholder_object_id');
				    $table->string('title',255);
				    $table->integer('module_option_id');
				    $table->integer('placeholder_id');
				    $table->tinyInteger('enabled');
				    $table->integer('position');
				    $table->dateTime('created_at');
				    $table->dateTime('updated_at');

				    $table->index('placeholder_id');
				    $table->index('module_option_id');
				});
			}

				//Adding the placeholder object property table
			if (!\Schema::hasTable('placeholder_object_property'))
			{
				\Schema::create('placeholder_object_property', function($table)
				{
				    $table->increments('placeholder_object_property_id');
				    $table->string('pkey',255);
				    $table->text('pvalue');
				    $table->integer('placeholder_object_id');
				    $table->dateTime('created_at');
				    $table->dateTime('updated_at');

				    $table->index('pkey');
				});
			}

				if( $this->addOption("Richtext","Options\\RichText") ) {
					return true;
				}

			return false;
		}
	}