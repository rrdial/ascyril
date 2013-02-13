<?php

class Timestamp_Statuses {

  /**
   * Make changes to the database.
   *
   * @return void
   */
  public function up() {
    Schema::table('statuses', function($table) {
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
    Schema::table('statuses', function($table) {
              $table->drop_column(array('created_at', 'updated_at'));
            }
    );
  }

}