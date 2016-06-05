<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


use Search\Manager;


class UsersTable extends Cake\ORM\Table {
    
    /*public function initialize(array $config)
    {
        parent::initialize();
        // Add the behaviour to your table
        $this->addBehavior('Search.Search');

    }*/
    // Configure how you want the search plugin to work with this table class
   /* public function searchConfiguration()
    {
        $search = new Manager($this);
        $search
            ->value('email', [
                'field' => $this->aliasField('Users.email'),
            ])
            //->value('rg', [
                //'field' => $this->aliasField('Users.rg'),
            //])
            // Here we will alias the 'q' query param to search the `Users.email`
            // field and the `Users.rg` field, using a LIKE match, with `%`
            // both before and after.
            ->like('q', [
                'before' => true,
                'after' => true,
                'field' => [$this->aliasField('email'), $this->aliasField('rg')]
            ])
            ->callback('foo', [
                'callback' => function ($query, $args, $manager) {
                    // Modify $query as required
                }
            ]);

        return $search;
    }*/

}