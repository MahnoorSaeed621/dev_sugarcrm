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

/**
 * Define the after_save hook that will generate a renewal opportunity
 * when an opportunity containing services is closed won
 */
$hook_array['after_save'][] = array(
    1,
    'generateRenewalOpportunity',
    'modules/Opportunities/OpportunityHooks.php',
    'OpportunityHooks',
    'generateRenewalOpportunity',
);
