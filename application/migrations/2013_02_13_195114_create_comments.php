<?php

class Create_Comments {

  /**
   * Make changes to the database.
   *
   * @return void
   */
  public function up() {
    Schema::create('comments', function($table) {
              $table->increments('id');
              $table->integer('computer_id')->unsigned();
              $table->integer('user_id')->unsigned();
              $table->string('status', 255);
              $table->text('message');
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
    Schema::drop('comments');
  }

}