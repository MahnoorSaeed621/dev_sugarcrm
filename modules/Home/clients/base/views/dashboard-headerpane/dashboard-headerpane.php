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
$viewdefs["Home"]["base"]["view"]["dashboard-headerpane"] = array(
    "buttons" => array(
        array(
            "type" => "actiondropdown",
            "primary" => true,
            "buttons" => array(
                array(
                    "name"      => "add_button",
                    "type"      => "rowaction",
                    "label"     => "LBL_CREATE_BUTTON_LABEL",
                    "css_class" => "btn btn-primary",
                ),
                array(
                    "name"      => "edit_overview_tab_button",
                    "type"      => "rowaction",
                    "label"     => "LBL_EDIT_OVERVIEW_TAB_BUTTON",
                    'acl_action' => 'edit',
                    'allowed_layouts' => [
                        [
                            // service console
                            'name' => 'dashboard',
                            'id' => 'c108bb4a-775a-11e9-b570-f218983a1c3e',
                        ],
                        [
                            // renewals console
                            'name' => 'dashboard',
                            'type' => 'renewals_console',
                        ],
                    ],
                ),
                array(
                    "name"      => "edit_module_tabs_button",
                    "type"      => "rowaction",
                    "label"     => "LBL_EDIT_MODULE_TABS_BUTTON",
                    'acl_action' => 'edit',
                    'allowed_layouts' => [
                        [
                            // service console
                            'name' => 'dashboard',
                            'id' => 'c108bb4a-775a-11e9-b570-f218983a1c3e',
                        ],
                        [
                            // renewals console
                            'name' => 'dashboard',
                            'type' => 'renewals_console',
                        ],
                    ],
                ),
                array(
                    "name"      => "edit_button",
                    "type"      => "rowaction",
                    "label"     => "LBL_EDIT_BUTTON",
                    'acl_action' => 'edit',
                    'disallowed_layouts' => [
                        [
                            // service console
                            'name' => 'dashboard',
                            'id' => 'c108bb4a-775a-11e9-b570-f218983a1c3e',
                        ],
                        [
                            // renewals console
                            'name' => 'dashboard',
                            'type' => 'renewals_console',
                        ],
                    ],
                ),
                array(
                    'type' => 'rowaction',
                    'name' => 'duplicate_button',
                    'label' => 'LBL_DUPLICATE_BUTTON',
                    'acl_module' => 'Dashboards',
                    'acl_action' => 'create',
                    'disallowed_layouts' => [
                        [
                            // this is the Agent Workbench
                            'name' => 'dashboard',
                            'id' => 'c108bb4a-775a-11e9-b570-f218983a1c3e',
                        ],
                        [
                            // this is new renewals console
                            'name' => 'dashboard',
                            'type' => 'renewals_console',
                        ],
                    ],
                ),
            ),
            "showOn" => "view",
        ),
        array(
            "name"      => "cancel_button",
            "type"      => "button",
            "label"     => "LBL_CANCEL_BUTTON_LABEL",
            "css_class" => "btn-invisible btn-link",
            "showOn" => "edit",
        ),
        array(
            "name"      => "delete_button",
            "type"      => "button",
            "label"     => "LBL_DELETE_BUTTON_LABEL",
            "css_class" => "btn-danger",
            "showOn" => "edit",
            'disallowed_layouts' => [
                [
                    // this is the Agent Workbench
                    'name' => 'dashboard',
                    'id' => 'c108bb4a-775a-11e9-b570-f218983a1c3e',
                ],
                [
                    // this is new renewals console
                    'name' => 'dashboard',
                    'type' => 'renewals_console',
                ],
            ],
        ),
        array(
            "name"      => "save_button",
            "type"      => "button",
            'events' => array(
                'click' => 'button:save_button:click',
            ),
            "label"     => "LBL_SAVE_BUTTON_LABEL",
            "css_class" => "btn-primary",
            "showOn" => "edit",
        ),

        array(
            "name"      => "create_cancel_button",
            "type"      => "button",
            "label"     => "LBL_CANCEL_BUTTON_LABEL",
            "css_class" => "btn-invisible btn-link",
            "showOn" => "create",
        ),
        array(
            "name"      => "create_button",
            "type"      => "button",
            'events' => array(
                'click' => 'button:save_button:click',
            ),
            "label"     => "LBL_SAVE_BUTTON_LABEL",
            "css_class" => "btn-primary",
            "showOn" => "create",
        ),
    ),
    "panels" => array(
        array(
            "name" => "header",
            "fields" => array(
                array(
                    "type" => "dashboardtitle",
                    "name" => "name",
                    "placeholder" => "LBL_DASHBOARD_TITLE",
                ),
                array(
                    'name' => 'my_favorite',
                    'label' => 'LBL_FAVORITE',
                    'type' => 'favorite',
                    'dismiss_label' => true,
                ),
                array(
                    "type" => "layoutbutton",
                    "name" => "layout",
                    "showOn" => "edit",
                ),
            )
        )
    )
);
