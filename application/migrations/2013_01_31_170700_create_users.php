<?php

class Create_Users {

  /**
   * Make changes to the database.
   *
   * @return void
   */
  public function up() {
    Schema::create('users', function($table) {
              $table->engine = 'InnoDB';
              $table->increments('id');
              $table->string('username', 128)->unique();
              $table->string('email', 128)->unique();
              $table->string('nickname', 128);
              $table->string('password', 64);
              $table->timestamps();
            });

    $user = new User();
    $user->username = 'admin';
    $user->email = 'admin@local.dev';
    $user->nickname = 'Admin';
    $user->password = 'password';
    $user->save();
  }

  /**
   * Revert the changes to the database.
   *
   * @return void
   */
  public function down() {
    Schema::drop('users');
  }

}