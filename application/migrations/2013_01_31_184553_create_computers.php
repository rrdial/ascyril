<?php

class Create_Computers {

  /**
   * Make changes to the database.
   *
   * @return void
   */
  public function up() {
    Schema::create('computers', function($table) {
              $table->engine = 'InnoDB';
              $table->increments('id');
              $table->integer('client_id')->unsigned()->nullable();
              $table->integer('status_id')->unsigned()->nullable();
              $table->integer('asset_tag')->unsigned()->unique();
              $table->string('sn', 16)->unique()->nullable();
              $table->string('name', 3)->unique()->nullable();
              $table->timestamps();
            });
  }

  /**
   * Revert the changes to the database.
   *
   * @return void
   */
  public function down() {
    
    Schema::drop('computers');
  }

}