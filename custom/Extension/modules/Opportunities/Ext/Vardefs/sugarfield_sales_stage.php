<?php
 // created: 2020-10-12 10:33:47
$dictionary['Opportunity']['fields']['sales_stage']['required']=false;
$dictionary['Opportunity']['fields']['sales_stage']['audited']=false;
$dictionary['Opportunity']['fields']['sales_stage']['massupdate']=false;
$dictionary['Opportunity']['fields']['sales_stage']['comments']='Indication of progression towards closure';
$dictionary['Opportunity']['fields']['sales_stage']['importable']=false;
$dictionary['Opportunity']['fields']['sales_stage']['duplicate_merge']='enabled';
$dictionary['Opportunity']['fields']['sales_stage']['duplicate_merge_dom_value']=1;
$dictionary['Opportunity']['fields']['sales_stage']['merge_filter']='disabled';
$dictionary['Opportunity']['fields']['sales_stage']['reportable']=false;
$dictionary['Opportunity']['fields']['sales_stage']['calculated']=true;
$dictionary['Opportunity']['fields']['sales_stage']['formula']='opportunitySalesStage($revenuelineitems, "sales_stage")';
$dictionary['Opportunity']['fields']['sales_stage']['enforced']=true;
$dictionary['Opportunity']['fields']['sales_stage']['dependency']=false;

 ?>