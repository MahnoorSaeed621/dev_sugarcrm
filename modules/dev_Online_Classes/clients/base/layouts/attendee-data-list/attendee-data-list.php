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
$module_name = 'dev_Online_Classes';
$viewdefs[$module_name]['base']['layout']['attendee-data-list'] = array(
    'components' => array(
        array(
            'view' => 'attendee-data-list-header',
        ),
        array(
            'view' => 'attendee-data-list',
        ),
    ),
);
