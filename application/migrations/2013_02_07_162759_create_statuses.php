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
              $table->string('name', 127)->unique();
              $table->string('class', 15);
              $table->text('description')->nullable();
              $table->timestamps();
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