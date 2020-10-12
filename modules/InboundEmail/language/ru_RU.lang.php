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
/*********************************************************************************

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = array(

	'LBL_ASSIGN_TEAM'		=> 'Назначить командам',

	'LBL_RE'					=> 'RE:',

	'ERR_BAD_LOGIN_PASSWORD'=> 'Неверный логин или пароль',
	'ERR_BODY_TOO_LONG'		=> '\rТекст письма слишком длинный. Часть текста удалена.',
	'ERR_INI_ZLIB'			=> 'Невозможно временно отключить Zlib-сжатие. Тестирование установок может закончиться неудачно.',
	'ERR_MAILBOX_FAIL'		=> 'Невозможно получить ни одной учетной записи.',
	'ERR_NO_IMAP'			=> 'Не найдены библиотеки IMAP. Пожалуйста, решите эту проблему перед тем, как продолжить работу с входящей почтой',
	'ERR_NO_OPTS_SAVED'		=> 'Оптимальные настройки не были сохранены для входящих писем. Пожалуйста, проверьте соответствующие настройки',
	'ERR_TEST_MAILBOX'		=> 'Пожалуйста, проверьте Ваши настройки и попробуйте еще раз.',
    'ERR_DELETE_FOLDER' => 'Не удалось удалить папку.',
    'ERR_UNSUBSCRIBE_FROM_FOLDER' => 'Не удалось отписаться от папки перед удалением.',

	'LBL_APPLY_OPTIMUMS'	=> 'Применить оптимальные настройки',
	'LBL_ASSIGN_TO_USER'	=> 'Назначить пользователю',
	'LBL_AUTOREPLY_OPTIONS'	=> 'Опции автоответа',
	'LBL_AUTOREPLY'			=> 'Шаблон автоматического ответа',
	'LBL_AUTOREPLY_HELP'	=> 'Информировать отправителей электронных писем о том, что их сообщение было получено.',
	'LBL_BASIC'				=> 'Информация об учетной записи',
	'LBL_CASE_MACRO'		=> 'Макрос для Обращений',
	'LBL_CASE_MACRO_DESC'	=> 'Укажите макрос, который будет проанализирован и использован для связи импортированного сообщения с Обращением.',
	'LBL_CASE_MACRO_DESC2'	=> 'Вы можете установить любое значение, но не меняйте значение <b>"%1"</b>.',
	'LBL_CERT_DESC'			=> 'Включить проверку почтовых сертификатов сервера - не использовать, если используется автоподписка.',
	'LBL_CERT'				=> 'Проверка сертификата',
	'LBL_CLOSE_POPUP'		=> 'Закрыть окно',
	'LBL_CREATE_NEW_GROUP'	=> '--Создать почтовую группу при сохранении--',
	'LBL_CREATE_TEMPLATE'	=> 'Создать',
	'LBL_SUBSCRIBE_FOLDERS'	=> 'Подписать папки',
	'LBL_DEFAULT_FROM_ADDR'	=> 'По умолчанию:',
	'LBL_DEFAULT_FROM_NAME'	=> 'По умолчанию:',
	'LBL_DELETE_SEEN'		=> 'Удалить прочтенные письма после импортирования',
	'LBL_EDIT_TEMPLATE'		=> 'Править',
	'LBL_EMAIL_OPTIONS'		=> 'Параметры обработки почты',
	'LBL_EMAIL_BOUNCE_OPTIONS' => 'Параметры обработки возвращаемых E-mail-сообщений',
	'LBL_FILTER_DOMAIN_DESC'=> 'Укажите домен, на который не будут отправляться автоматические ответы.',
	'LBL_ASSIGN_TO_GROUP_FOLDER_DESC'=> 'Автоматически импортировать в Sugar все входящие электронные письма.',
	'LBL_POSSIBLE_ACTION_DESC'		=> 'Для того, чтобы функцией создания Обращений необходимо выбрать групповую папку',
	'LBL_FILTER_DOMAIN'		=> 'Не отправлять автоматический ответ на этот домен',
	'LBL_FIND_OPTIMUM_KEY'	=> 'f',
	'LBL_FIND_OPTIMUM_MSG'	=> 'Поиск оптимальных настроек соединения.',
	'LBL_FIND_OPTIMUM_TITLE'=> 'Найти оптимальную конфигурацию',
	'LBL_FIND_SSL_WARN'		=> 'Тестирование SSL может занять продолжительное время. Пожалуйста, подождите...',
	'LBL_FORCE_DESC'		=> 'Некоторые IMAP/POP3 серверы требуют специальные ключи. Проверьте принудительное использование негативных ключей во время соединения (например, /notls)',
	'LBL_FORCE'				=> 'Принудительное использование отрицательных ключей',
	'LBL_FOUND_MAILBOXES'	=> 'Найдены следующие почтовые ящики.<br />Выберите один из них:',
	'LBL_FOUND_OPTIMUM_MSG'	=> 'Найдены оптимальные настройки. Нажмите кнопку ниже для того, чтобы применить их к Вашему почтовому ящику.',
	'LBL_FROM_ADDR'			=> 'Адрес отправителя',
    // as long as XTemplate doesn't support output escaping, transform
    // quotes to html-entities right here (bug #48913)
    'LBL_FROM_ADDR_DESC'    => "Предоставленный email-адрес может не отображаться в поле \"От\" в отправленных сообщениях из-за ограничений, установленных почтовым провайдером. В таком случае будет использоваться email-адрес, указанный для исходящего почтового сервера.",
	'LBL_FROM_NAME_ADDR'	=> 'От имени/С адреса',
	'LBL_FROM_NAME'			=> 'От (имя)',
	'LBL_GROUP_QUEUE'		=> 'Приписать к группе',
    'LBL_HOME'              => 'Главная',
	'LBL_LIST_MAILBOX_TYPE'	=> 'Действие',
	'LBL_LIST_NAME'			=> 'Имя',
	'LBL_LIST_GLOBAL_PERSONAL'			=> 'Тип',
	'LBL_LIST_SERVER_URL'	=> 'Почтовый сервер',
	'LBL_LIST_STATUS'		=> 'Статус',
	'LBL_LOGIN'				=> 'Логин',
	'LBL_MAILBOX_DEFAULT'	=> 'ВХОДЯЩИЕ',
	'LBL_MAILBOX_SSL_DESC'	=> 'Использовать SSL при соединении. Если SSL не работает, то проверьте наличие параметра "--with-imap-ssl" при конфигурировании исходных текстов PHP.',
	'LBL_MAILBOX_SSL'		=> 'Использовать SSL',
	'LBL_MAILBOX_TYPE'		=> 'Возможные действия',
	'LBL_DISTRIBUTION_METHOD' => 'Алгоритм назначения ответственного',
	'LBL_CREATE_CASE_REPLY_TEMPLATE' => 'Шаблон автоматического ответа на новые Обращения',
	'LBL_CREATE_CASE_REPLY_TEMPLATE_HELP' => 'Автоматически информировать отправителей электронных писем о создании нового Обращения. В теме письма будет содержаться номер Обращения, формат которого будет сформирован на основе макроса Обращения. Авто-ответ будет отправлен только при получении первого письма от отправителя.',
	'LBL_MAILBOX'			=> 'Проверяемые папки',
	'LBL_TRASH_FOLDER'		=> 'Удаленные',
	'LBL_GET_TRASH_FOLDER'	=> 'Получить папку "Удаленные"',
	'LBL_SENT_FOLDER'		=> 'Отправленные',
	'LBL_GET_SENT_FOLDER'	=> 'Получить папку "Отправленные"',
	'LBL_SELECT'				=> 'Выбрать',
	'LBL_MARK_READ_DESC'	=> 'Помечать сообщения как прочитанные на почтовом сервере при импорте; не удалять сообщения с сервера.',
	'LBL_MARK_READ_NO'		=> 'E-mail-сообщения помечаются удаленными после импортирования',
	'LBL_MARK_READ_YES'		=> 'E-mail-сообщения остаются на сервере при импорте',
	'LBL_MARK_READ'			=> 'Оставлять сообщения на сервере',
	'LBL_MAX_AUTO_REPLIES'	=> 'Ограничение количества автоответов',
	'LBL_MAX_AUTO_REPLIES_DESC'	=> 'Установка максимального количества отправляемых автоматических ответов на уникальный E-mail в течение 24 часов.',
	'LBL_PERSONAL_MODULE_NAME' => 'Персональная учетная запись E-mail',
	'LBL_PERSONAL_MODULE_NAME_SINGULAR' => 'Персональная учетная запись E-mail',
	'LBL_CREATE_CASE'      => 'Создать Обращение из E-mail',
	'LBL_CREATE_CASE_HELP'  => 'Автоматически создавать Обращения из входящих электронных писем.',
	'LBL_MODULE_NAME'		=> 'Групповая учетная запись E-mail',
	'LBL_MODULE_NAME_SINGULAR' => 'Групповая учетная запись E-mail',
	'LBL_BOUNCE_MODULE_NAME' => 'Учетная запись для обработки возвращаемых E-mail',
	'LBL_MODULE_TITLE'		=> 'Групповые учётные записи',
	'LBL_NAME'				=> 'Имя',
    'LBL_NONE'              => '--не выбрано--',
	'LBL_NO_OPTIMUMS'		=> 'Невозможно определить оптимальные настройки. Пожалуйста, проверьте ваши настройки и попробуйте еще раз.',
	'LBL_ONLY_SINCE_DESC'	=> 'При использовании протокола POP3, PHP не может отличать новые/непрочитанные сообщения. Эта опция позволяет проверять сообщения, появившиеся после последнего опроса почтового ящика. Это значительно улучшит производительность системы, если ваш почтовый сервер не поддерживает протокол IMAP.',
	'LBL_ONLY_SINCE_NO'		=> 'Нет. Проверьте соответствующие письма на почтовом сервере.',
	'LBL_ONLY_SINCE_YES'	=> 'Да.',
	'LBL_ONLY_SINCE'		=> 'Импорт только новых сообщений:',
	'LBL_OUTBOUND_SERVER'	=> 'Сервер исходящей почты',
	'LBL_PASSWORD_CHECK'	=> 'Проверка пароля',
	'LBL_PASSWORD'			=> 'Пароль',
	'LBL_POP3_SUCCESS'		=> 'Тестирование POP3-соединения выполнено успешно.',
	'LBL_POPUP_FAILURE'		=> 'Тестирование соединения завершилось неудачно. Ошибка показана ниже.',
	'LBL_POPUP_SUCCESS'		=> 'Тестирование соединения выполнено успешно.  Ваши настройки работают.',
	'LBL_POPUP_TITLE'		=> 'Тестирование настроек...',
	'LBL_GETTING_FOLDERS_LIST' 		=> 'Получение списка папок',
	'LBL_SELECT_SUBSCRIBED_FOLDERS' 		=> 'Выбрать папку/папки',
	'LBL_SELECT_TRASH_FOLDERS' 		=> 'Выбрать папку "Удаленные"',
	'LBL_SELECT_SENT_FOLDERS' 		=> 'Выбрать папку "Отправленные"',
	'LBL_DELETED_FOLDERS_LIST' 		=> 'Следующие папки не существуют или были удалены с сервера: %s',
	'LBL_PORT'				=> 'Порт',
	'LBL_QUEUE'				=> 'Почтовая очередь',
	'LBL_REPLY_NAME_ADDR'	=> 'Имя и адрес для ответа',
	'LBL_REPLY_TO_NAME'		=> 'Имя для ответа',
	'LBL_REPLY_TO_ADDR'		=> 'Адрес для ответа',
	'LBL_SAME_AS_ABOVE'		=> 'Использовать Имя/Адрес',
	'LBL_SAVE_RAW'			=> 'Сохранять исходный текст',
	'LBL_SAVE_RAW_DESC_1'	=> 'Выберите "Да", если вы хотите сохранить исходный текст каждого поступившего письма.',
	'LBL_SAVE_RAW_DESC_2'	=> 'Большие вложения могут стать причиной ошибки в неверно сконфигурированных БД.',
	'LBL_SERVER_OPTIONS'	=> 'Дополнительные опции почтового сервера',
	'LBL_SERVER_TYPE'		=> 'Протокол почтового сервера',
	'LBL_SERVER_URL'		=> 'Сервер входящей почты',
	'LBL_SSL_DESC'			=> 'Если ваш почтовый сервер поддерживает защищенное соединение, то при импортировании E-mail будет использовано шифрование SSL.',
	'LBL_ASSIGN_TO_TEAM_DESC' => 'У выбранной команды есть доступ к учетной почтовой записи.',
	'LBL_SSL'				=> 'Использовать шифрование (SSL)',
	'LBL_STATUS'			=> 'Статус',
	'LBL_SYSTEM_DEFAULT'	=> 'По умолчанию',
	'LBL_TEST_BUTTON_KEY'	=> 't',
	'LBL_TEST_BUTTON_TITLE'	=> 'Оправить тестовое сообщение [Alt+T]',
	'LBL_TEST_SETTINGS'		=> 'Проверить настройки',
	'LBL_TEST_SUCCESSFUL'	=> 'Соединение успешно установлено.',
	'LBL_TEST_WAIT_MESSAGE'	=> 'Пожалуйста, подождите...',
	'LBL_TLS_DESC'			=> 'Использование TLS при соединении с почтовым сервером - используйте этот параметр только в случае поддержки данного протокола почтовым сервером.',
	'LBL_TLS'				=> 'Использовать TLS',
	'LBL_WARN_IMAP_TITLE'	=> 'Исходящий E-mail отключен',
	'LBL_WARN_IMAP'			=> 'Предупреждения:',
	'LBL_WARN_NO_IMAP'		=> 'Эта система не имеет IMAP-клиента, откомпилированного в PHP-модуле (--with-imap=/path/to/imap_c-client_library).  Пожалуйста, свяжитесь с Вашим администратором для решений этой проблемы.',

	'LNK_CREATE_GROUP'		=> 'Новая группа',
	'LNK_LIST_CREATE_NEW_GROUP'	 => 'Новая групповая учетная запись',
	'LNK_LIST_CREATE_NEW_BOUNCE' => 'Новая учетная запись для обработки возвращаемой почты',
	'LNK_LIST_MAILBOXES'	=> 'Все учетные записи',
	'LNK_LIST_QUEUES'		=> 'Все очереди',
	'LNK_LIST_SCHEDULER'	=> 'Планировщик заданий',
	'LNK_LIST_TEST_IMPORT'	=> 'Тестирование импорта почты',
	'LNK_NEW_QUEUES'		=> 'Новая очередь',
	'LNK_SEED_QUEUES'		=> 'Новая очередь из групп',
	'LBL_GROUPFOLDER_ID'	=> 'Групповая папка (Id)',
	'LBL_ASSIGN_TO_GROUP_FOLDER' => 'Назначить групповой папке',
    'LBL_STATUS_ACTIVE'     => 'Активно',
    'LBL_STATUS_INACTIVE'   => 'Неактивно',
    'LBL_IS_PERSONAL' => 'персональная почтовый ящик',
    'LBL_IS_GROUP' => 'групповая',
    'LBL_ENABLE_AUTO_IMPORT' => 'Автоматически импортировать E-mail-сообщения',
    'LBL_WARNING_CHANGING_AUTO_IMPORT' => 'Предупреждение: Вы изменяете параметр автоматического импорта, что может привести к потере данных.',
    'LBL_WARNING_CHANGING_AUTO_IMPORT_WITH_CREATE_CASE' => 'Предупреждение: При автоматическом создании Обращений авто импорт также должен быть включен.',
	'LBL_EDIT_LAYOUT' => 'Правка расположения' /*for 508 compliance fix*/,
);
?>
