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
$viewdefs[$module_name]['base']['view']['attendees-header'] = array(
    'buttons' => array(
        array(
            'type' => 'class-data-actiondropdown',
            'name' => 'panel_dropdown',
            'no_default_action' => true,
            'buttons' => array(
                array(
                    'type' => 'button',
                    'icon' => 'fa-plus',
                    'name' => 'create_attendee_button',
                    'label' => 'LBL_CREATE_ATTENDEE_BUTTON_LABEL',
                    'acl_action' => 'create',
                    'tooltip' => 'LBL_CREATE_ATTENDEE_BUTTON_TOOLTIP',
                ),
            ),
        ),
    ),
    'panels' => array(
        array(
            'name' => 'panel_attendees_header',
            'label' => 'LBL_ATTENDEES_HEADER',
        ),
    ),
);
