<?php

class Default_Statuses {

  /**
   * Make changes to the database.
   *
   * @return void
   */
  public function up() {
    $a = new Status();
    $a->name = 'Damaged';
    $a->class = 'error';
    $a->description = 'Some form of physical damage has occured.';
    $a->save();
    
    $b = new Status();
    $b->name = 'Sent to Apple';
    $b->class = 'warning';
    $b->description = 'Sent to Apple for repairs';
    $b->save();
    
    $c = new Status();
    $c->name = 'Holding';
    $c->class = 'info';
    $c->description = 'Waiting for further action. (send to apple, re-image, bind to server, etc.)';
    $c->save();
  }

  /**
   * Revert the changes to the database.
   *
   * @return void
   */
  public function down() {
    
  }

}