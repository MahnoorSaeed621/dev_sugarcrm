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

$dictionary['product_definition'] = [
    'table' => 'product_definition',
    'fields' => [
        'date_created' => array(
            'name' => 'date_created',
            'type' => 'datetime',
        ),
        'data' => array(
            'name' => 'data',
            'type' => 'json',
            'dbType' => 'text',
        ),
    ],
];