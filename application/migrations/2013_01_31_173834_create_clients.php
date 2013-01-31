<?php

class Create_Clients {

  /**
   * Make changes to the database.
   *
   * @return void
   */
  public function up() {
    Schema::create('clients', function($table) {
              $table->engine = 'InnoDB';
              $table->increments('id');
              $table->string('name', 128)->unique();
              $table->timestamps();
            });
  }

  /**
   * Revert the changes to the database.
   *
   * @return void
   */
  public function down() {
    Schema::drop('clients');
  }

}