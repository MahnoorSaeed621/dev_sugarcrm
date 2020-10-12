<?php
// created: 2020-10-12 10:50:13
$dictionary["dev_online_classes_contacts"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'dev_online_classes_contacts' => 
    array (
      'lhs_module' => 'dev_Online_Classes',
      'lhs_table' => 'dev_online_classes',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'dev_online_classes_contacts_c',
      'join_key_lhs' => 'dev_online_classes_contactsdev_online_classes_ida',
      'join_key_rhs' => 'dev_online_classes_contactscontacts_idb',
    ),
  ),
  'table' => 'dev_online_classes_contacts_c',
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'type' => 'id',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'default' => 0,
    ),
    'dev_online_classes_contactsdev_online_classes_ida' => 
    array (
      'name' => 'dev_online_classes_contactsdev_online_classes_ida',
      'type' => 'id',
    ),
    'dev_online_classes_contactscontacts_idb' => 
    array (
      'name' => 'dev_online_classes_contactscontacts_idb',
      'type' => 'id',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'idx_dev_online_classes_contacts_pk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_dev_online_classes_contacts_ida1_deleted',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'dev_online_classes_contactsdev_online_classes_ida',
        1 => 'deleted',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_dev_online_classes_contacts_idb2_deleted',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'dev_online_classes_contactscontacts_idb',
        1 => 'deleted',
      ),
    ),
    3 => 
    array (
      'name' => 'dev_online_classes_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'dev_online_classes_contactsdev_online_classes_ida',
        1 => 'dev_online_classes_contactscontacts_idb',
      ),
    ),
  ),
);