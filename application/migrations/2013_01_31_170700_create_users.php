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
              $table->string('email', 128)->unique();
              $table->string('name', 128);
              $table->string('password', 64);
              $table->timestamps();
            });
    DB::table('users')->insert(array(
        'email' => 'admin@local.dev',
        'name' => 'Admin',
        'password' => Hash::make('password')
    ));
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