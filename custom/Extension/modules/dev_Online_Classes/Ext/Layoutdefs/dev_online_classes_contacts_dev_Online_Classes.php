<?php
 // created: 2020-10-12 10:50:13
$layout_defs["dev_Online_Classes"]["subpanel_setup"]['dev_online_classes_contacts'] = array (
  'order' => 100,
  'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DEV_ONLINE_CLASSES_CONTACTS_FROM_CONTACTS_TITLE',
  'get_subpanel_data' => 'dev_online_classes_contacts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
