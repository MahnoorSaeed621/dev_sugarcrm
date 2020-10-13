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
$viewdefs['Contacts']['base']['view']['attendee-data-list'] = array(
    'panels' => array(
        array(
            'name' => 'contacts_attendee-data-list',
            'label' => 'LBL_PRODUCTS_QUOTE_DATA_LIST',
            'fields' => array(
                array(
                    'name' => 'name',
                    'label' => 'LBL_NAME',
                    'dismiss_label' => true,
                    'type' => 'attendee-data-relate',
                    'link' => true,
                    'module' => 'Contacts',
                    'required' => true,
                    'id_name' => 'id',
                    'fields' => array(
                        'salutation',
                        'first_name',
                        'last_name',
                    ),
                    
                ),
                array(
                    'name' => 'status',
                    'label' => 'LBL_STATUS',
                    'type' => 'enum',
                ),
            ),
        ),
    ),
);
