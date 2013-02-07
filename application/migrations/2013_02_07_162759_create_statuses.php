<?php

class Create_Statuses {

  /**
   * Make changes to the database.
   *
   * @return void
   */
  public function up() {
    Schema::create('statuses', function($table) {
              $table->engine = 'InnoDB';
              $table->increments('id');
              $table->string('value', 127)->unique();
            }
    );
  }

  /**
   * Revert the changes to the database.
   *
   * @return void
   */
  public function down() {
    Schema::drop('statuses');
  }

}