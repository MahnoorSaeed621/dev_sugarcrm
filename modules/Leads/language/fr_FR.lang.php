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

$mod_strings = array (
    //DON'T CONVERT THESE THEY ARE MAPPINGS
    'db_last_name' => 'LBL_LIST_LAST_NAME',
    'db_first_name' => 'LBL_LIST_FIRST_NAME',
    'db_title' => 'LBL_LIST_TITLE',
    'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
    'db_account_name' => 'LBL_LIST_ACCOUNT_NAME',
    'db_email2' => 'LBL_LIST_EMAIL_ADDRESS',

    //END DON'T CONVERT

    // Dashboard Names
    'LBL_LEADS_LIST_DASHBOARD' => 'Tableau de bord de la liste de leads',
    'LBL_LEADS_RECORD_DASHBOARD' => 'Tableau de bord d&#39;enregistrements de leads',

    'ERR_DELETE_RECORD' => 'Un ID doit être renseigné pour toute suppression.',
    'LBL_ACCOUNT_DESCRIPTION'=> 'Description de compte',
    'LBL_ACCOUNT_ID'=>'Compte (ID)',
    'LBL_ACCOUNT_NAME' => 'Nom du compte:',
    'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'Activités à réaliser',
    'LBL_ADD_BUSINESSCARD' => 'Saisir carte de visite',
    'LBL_ADDRESS_INFORMATION' => 'Adresse',
    'LBL_ALT_ADDRESS_CITY' => 'Adresse secondaire - Ville',
    'LBL_ALT_ADDRESS_COUNTRY' => 'Adresse secondaire - Pays',
    'LBL_ALT_ADDRESS_POSTALCODE' => 'Adresse secondaire - Code Postal',
    'LBL_ALT_ADDRESS_STATE' => 'Adresse secondaire - Région',
    'LBL_ALT_ADDRESS_STREET_2' => 'Adresse secondaire - Rue 2',
    'LBL_ALT_ADDRESS_STREET_3' => 'Adresse secondaire - Rue 3',
    'LBL_ALT_ADDRESS_STREET' => 'Adresse secondaire - Rue 1',
    'LBL_ALTERNATE_ADDRESS' => 'Adresse Secondaire :',
    'LBL_ANY_ADDRESS' => 'Adresse Quelconque :',
    'LBL_ANY_EMAIL' => 'Email :',
    'LBL_ANY_PHONE' => 'Téléphone Quelconque :',
    'LBL_ASSIGNED_TO_NAME' => 'Assigné à',
    'LBL_ASSIGNED_TO_ID' => 'Utilisateur assigné :',
    'LBL_BACKTOLEADS' => 'Retour aux leads',
    'LBL_BUSINESSCARD' => 'Convertir lead',
    'LBL_CITY' => 'Ville :',
    'LBL_CONTACT_ID' => 'Contact (ID)',
    'LBL_CONTACT_INFORMATION' => 'Information sur le lead',
    'LBL_CONTACT_NAME' => 'Nom du lead :',
    'LBL_CONTACT_OPP_FORM_TITLE' => 'Lead-Affaire :',
    'LBL_CONTACT_ROLE' => 'Rôle :',
    'LBL_CONTACT' => 'Lead :',
    'LBL_CONVERT_BUTTON_LABEL' => 'Convertir',
    'LBL_SAVE_CONVERT_BUTTON_LABEL' => 'Sauvegarder et convertir',
    'LBL_CONVERT_PANEL_OPTIONAL' => '(optionnel)',
    'LBL_CONVERT_ACCESS_DENIED' => 'Vous n&#39;avez pas les droits d&#39;édition à l&#39;ensemble des modules nécessaire à la conversion de lead : {{requiredModulesMissing}}',
    'LBL_CONVERT_FINDING_DUPLICATES' => 'Recherche de doublon en cours...',
    'LBL_CONVERT_IGNORE_DUPLICATES' => 'Ignorer et créer un nouveau',
    'LBL_CONVERT_BACK_TO_DUPLICATES' => 'Retour aux doublons',
    'LBL_CONVERT_SWITCH_TO_CREATE' => 'Créer un nouveau',
    'LBL_CONVERT_SWITCH_TO_SEARCH' => 'Recherche',
    'LBL_CONVERT_DUPLICATES_FOUND' => '{{duplicateCount}} doublons trouvés',
    'LBL_CONVERT_CREATE_NEW' => 'Créer {{moduleName}}',
    'LBL_CONVERT_SELECT_MODULE' => 'Sélectionner {{moduleName}}',
    'LBL_CONVERT_SELECTED_MODULE' => 'Sélection de {{moduleName}}',
    'LBL_CONVERT_CREATE_MODULE' => 'Créer {{moduleName}}',
    'LBL_CONVERT_CREATED_MODULE' => 'Création {{moduleName}}',
    'LBL_CONVERT_RESET_PANEL' => 'Réinitialiser',
    'LBL_CONVERT_COPY_RELATED_ACTIVITIES' => 'Copier les activités connexes à',
    'LBL_CONVERT_MOVE_RELATED_ACTIVITIES' => 'Déplacer des activités connexes vers',
    'LBL_CONVERT_MOVE_ACTIVITIES_TO_CONTACT' => 'Déplacer les activités associées à l&#39;enregistrement de contact',
    'LBL_CONVERTED_ACCOUNT'=>'Compte converti :',
    'LBL_CONVERTED_CONTACT' => 'Contact converti :',
    'LBL_CONVERTED_OPP'=>'Affaire convertie :',
    'LBL_CONVERTED'=> 'Converti(e)',
    'LBL_CONVERTLEAD_BUTTON_KEY' => 'V',
    'LBL_CONVERTLEAD_TITLE' => 'Convertir lead [Alt+V]',
    'LBL_CONVERTLEAD' => 'Convertir Lead',
    'LBL_CONVERTLEAD_WARNING' => 'Attention : Le statut du lead que vous souhaitez convertir est "converti". Un contact et/ou un compte ont sans doute déja été créés à partir des informations de ce lead. Si vous souhaitez tout de même convertir ce lead, cliquez sur "sauvegarder". Sinon cliquez sur "annuler" pour retourner sur la page précédente.',
    'LBL_CONVERTLEAD_WARNING_INTO_RECORD' => 'Nous pensons que ce Lead a été converti vers ce contact :',
    'LBL_CONVERTLEAD_ERROR' => 'Impossible de convertir le lead',
    'LBL_CONVERTLEAD_FILE_WARN' => 'Vous avez converti le lead {{leadName}} avec succès, mais un problème est survenu durant l&#39;upload des pièces jointes d&#39;un ou plusieurs enregistrements',
    'LBL_CONVERTLEAD_SUCCESS' => 'Vous avez converti le lead {{leadName}} avec succès',
    'LBL_COUNTRY' => 'Pays :',
    'LBL_CREATED_NEW' => 'Création',
	'LBL_CREATED_ACCOUNT' => 'Nouveau Compte créé',
    'LBL_CREATED_CALL' => 'Nouvel Appel créé',
    'LBL_CREATED_CONTACT' => 'Nouveau Contact créé',
    'LBL_CREATED_MEETING' => 'Nouvelle Réunion créée',
    'LBL_CREATED_OPPORTUNITY' => 'Nouvelle Affaire créée',
    'LBL_DEFAULT_SUBPANEL_TITLE' => 'Leads',
    'LBL_DEPARTMENT' => 'Service :',
    'LBL_DESCRIPTION_INFORMATION' => 'Description',
    'LBL_DESCRIPTION' => 'Description :',
    'LBL_DO_NOT_CALL' => 'Ne pas appeler :',
    'LBL_DUPLICATE' => 'Leads similaires',
    'LBL_EMAIL_ADDRESS' => 'Email:',
    'LBL_EMAIL_OPT_OUT' => 'Exclusion Email :',
    'LBL_EXISTING_ACCOUNT' => 'Compte existant utilisé',
    'LBL_EXISTING_CONTACT' => 'Contact existant utilisé',
    'LBL_EXISTING_OPPORTUNITY' => 'Affaire existante utilisée',
    'LBL_FAX_PHONE' => 'Fax :',
    'LBL_FIRST_NAME' => 'Prénom:',
    'LBL_FULL_NAME' => 'Nom Complet :',
    'LBL_HISTORY_SUBPANEL_TITLE'=>'Historique et activités terminées',
    'LBL_HOME_PHONE' => 'Ligne directe :',
    'LBL_IMPORT_VCARD' => 'Importer vCard',
    'LBL_IMPORT_VCARD_SUCCESS' => 'Le lead a été importé avec succès depuis la vCard.',
    'LBL_VCARD' => 'vCard',
    'LBL_IMPORT_VCARDTEXT' => 'Créer automatiquement un nouveau Lead par import de vcard depuis votre système.',
    'LBL_INVALID_EMAIL'=>'Email non Valide :',
    'LBL_INVITEE' => 'Rapports directs',
    'LBL_LAST_NAME' => 'Nom de famille:',
    'LBL_LEAD_SOURCE_DESCRIPTION' => 'Description de la principale origine du Lead :',
    'LBL_LEAD_SOURCE' => 'Origine Principale :',
    'LBL_LIST_ACCEPT_STATUS' => 'Statut d&#39;acceptation',
    'LBL_LIST_ACCOUNT_NAME' => 'Nom Compte',
    'LBL_LIST_CONTACT_NAME' => 'Nom du Lead',
    'LBL_LIST_CONTACT_ROLE' => 'Rôle',
    'LBL_LIST_DATE_ENTERED' => 'Date de création',
    'LBL_LIST_EMAIL_ADDRESS' => 'Email',
    'LBL_LIST_FIRST_NAME' => 'Prénom',
    'LBL_VIEW_FORM_TITLE' => 'Vue Lead',
    'LBL_LIST_FORM_TITLE' => 'Liste des Leads',
    'LBL_LIST_LAST_NAME' => 'Nom',
    'LBL_LIST_LEAD_SOURCE_DESCRIPTION' => 'Description origine principale',
    'LBL_LIST_LEAD_SOURCE' => 'Origine principale',
    'LBL_LIST_MY_LEADS' => 'Mes Leads',
    'LBL_LIST_NAME' => 'Nom',
    'LBL_LIST_PHONE' => 'Téléphone',
    'LBL_LIST_REFERED_BY' => 'Fait référence à',
    'LBL_LIST_STATUS' => 'Statut',
    'LBL_LIST_TITLE' => 'Fonction',
    'LBL_MOBILE_PHONE' => 'Téléphone Mobile :',
    'LBL_MODULE_NAME' => 'Leads',
    'LBL_MODULE_NAME_SINGULAR' => 'Lead',
    'LBL_MODULE_TITLE' => 'Leads',
    'LBL_NAME' => 'Nom :',
    'LBL_NEW_FORM_TITLE' => 'Nouveau Lead',
    'LBL_NEW_PORTAL_PASSWORD' => 'Nouveau mot de Passe pour le portail :',
    'LBL_OFFICE_PHONE' => 'Téléphone :',
    'LBL_OPP_NAME' => 'Nom Affaire :',
    'LBL_OPPORTUNITY_AMOUNT' => 'Montant Affaire :',
    'LBL_OPPORTUNITY_ID'=>'Affaire (ID)',
    'LBL_OPPORTUNITY_NAME' => 'Nom Affaire :',
    'LBL_CONVERTED_OPPORTUNITY_NAME' => 'Nom d&#39;affaire converti',
    'LBL_OTHER_EMAIL_ADDRESS' => 'Email Autre :',
    'LBL_OTHER_PHONE' => 'Téléphone Autre :',
    'LBL_PHONE' => 'Téléphone :',
    'LBL_PORTAL_ACTIVE' => 'Activer le portail :',
    'LBL_PORTAL_APP'=> 'Portail application',
    'LBL_PORTAL_INFORMATION' => 'Information sur le portail',
    'LBL_PORTAL_NAME' => 'Nom sur le portail :',
    'LBL_PORTAL_PASSWORD_ISSET' => 'Le password du portail est enregistré :',
    'LBL_POSTAL_CODE' => 'Code Postal :',
    'LBL_STREET' => 'Rue',
    'LBL_PRIMARY_ADDRESS_CITY' => 'Adresse principale - Ville',
    'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Adresse principale - Pays',
    'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Adresse principale - Code Postal',
    'LBL_PRIMARY_ADDRESS_STATE' => 'Adresse principale - Région',
    'LBL_PRIMARY_ADDRESS_STREET_2'=>'Adresse principale - Rue 2',
    'LBL_PRIMARY_ADDRESS_STREET_3'=>'Adresse principale - Rue 3',
    'LBL_PRIMARY_ADDRESS_STREET' => 'Adresse principale - Rue 1',
    'LBL_PRIMARY_ADDRESS' => 'Adresse Principale :',
    'LBL_RECORD_SAVED_SUCCESS' => 'Vous avez créé l&#39;enregistrement {{moduleSingularLower}} <a href="#{{buildRoute model=this}}">{{full_name}}</a>.',
    'LBL_REFERED_BY' => 'Fait référence à :',
    'LBL_REPORTS_TO_ID'=>'Rend compte à (ID)',
    'LBL_REPORTS_TO' => 'Rend compte à :',
    'LBL_REPORTS_FROM' => 'Rend compte à :',
    'LBL_SALUTATION' => 'Civilité',
    'LBL_MODIFIED'=>'Modifié par',
	'LBL_MODIFIED_ID'=>'Modifié par (ID)',
	'LBL_CREATED'=>'Créé par',
	'LBL_CREATED_ID'=>'Créé par (ID)',
    'LBL_SEARCH_FORM_TITLE' => 'Rechercher un Lead',
    'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'Utiliser Leads sélectionnés',
    'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'Utiliser Leads sélectionnés',
    'LBL_STATE' => 'Région :',
    'LBL_STATUS_DESCRIPTION' => 'Description Statut :',
    'LBL_STATUS' => 'Statut :',
    'LBL_TITLE' => 'Fonction :',
    'LBL_UNCONVERTED'=> 'Non-converti',
    'LNK_IMPORT_VCARD' => 'Insérer une vCard',
    'LNK_LEAD_LIST' => 'Leads',
    'LNK_NEW_ACCOUNT' => 'Créer un nouveau Compte',
    'LNK_NEW_APPOINTMENT' => 'Planifier un Rendez-vous ou un Appel',
    'LNK_NEW_CONTACT' => 'Création du Contact',
    'LNK_NEW_LEAD' => 'Créer Lead',
    'LNK_NEW_NOTE' => 'Créer Note',
    'LNK_NEW_TASK' => 'Créer Tâche',
    'LNK_NEW_CASE' => 'Créer Ticket',
    'LNK_NEW_CALL' => 'Planifier Appel',
    'LNK_NEW_MEETING' => 'Planifier Réunion',
    'LNK_NEW_OPPORTUNITY' => 'Créer une nouvelle Affaire',
	'LNK_SELECT_ACCOUNTS' => '<b>OU</b> Sélectionner un Compte',
    'LNK_SELECT_CONTACTS' => '<b>OU</b> Sélectionnez un Contact',
    'NTC_COPY_ALTERNATE_ADDRESS' => 'Copier l&#39;adresse alternative sur l&#39;adresse principale',
    'NTC_COPY_PRIMARY_ADDRESS' => 'Copier l&#39;adresse principale sur l&#39;adresse alternative',
    'NTC_DELETE_CONFIRMATION' => 'Êtes-vous sûr de vouloir supprimer cet enregistrement ?',
    'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Créer une Affaire nécessite un Compte associé.\n Merci de le créer ou de le sélectionner.',
    'NTC_REMOVE_CONFIRMATION' => 'Êtes-vous sûr de vouloir supprimer ce lead ?',
    'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Êtes-vous sûr de vouloir supprimer cet enregistrement en tant que rapport direct ?',
    'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE'=>'Logs des campagnes',
    'LBL_TARGET_OF_CAMPAIGNS'=>'Campagne réussie :',
    'LBL_TARGET_BUTTON_LABEL'=>'Ciblé',
    'LBL_TARGET_BUTTON_TITLE'=>'Ciblé',
    'LBL_TARGET_BUTTON_KEY'=>'T',
    'LBL_CAMPAIGN' => 'Campagne :',
  	'LBL_LIST_ASSIGNED_TO_NAME' => 'Assigné à',
    'LBL_PROSPECT_LIST' => 'Lise des Leads',
    'LBL_PROSPECT' => 'Cible',
    'LBL_CAMPAIGN_LEAD' => 'Campagne(s)',
	'LNK_LEAD_REPORTS' => 'Rapports de Leads',
    'LBL_BIRTHDATE' => 'Date Anniversaire :',
    'LBL_THANKS_FOR_SUBMITTING_LEAD' =>'Merci. Votre inscription à bien été prise en compte.',
    'LBL_SERVER_IS_CURRENTLY_UNAVAILABLE' =>'Nous sommes désolés, le serveur est actuellement indisponible.<br>Merci de réessayer plus tard.',
    'LBL_ASSISTANT_PHONE' => 'Téléphone assistant',
    'LBL_ASSISTANT' => 'Assistant',
    'LBL_REGISTRATION' => 'Enregistrement',
    'LBL_MESSAGE' => 'Veuillez entrer vos information ci-dessous. Informations et / ou un compte sera créé pour vous et sera en attente d&#39;approbation.',
    'LBL_SAVED' => 'Merci de votre enregistrement. Votre compte a été créé et quelqu&#39;un vous contactera trés prochainement.',
    'LBL_CLICK_TO_RETURN' => 'Revenir au portail',
    'LBL_CREATED_USER' => 'Créé par',
    'LBL_MODIFIED_USER' => 'Modifié par',
    'LBL_CAMPAIGNS' => 'Campagnes',
    'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Campagnes',
    'LBL_CONVERT_MODULE_NAME' => 'Module',
    'LBL_CONVERT_MODULE_NAME_SINGULAR' => 'Module',
    'LBL_CONVERT_REQUIRED' => 'Requis',
    'LBL_CONVERT_SELECT' => 'Sélection',
    'LBL_CONVERT_COPY' => 'Copier',
    'LBL_CONVERT_EDIT' => 'Éditer',
    'LBL_CONVERT_DELETE' => 'Supprimer',
    'LBL_CONVERT_ADD_MODULE' => 'Ajouter Module',
    'LBL_CONVERT_EDIT_LAYOUT' => 'Édition de la mise en page de conversion',
    'LBL_CREATE' => 'Création',
    'LBL_SELECT' => '<b>OU</b> Sélectionner',
	'LBL_WEBSITE' => 'Site web',
	'LNK_IMPORT_LEADS' => 'Importer leads',
	'LBL_NOTICE_OLD_LEAD_CONVERT_OVERRIDE' => 'Note : L&#39;écran de conversion de lead suivant contient des champs personnalisés. Lorsque vous personnalisez l&#39;écran de conversion de lead dans le studio pour la première fois, vous allez devoir ajouter vous même les champs personnalisés sur la vue. Les champs personnalisés n&#39;apparaitront plus automatiquement sur la vue comme cela était le cas auparavant.',
//Convert lead tooltips
	'LBL_MODULE_TIP' 	=> 'Le module dans lequel vous souhaitez créer un nouvel enregistrement.',
	'LBL_REQUIRED_TIP' 	=> 'Les modules requis doivent être créés ou sélectionnés avant de convertir le lead.',
	'LBL_COPY_TIP'		=> 'Si la case est cochée, les champs du lead seront copiés dans les champs ayant le même nom dans les enregistrements des modules de destination.',
	'LBL_SELECTION_TIP' => 'Les modules liés avec le module contacts pourront être sélectionnés plutôt que créés durant le processus de conversion de lead.',
	'LBL_EDIT_TIP'		=> 'Modification de la conversion de lead pour ce module.',
	'LBL_DELETE_TIP'	=> 'Suppression de ce module lors de la conversion de lead.',

    'LBL_ACTIVITIES_MOVE'   => 'Déplacer les activités vers',
    'LBL_ACTIVITIES_COPY'   => 'Copier les activités vers',
    'LBL_ACTIVITIES_MOVE_HELP'   => "Sélectionner les enregistrements vers lesquels les activités du lead seront déplacées lors de la conversion. Les activités de type tâches, appels, réunions, notes et emails seront déplacer vers ces enregistrement sélectionnés.",
    'LBL_ACTIVITIES_COPY_HELP'   => "Sélectionner les enregistrements vers lesquels les activités du lead seront copiées lors de la conversion. Des activités de type tâches, appels, réunions et notes seront créés pour chacun des enregistrements sélectionnés. Les emails seront rattachés aux enregistrements sélectionnés.",
    //For export labels
    'LBL_PHONE_HOME' => 'Téléphone principal',
    'LBL_PHONE_MOBILE' => 'Mobile',
    'LBL_PHONE_WORK' => 'Ligne directe',
    'LBL_PHONE_OTHER' => 'Téléphone autre',
    'LBL_PHONE_FAX' => 'Fax',
    'LBL_CAMPAIGN_ID' => 'Id Campagne',
    'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Assigné à',
    'LBL_EXPORT_ASSIGNED_USER_ID' => 'Assigné à (ID)',
    'LBL_EXPORT_MODIFIED_USER_ID' => 'Modifié par (ID)',
    'LBL_EXPORT_CREATED_BY' => 'Créé par (ID)',
    'LBL_EXPORT_PHONE_MOBILE' => 'Portable',
    'LBL_EXPORT_EMAIL2'=>'Autre email',
	'LBL_EDITLAYOUT' => 'Éditer la mise en page' /*for 508 compliance fix*/,
	'LBL_ENTERDATE' => 'Préciser la date' /*for 508 compliance fix*/,
	'LBL_LOADING' => 'Chargement' /*for 508 compliance fix*/,
	'LBL_EDIT_INLINE' => 'Éditer' /*for 508 compliance fix*/,
    //D&B Principal Identification
    'LBL_DNB_PRINCIPAL_ID' => 'ID principal D&B',
    //Dashlet
    'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Affaires',

    //Document title
    'TPL_BROWSER_SUGAR7_RECORDS_TITLE' => '{{module}} &raquo; {{appId}}',
    'TPL_BROWSER_SUGAR7_RECORD_TITLE' => '{{#if last_name}}{{#if first_name}}{{first_name}} {{/if}}{{last_name}} &raquo; {{/if}}{{module}} &raquo; {{appId}}',
    'LBL_NOTES_SUBPANEL_TITLE' => 'Notes',

    'LBL_HELP_CONVERT_TITLE' => 'Convertir un {{module_name}}',

    // Help Text
    // List View Help Text
    'LBL_HELP_RECORDS' => 'Le module {{plural_module_name}} permet de gérer les prospects qui ont montré un intérêt pour l&#39;un de vos produits ou bien l&#39;un de vos services. Une fois qu&#39;un enregistrement du module {{module_name}} et qu&#39;une vente/{{opportunities_singular_module}} semble en bonne voie, les enregistrements du module {{plural_module_name}} peuvent être converti en {{contacts_module}}, {{opportunities_module}}, et {{accounts_module}}. Il y a plusieurs manière de créer des enregistrements dans le module  {{plural_module_name}} au sein de Sugar, comme par exemple via le module {{plural_module_name}} lui-même, en dupliquant un enregistrement existant, en utilisant la fonction d&#39;import du module {{plural_module_name}}, etc. Une fois l&#39;enregistrement créé dans le module {{module_name}}, vous pouvez afficher et modifier les informations directement via le module {{module_name}} en allant sur la vue Enregistrement du module {{plural_module_name}}.',

    // Record View Help Text
    'LBL_HELP_RECORD' => 'Le module {{plural_module_name}} permet de gérer les prospects qui ont montré un intérêt pour l&#39;un de vos produits ou bien l&#39;un de vos services.

- Éditer chaque champs en cliquant directement sur le champ concerné ou en cliquant sur le bouton Éditer.
- Afficher ou modifier les liaisons avec les autres enregistrements via les sous-panels.
- Afficher et participer aux commentaire et au flux d&#39;activité via le module {{activitystream_singular_module}} en cliquant sur le bouton "Flux d’activité".
- Suivre ou mettre en favoris l&#39;enregistrement en utilisant les icônes prévues à cet effet à droite du nom de l&#39;enregistrement.
- Des actions complémentaires sont disponibles dans la listes déroulantes des actions à droite du bouton Éditer.',

    // Create View Help Text
    'LBL_HELP_CREATE' => 'Le module {{plural_module_name}} permet de gérer les prospects qui ont montré un intérêt pour l&#39;un des produits ou services de votre société. Une fois qu&#39;il est considéré comme une vente {{opportunities_singular_module}}, l&#39;enregistrement {{module_name}} peut être converti en {{contacts_singular_module}}, {{accounts_singular_module}}, {{opportunities_singular_module}} ou autre enregistrement.

Pour créer un enregistrement {{module_name}}, les étapes suivantes sont nécessaires :
1. Remplir les champs souhaités.
 - Les champs identifiés comme "Obligatoire" doivent être complétés avant la sauvegarde.
 - Cliquer sur "Afficher plus" pour afficher plus de champs, si nécessaire.
2. Cliquer sur "Sauvegarder" pour finaliser l&#39;enregistrement et retourner sur la page précédente.',

    // Convert View Help Text
    'LBL_HELP_CONVERT' => 'Sugar vous permet de convertir des {{plural_module_name}} en {{contacts_module}}, {{accounts_module}},  ainsi que d&#39;autres modules une fois les critères de qualification de {{module_name}} sont remplis.

Parcourez chaque module en modifiant les champs puis en confirmant les valeurs de la nouvelle fiche en cliquant sur chaque bouton associé. 

Si Sugar détecte un enregistrement existant qui correspond à votre {{module_name}}, vous avez la possibilité de choisir un duplicata et confirmer la sélection avec le bouton associé ou de cliquer sur "Ignorer et créer" afin de continuer la création. 

Après avoir confirmé chacun des modules souhaités, cliquez sur le bouton Enregistrer affin de finaliser la conversions.',

    //Marketo
    'LBL_MKTO_SYNC' => 'Synchronisé avec Marketo&reg;',
    'LBL_MKTO_ID' => 'ID du Lead dans Marketo',
    'LBL_MKTO_LEAD_SCORE' => 'Score du Lead',

    'LBL_FILTER_LEADS_REPORTS' => 'Rapports sur les leads',
    'LBL_DATAPRIVACY_BUSINESS_PURPOSE' => 'Objectifs commerciaux auxquels un consentement a été donné',
    'LBL_DATAPRIVACY_CONSENT_LAST_UPDATED' => 'Dernière mise à jour de consentement',

    // Leads Pipeline view
    'LBL_PIPELINE_ERR_CONVERTED' => 'Unable to change {{moduleSingular}} status. This {{moduleSingular}} has already been converted.',
);
