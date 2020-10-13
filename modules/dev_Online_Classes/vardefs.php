<?php

/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

$dictionary['dev_Online_Classes'] = array(
    'table' => 'dev_online_classes',
    'audited' => true,
    'activity_enabled' => false,
    'duplicate_merge' => true,
    'fields' =>
    array(
        'attendees_items' => array(
            'name' => 'attendees_items',
            'type' => 'collection',
            'vname' => 'LBL_ATTENDEES',
            'links' => array('dev_online_classes_contacts'),
            'source' => 'non-db',
            'hideacl' => true,
        ),
    ),
    'relationships' => array(
    ),
    'optimistic_locking' => true,
    'unified_search' => true,
    'full_text_search' => true,
);

if (!class_exists('VardefManager')) {
    
}
VardefManager::createVardef('dev_Online_Classes', 'dev_Online_Classes', array('basic', 'team_security', 'assignable', 'taggable'));
