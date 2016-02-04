# osCommerce, Open Source E-Commerce Solutions
# http://www.oscommerce.com
#
# Database Backup For Hess Store
# Copyright (c) 2015 Frank Hess
# with modifications made in 2016 by Maik Wagner - www.linuxandlanguages.com
#

drop table if exists action_recorder;
create table action_recorder (
  id int(11) not null auto_increment,
  module varchar(255) not null ,
  user_id int(11) ,
  user_name varchar(255) ,
  identifier varchar(255) not null ,
  success char(1) ,
  date_added datetime not null ,
  PRIMARY KEY (id),
  KEY idx_action_recorder_module (module),
  KEY idx_action_recorder_user_id (user_id),
  KEY idx_action_recorder_identifier (identifier),
  KEY idx_action_recorder_date_added (date_added)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists address_book;
create table address_book (
  address_book_id int(11) not null auto_increment,
  customers_id int(11) not null ,
  entry_gender char(1) ,
  entry_company varchar(255) ,
  entry_firstname varchar(255) not null ,
  entry_lastname varchar(255) not null ,
  entry_street_address varchar(255) not null ,
  entry_suburb varchar(255) ,
  entry_postcode varchar(255) not null ,
  entry_city varchar(255) not null ,
  entry_state varchar(255) ,
  entry_country_id int(11) default '0' not null ,
  entry_zone_id int(11) default '0' not null ,
  PRIMARY KEY (address_book_id),
  KEY idx_address_book_customers_id (customers_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;


drop table if exists address_format;
create table address_format (
  address_format_id int(11) not null auto_increment,
  address_format varchar(128) not null ,
  address_summary varchar(48) not null ,
  PRIMARY KEY (address_format_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into address_format (address_format_id, address_format, address_summary) values ('1', '$firstname $lastname$cr$streets$cr$city, $postcode$cr$statecomma$country', '$city / $country');
insert into address_format (address_format_id, address_format, address_summary) values ('2', '$firstname $lastname$cr$streets$cr$city, $state    $postcode$cr$country', '$city, $state / $country');
insert into address_format (address_format_id, address_format, address_summary) values ('3', '$firstname $lastname$cr$streets$cr$city$cr$postcode - $statecomma$country', '$state / $country');
insert into address_format (address_format_id, address_format, address_summary) values ('4', '$firstname $lastname$cr$streets$cr$city ($postcode)$cr$country', '$postcode / $country');
insert into address_format (address_format_id, address_format, address_summary) values ('5', '$firstname $lastname$cr$streets$cr$postcode $city$cr$country', '$city / $country');

drop table if exists administrators;
create table administrators (
  id int(11) not null auto_increment,
  user_name varchar(255) not null ,
  user_password varchar(60) not null ,
  PRIMARY KEY (id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists banners;
create table banners (
  banners_id int(11) not null auto_increment,
  banners_title varchar(64) not null ,
  banners_url varchar(255) not null ,
  banners_image varchar(64) not null ,
  banners_group varchar(10) not null ,
  banners_html_text text ,
  expires_impressions int(7) default '0' ,
  expires_date datetime ,
  date_scheduled datetime ,
  date_added datetime not null ,
  date_status_change datetime ,
  status int(1) default '1' not null ,
  PRIMARY KEY (banners_id),
  KEY idx_banners_group (banners_group)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into banners (banners_id, banners_title, banners_url, banners_image, banners_group, banners_html_text, expires_impressions, expires_date, date_scheduled, date_added, date_status_change, status) values ('1', 'osCommerce', 'http://www.oscommerce.com', 'banners/oscommerce.gif', 'footer', '', '0', NULL, NULL, '2015-02-23 09:52:38', NULL, '1');

drop table if exists banners_history;
create table banners_history (
  banners_history_id int(11) not null auto_increment,
  banners_id int(11) not null ,
  banners_shown int(5) default '0' not null ,
  banners_clicked int(5) default '0' not null ,
  banners_history_date datetime not null ,
  PRIMARY KEY (banners_history_id),
  KEY idx_banners_history_banners_id (banners_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists cache;
create table cache (
  cache_id varchar(32) not null ,
  cache_language_id tinyint(1) default '0' not null ,
  cache_name varchar(255) not null ,
  cache_data longtext not null ,
  cache_global tinyint(1) default '1' not null ,
  cache_gzip tinyint(1) default '1' not null ,
  cache_method varchar(20) default 'RETURN' not null ,
  cache_date datetime not null ,
  cache_expires datetime not null ,
  PRIMARY KEY (cache_id, cache_language_id),
  KEY cache_id (cache_id),
  KEY cache_language_id (cache_language_id),
  KEY cache_global (cache_global)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists categories;
create table categories (
  categories_id int(11) not null auto_increment,
  categories_image varchar(64) ,
  parent_id int(11) default '0' not null ,
  sort_order int(3) ,
  date_added datetime ,
  last_modified datetime ,
  PRIMARY KEY (categories_id),
  KEY idx_categories_parent_id (parent_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('1', 'category_hardware.gif', '0', '1', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('2', 'category_software.gif', '0', '2', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('3', 'category_dvd_movies.gif', '0', '3', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('4', 'subcategory_graphic_cards.gif', '1', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('5', 'subcategory_printers.gif', '1', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('6', 'subcategory_monitors.gif', '1', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('7', 'subcategory_speakers.gif', '1', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('8', 'subcategory_keyboards.gif', '1', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('9', 'subcategory_mice.gif', '1', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('10', 'subcategory_action.gif', '3', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('11', 'subcategory_science_fiction.gif', '3', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('12', 'subcategory_comedy.gif', '3', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('13', 'subcategory_cartoons.gif', '3', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('14', 'subcategory_thriller.gif', '3', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('15', 'subcategory_drama.gif', '3', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('16', 'subcategory_memory.gif', '1', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('17', 'subcategory_cdrom_drives.gif', '1', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('18', 'subcategory_simulation.gif', '2', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('19', 'subcategory_action_games.gif', '2', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('20', 'subcategory_strategy.gif', '2', '0', '2015-02-23 09:52:38', NULL);
insert into categories (categories_id, categories_image, parent_id, sort_order, date_added, last_modified) values ('21', 'category_gadgets.png', '0', '4', '2015-02-23 09:52:38', NULL);

drop table if exists categories_description;
create table categories_description (
  categories_id int(11) default '0' not null ,
  language_id int(11) default '1' not null ,
  categories_name varchar(32) not null ,
  PRIMARY KEY (categories_id, language_id),
  KEY idx_categories_name (categories_name)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into categories_description (categories_id, language_id, categories_name) values ('10', '1', 'Action');
insert into categories_description (categories_id, language_id, categories_name) values ('10', '2', 'Action');
insert into categories_description (categories_id, language_id, categories_name) values ('19', '1', 'Action');
insert into categories_description (categories_id, language_id, categories_name) values ('19', '2', 'Action');
insert into categories_description (categories_id, language_id, categories_name) values ('13', '1', 'Cartoons');
insert into categories_description (categories_id, language_id, categories_name) values ('13', '2', 'Cartoons');
insert into categories_description (categories_id, language_id, categories_name) values ('17', '1', 'CDROM-Laufwerke');
insert into categories_description (categories_id, language_id, categories_name) values ('17', '2', 'CDROM Drives');
insert into categories_description (categories_id, language_id, categories_name) values ('12', '1', 'Komödie');
insert into categories_description (categories_id, language_id, categories_name) values ('12', '2', 'Comedy');
insert into categories_description (categories_id, language_id, categories_name) values ('15', '1', 'Drama');
insert into categories_description (categories_id, language_id, categories_name) values ('15', '2', 'Drama');
insert into categories_description (categories_id, language_id, categories_name) values ('3', '1', 'DVD Filme');
insert into categories_description (categories_id, language_id, categories_name) values ('3', '2', 'DVD Films');
insert into categories_description (categories_id, language_id, categories_name) values ('21', '1', 'Gadgets');
insert into categories_description (categories_id, language_id, categories_name) values ('21', '2', 'Gadgets');
insert into categories_description (categories_id, language_id, categories_name) values ('4', '1', 'Grafikkarten');
insert into categories_description (categories_id, language_id, categories_name) values ('4', '2', 'Grafic Cards');
insert into categories_description (categories_id, language_id, categories_name) values ('1', '1', 'Hardware');
insert into categories_description (categories_id, language_id, categories_name) values ('1', '2', 'Hardware');
insert into categories_description (categories_id, language_id, categories_name) values ('8', '1', 'Tastaturen');
insert into categories_description (categories_id, language_id, categories_name) values ('8', '2', 'Tastaturen');
insert into categories_description (categories_id, language_id, categories_name) values ('16', '1', 'Arbeitsspeicher');
insert into categories_description (categories_id, language_id, categories_name) values ('16', '2', 'Computer Memory');
insert into categories_description (categories_id, language_id, categories_name) values ('9', '1', 'Mäuse');
insert into categories_description (categories_id, language_id, categories_name) values ('9', '2', 'Mice');
insert into categories_description (categories_id, language_id, categories_name) values ('6', '1', 'Monitore');
insert into categories_description (categories_id, language_id, categories_name) values ('6', '2', 'Monitors');
insert into categories_description (categories_id, language_id, categories_name) values ('5', '1', 'Drucker');
insert into categories_description (categories_id, language_id, categories_name) values ('5', '2', 'Printers');
insert into categories_description (categories_id, language_id, categories_name) values ('11', '1', 'Science Fiction');
insert into categories_description (categories_id, language_id, categories_name) values ('11', '2', 'Science Fiction');
insert into categories_description (categories_id, language_id, categories_name) values ('18', '1', 'Simulation');
insert into categories_description (categories_id, language_id, categories_name) values ('18', '2', 'Simulation');
insert into categories_description (categories_id, language_id, categories_name) values ('2', '1', 'Software');
insert into categories_description (categories_id, language_id, categories_name) values ('2', '2', 'Software');
insert into categories_description (categories_id, language_id, categories_name) values ('7', '1', 'Lautsprecher');
insert into categories_description (categories_id, language_id, categories_name) values ('7', '2', 'Speakers');
insert into categories_description (categories_id, language_id, categories_name) values ('20', '1', 'Strategie');
insert into categories_description (categories_id, language_id, categories_name) values ('20', '2', 'Strategy');
insert into categories_description (categories_id, language_id, categories_name) values ('14', '1', 'Thriller');
insert into categories_description (categories_id, language_id, categories_name) values ('14', '2', 'Thriller');

drop table if exists configuration;
create table configuration (
  configuration_id int(11) not null auto_increment,
  configuration_title varchar(255) not null ,
  configuration_key varchar(255) not null ,
  configuration_value text not null ,
  configuration_description varchar(255) not null ,
  configuration_group_id int(11) not null ,
  sort_order int(5) ,
  last_modified datetime ,
  date_added datetime not null ,
  use_function varchar(255) ,
  set_function varchar(255) ,
  PRIMARY KEY (configuration_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('1', 'Store Name', 'STORE_NAME', 'Hess Store', 'The name of my store', '1', '1', '2015-02-24 12:25:51', '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('2', 'Store Owner', 'STORE_OWNER', 'Frank Hess', 'The name of my store owner', '1', '2', '2015-02-24 12:25:59', '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('3', 'E-Mail Address', 'STORE_OWNER_EMAIL_ADDRESS', 'hess@localhost.net', 'The e-mail address of my store owner', '1', '3', '2015-02-24 12:26:14', '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('4', 'E-Mail From', 'EMAIL_FROM', 'hess@localhost.net', 'The e-mail address used in (sent) e-mails', '1', '4', '2015-02-24 12:26:32', '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('5', 'Country', 'STORE_COUNTRY', '81', 'The country my store is located in <br /><br /><strong>Note: Please remember to update the store zone.</strong>', '1', '6', '2015-02-24 12:26:43', '2015-02-23 09:52:38', 'tep_get_country_name', 'tep_cfg_pull_down_country_list(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('6', 'Zone', 'STORE_ZONE', '86', 'The zone my store is located in', '1', '7', '2015-03-04 08:43:29', '2015-02-23 09:52:38', 'tep_cfg_get_zone_name', 'tep_cfg_pull_down_zone_list(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('7', 'Expected Sort Order', 'EXPECTED_PRODUCTS_SORT', 'desc', 'This is the sort order used in the expected products box.', '1', '8', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'asc\', \'desc\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('8', 'Expected Sort Field', 'EXPECTED_PRODUCTS_FIELD', 'date_expected', 'The column to sort by in the expected products box.', '1', '9', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'products_name\', \'date_expected\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('9', 'Switch To Default Language Currency', 'USE_DEFAULT_LANGUAGE_CURRENCY', 'false', 'Automatically switch to the language\'s currency when it is changed', '1', '10', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('10', 'Send Extra Order Emails To', 'SEND_EXTRA_ORDER_EMAILS_TO', '', 'Send extra order emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', '1', '11', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('11', 'Use Search-Engine Safe URLs', 'SEARCH_ENGINE_FRIENDLY_URLS', 'false', 'Use search-engine safe urls for all site links', '1', '12', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('12', 'Display Cart After Adding Product', 'DISPLAY_CART', 'true', 'Display the shopping cart after adding a product (or return back to their origin)', '1', '14', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('13', 'Allow Guest To Tell A Friend', 'ALLOW_GUEST_TO_TELL_A_FRIEND', 'false', 'Allow guests to tell a friend about a product', '1', '15', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('14', 'Default Search Operator', 'ADVANCED_SEARCH_DEFAULT_OPERATOR', 'and', 'Default search operators', '1', '17', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'and\', \'or\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('15', 'Store Address and Phone', 'STORE_NAME_ADDRESS', 'Hess Strore
Strasse
PLZ Ort
Land
Bankverbindung:', 'This is the Store Name, Address and Phone used on printable documents and displayed online', '1', '18', '2015-03-09 16:03:45', '2015-02-23 09:52:38', NULL, 'tep_cfg_textarea(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('16', 'Show Category Counts', 'SHOW_COUNTS', 'true', 'Count recursively how many products are in each category', '1', '19', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('17', 'Tax Decimal Places', 'TAX_DECIMAL_PLACES', '2', 'Pad the tax value this amount of decimal places', '1', '20', '2015-03-04 08:56:54', '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('18', 'Display Prices with Tax', 'DISPLAY_PRICE_WITH_TAX', 'true', 'Display prices with tax included (true) or add the tax at the end (false)', '1', '21', '2015-03-04 08:56:42', '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('19', 'First Name', 'ENTRY_FIRST_NAME_MIN_LENGTH', '2', 'Minimum length of first name', '2', '1', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('20', 'Last Name', 'ENTRY_LAST_NAME_MIN_LENGTH', '2', 'Minimum length of last name', '2', '2', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('21', 'Date of Birth', 'ENTRY_DOB_MIN_LENGTH', '10', 'Minimum length of date of birth', '2', '3', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('22', 'E-Mail Address', 'ENTRY_EMAIL_ADDRESS_MIN_LENGTH', '6', 'Minimum length of e-mail address', '2', '4', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('23', 'Street Address', 'ENTRY_STREET_ADDRESS_MIN_LENGTH', '5', 'Minimum length of street address', '2', '5', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('24', 'Company', 'ENTRY_COMPANY_MIN_LENGTH', '2', 'Minimum length of company name', '2', '6', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('25', 'Post Code', 'ENTRY_POSTCODE_MIN_LENGTH', '4', 'Minimum length of post code', '2', '7', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('26', 'City', 'ENTRY_CITY_MIN_LENGTH', '3', 'Minimum length of city', '2', '8', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('27', 'State', 'ENTRY_STATE_MIN_LENGTH', '2', 'Minimum length of state', '2', '9', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('28', 'Telephone Number', 'ENTRY_TELEPHONE_MIN_LENGTH', '3', 'Minimum length of telephone number', '2', '10', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('29', 'Password', 'ENTRY_PASSWORD_MIN_LENGTH', '5', 'Minimum length of password', '2', '11', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('30', 'Credit Card Owner Name', 'CC_OWNER_MIN_LENGTH', '3', 'Minimum length of credit card owner name', '2', '12', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('31', 'Credit Card Number', 'CC_NUMBER_MIN_LENGTH', '10', 'Minimum length of credit card number', '2', '13', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('32', 'Review Text', 'REVIEW_TEXT_MIN_LENGTH', '50', 'Minimum length of review text', '2', '14', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('33', 'Best Sellers', 'MIN_DISPLAY_BESTSELLERS', '1', 'Minimum number of best sellers to display', '2', '15', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('34', 'Also Purchased', 'MIN_DISPLAY_ALSO_PURCHASED', '1', 'Minimum number of products to display in the \'This Customer Also Purchased\' box', '2', '16', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('35', 'Address Book Entries', 'MAX_ADDRESS_BOOK_ENTRIES', '5', 'Maximum address book entries a customer is allowed to have', '3', '1', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('36', 'Search Results', 'MAX_DISPLAY_SEARCH_RESULTS', '20', 'Amount of products to list', '3', '2', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('37', 'Page Links', 'MAX_DISPLAY_PAGE_LINKS', '5', 'Number of \'number\' links use for page-sets', '3', '3', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('38', 'Special Products', 'MAX_DISPLAY_SPECIAL_PRODUCTS', '9', 'Maximum number of products on special to display', '3', '4', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('39', 'New Products Module', 'MAX_DISPLAY_NEW_PRODUCTS', '9', 'Maximum number of new products to display in a category', '3', '5', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('40', 'Products Expected', 'MAX_DISPLAY_UPCOMING_PRODUCTS', '10', 'Maximum number of products expected to display', '3', '6', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('41', 'Manufacturers List', 'MAX_DISPLAY_MANUFACTURERS_IN_A_LIST', '0', 'Used in manufacturers box; when the number of manufacturers exceeds this number, a drop-down list will be displayed instead of the default list', '3', '7', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('42', 'Manufacturers Select Size', 'MAX_MANUFACTURERS_LIST', '1', 'Used in manufacturers box; when this value is \'1\' the classic drop-down list will be used for the manufacturers box. Otherwise, a list-box with the specified number of rows will be displayed.', '3', '7', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('43', 'Length of Manufacturers Name', 'MAX_DISPLAY_MANUFACTURER_NAME_LEN', '15', 'Used in manufacturers box; maximum length of manufacturers name to display', '3', '8', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('44', 'New Reviews', 'MAX_DISPLAY_NEW_REVIEWS', '6', 'Maximum number of new reviews to display', '3', '9', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('45', 'Selection of Random Reviews', 'MAX_RANDOM_SELECT_REVIEWS', '10', 'How many records to select from to choose one random product review', '3', '10', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('46', 'Selection of Random New Products', 'MAX_RANDOM_SELECT_NEW', '10', 'How many records to select from to choose one random new product to display', '3', '11', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('47', 'Selection of Products on Special', 'MAX_RANDOM_SELECT_SPECIALS', '10', 'How many records to select from to choose one random product special to display', '3', '12', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('48', 'Categories To List Per Row', 'MAX_DISPLAY_CATEGORIES_PER_ROW', '3', 'How many categories to list per row', '3', '13', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('49', 'New Products Listing', 'MAX_DISPLAY_PRODUCTS_NEW', '10', 'Maximum number of new products to display in new products page', '3', '14', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('50', 'Best Sellers', 'MAX_DISPLAY_BESTSELLERS', '10', 'Maximum number of best sellers to display', '3', '15', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('51', 'Also Purchased', 'MAX_DISPLAY_ALSO_PURCHASED', '6', 'Maximum number of products to display in the \'This Customer Also Purchased\' box', '3', '16', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('52', 'Customer Order History Box', 'MAX_DISPLAY_PRODUCTS_IN_ORDER_HISTORY_BOX', '6', 'Maximum number of products to display in the customer order history box', '3', '17', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('53', 'Order History', 'MAX_DISPLAY_ORDER_HISTORY', '10', 'Maximum number of orders to display in the order history page', '3', '18', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('54', 'Product Quantities In Shopping Cart', 'MAX_QTY_IN_CART', '99', 'Maximum number of product quantities that can be added to the shopping cart (0 for no limit)', '3', '19', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('55', 'Small Image Width', 'SMALL_IMAGE_WIDTH', '100', 'The pixel width of small images', '4', '1', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('56', 'Small Image Height', 'SMALL_IMAGE_HEIGHT', '80', 'The pixel height of small images', '4', '2', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('57', 'Heading Image Width', 'HEADING_IMAGE_WIDTH', '57', 'The pixel width of heading images', '4', '3', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('58', 'Heading Image Height', 'HEADING_IMAGE_HEIGHT', '40', 'The pixel height of heading images', '4', '4', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('59', 'Subcategory Image Width', 'SUBCATEGORY_IMAGE_WIDTH', '100', 'The pixel width of subcategory images', '4', '5', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('60', 'Subcategory Image Height', 'SUBCATEGORY_IMAGE_HEIGHT', '57', 'The pixel height of subcategory images', '4', '6', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('61', 'Calculate Image Size', 'CONFIG_CALCULATE_IMAGE_SIZE', 'true', 'Calculate the size of images?', '4', '7', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('62', 'Image Required', 'IMAGE_REQUIRED', 'true', 'Enable to display broken images. Good for development.', '4', '8', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('63', 'Gender', 'ACCOUNT_GENDER', 'true', 'Display gender in the customers account', '5', '1', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('64', 'Date of Birth', 'ACCOUNT_DOB', 'true', 'Display date of birth in the customers account', '5', '2', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('65', 'Company', 'ACCOUNT_COMPANY', 'true', 'Display company in the customers account', '5', '3', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('66', 'Suburb', 'ACCOUNT_SUBURB', 'true', 'Display suburb in the customers account', '5', '4', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('67', 'State', 'ACCOUNT_STATE', 'true', 'Display state in the customers account', '5', '5', NULL, '2015-02-23 09:52:38', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('68', 'Installed Modules', 'MODULE_PAYMENT_INSTALLED', 'cod.php;moneyorder.php;paypal_express.php', 'List of payment module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: cod.php;paypal_express.php)', '6', '0', '2015-03-02 14:25:20', '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('69', 'Installed Modules', 'MODULE_ORDER_TOTAL_INSTALLED', 'ot_subtotal.php;ot_shipping.php;ot_tax.php;ot_total.php', 'List of order_total module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: ot_subtotal.php;ot_tax.php;ot_shipping.php;ot_total.php)', '6', '0', '2015-03-09 18:30:05', '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('70', 'Installed Modules', 'MODULE_SHIPPING_INSTALLED', 'flat.php', 'List of shipping module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: ups.php;flat.php;item.php)', '6', '0', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('71', 'Installed Modules', 'MODULE_ACTION_RECORDER_INSTALLED', 'ar_admin_login.php;ar_contact_us.php;ar_reset_password.php;ar_tell_a_friend.php', 'List of action recorder module filenames separated by a semi-colon. This is automatically updated. No need to edit.', '6', '0', NULL, '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('72', 'Installed Modules', 'MODULE_SOCIAL_BOOKMARKS_INSTALLED', 'sb_email.php;sb_google_plus_share.php;sb_facebook.php;sb_twitter.php;sb_pinterest.php', 'List of social bookmark module filenames separated by a semi-colon. This is automatically updated. No need to edit.', '6', '0', '2015-03-09 18:30:02', '2015-02-23 09:52:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('73', 'Enable Cash On Delivery Module', 'MODULE_PAYMENT_COD_STATUS', 'True', 'Do you want to accept Cash On Delevery payments?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('74', 'Payment Zone', 'MODULE_PAYMENT_COD_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', NULL, '2015-02-23 09:52:39', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('75', 'Sort order of display.', 'MODULE_PAYMENT_COD_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('76', 'Set Order Status', 'MODULE_PAYMENT_COD_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', NULL, '2015-02-23 09:52:39', 'tep_get_order_status_name', 'tep_cfg_pull_down_order_statuses(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('77', 'Enable Flat Shipping', 'MODULE_SHIPPING_FLAT_STATUS', 'True', 'Do you want to offer flat rate shipping?', '6', '0', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('78', 'Shipping Cost', 'MODULE_SHIPPING_FLAT_COST', '5.00', 'The shipping cost for all orders using this shipping method.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('79', 'Tax Class', 'MODULE_SHIPPING_FLAT_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', NULL, '2015-02-23 09:52:39', 'tep_get_tax_class_title', 'tep_cfg_pull_down_tax_classes(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('80', 'Shipping Zone', 'MODULE_SHIPPING_FLAT_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '0', NULL, '2015-02-23 09:52:39', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('81', 'Sort Order', 'MODULE_SHIPPING_FLAT_SORT_ORDER', '0', 'Sort order of display.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('82', 'Default Currency', 'DEFAULT_CURRENCY', 'EUR', 'Default Currency', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('83', 'Default Language', 'DEFAULT_LANGUAGE', 'de', 'Default Language', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('84', 'Default Order Status For New Orders', 'DEFAULT_ORDERS_STATUS_ID', '1', 'When a new order is created, this order status will be assigned to it.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('85', 'Display Shipping', 'MODULE_ORDER_TOTAL_SHIPPING_STATUS', 'true', 'Do you want to display the order shipping cost?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('86', 'Sort Order', 'MODULE_ORDER_TOTAL_SHIPPING_SORT_ORDER', '2', 'Sort order of display.', '6', '2', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('87', 'Allow Free Shipping', 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING', 'false', 'Do you want to allow free shipping?', '6', '3', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('88', 'Free Shipping For Orders Over', 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER', '50', 'Provide free shipping for orders over the set amount.', '6', '4', NULL, '2015-02-23 09:52:39', 'currencies->format', NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('89', 'Provide Free Shipping For Orders Made', 'MODULE_ORDER_TOTAL_SHIPPING_DESTINATION', 'national', 'Provide free shipping for orders sent to the set destination.', '6', '5', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'national\', \'international\', \'both\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('90', 'Display Sub-Total', 'MODULE_ORDER_TOTAL_SUBTOTAL_STATUS', 'true', 'Do you want to display the order sub-total cost?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('91', 'Sort Order', 'MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER', '1', 'Sort order of display.', '6', '2', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('92', 'Display Tax', 'MODULE_ORDER_TOTAL_TAX_STATUS', 'true', 'Do you want to display the order tax value?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('93', 'Sort Order', 'MODULE_ORDER_TOTAL_TAX_SORT_ORDER', '3', 'Sort order of display.', '6', '2', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('94', 'Display Total', 'MODULE_ORDER_TOTAL_TOTAL_STATUS', 'true', 'Do you want to display the total order value?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('95', 'Sort Order', 'MODULE_ORDER_TOTAL_TOTAL_SORT_ORDER', '4', 'Sort order of display.', '6', '2', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('96', 'Minimum Minutes Per E-Mail', 'MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES', '15', 'Minimum number of minutes to allow 1 e-mail to be sent (eg, 15 for 1 e-mail every 15 minutes)', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('97', 'Minimum Minutes Per E-Mail', 'MODULE_ACTION_RECORDER_TELL_A_FRIEND_EMAIL_MINUTES', '15', 'Minimum number of minutes to allow 1 e-mail to be sent (eg, 15 for 1 e-mail every 15 minutes)', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('98', 'Allowed Minutes', 'MODULE_ACTION_RECORDER_ADMIN_LOGIN_MINUTES', '5', 'Number of minutes to allow login attempts to occur.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('99', 'Allowed Attempts', 'MODULE_ACTION_RECORDER_ADMIN_LOGIN_ATTEMPTS', '3', 'Number of login attempts to allow within the specified period.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('100', 'Allowed Minutes', 'MODULE_ACTION_RECORDER_RESET_PASSWORD_MINUTES', '5', 'Number of minutes to allow password resets to occur.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('101', 'Allowed Attempts', 'MODULE_ACTION_RECORDER_RESET_PASSWORD_ATTEMPTS', '1', 'Number of password reset attempts to allow within the specified period.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('102', 'Enable E-Mail Module', 'MODULE_SOCIAL_BOOKMARKS_EMAIL_STATUS', 'True', 'Do you want to allow products to be shared through e-mail?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('103', 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_EMAIL_SORT_ORDER', '10', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('104', 'Enable Google+ Share Module', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_STATUS', 'True', 'Do you want to allow products to be shared through Google+?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('105', 'Annotation', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_ANNOTATION', 'None', 'The annotation to display next to the button.', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'Inline\', \'Bubble\', \'Vertical-Bubble\', \'None\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('106', 'Width', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_WIDTH', '', 'The maximum width of the button.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('107', 'Height', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_HEIGHT', '15', 'Sets the height of the button.', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'15\', \'20\', \'24\', \'60\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('108', 'Alignment', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_ALIGN', 'Left', 'The alignment of the button assets.', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'Left\', \'Right\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('109', 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_SORT_ORDER', '20', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('110', 'Enable Facebook Module', 'MODULE_SOCIAL_BOOKMARKS_FACEBOOK_STATUS', 'True', 'Do you want to allow products to be shared through Facebook?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('111', 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_FACEBOOK_SORT_ORDER', '30', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('112', 'Enable Twitter Module', 'MODULE_SOCIAL_BOOKMARKS_TWITTER_STATUS', 'True', 'Do you want to allow products to be shared through Twitter?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('113', 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_TWITTER_SORT_ORDER', '40', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('114', 'Enable Pinterest Module', 'MODULE_SOCIAL_BOOKMARKS_PINTEREST_STATUS', 'True', 'Do you want to allow Pinterest Button?', '6', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('115', 'Layout Position', 'MODULE_SOCIAL_BOOKMARKS_PINTEREST_BUTTON_COUNT_POSITION', 'None', 'Horizontal or Vertical or None', '6', '2', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'Horizontal\', \'Vertical\', \'None\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('116', 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_PINTEREST_SORT_ORDER', '50', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('117', 'Country of Origin', 'SHIPPING_ORIGIN_COUNTRY', '81', 'Select the country of origin to be used in shipping quotes.', '7', '1', '2015-03-09 15:51:34', '2015-02-23 09:52:39', 'tep_get_country_name', 'tep_cfg_pull_down_country_list(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('118', 'Postal Code', 'SHIPPING_ORIGIN_ZIP', 'NONE', 'Enter the Postal Code (ZIP) of the Store to be used in shipping quotes.', '7', '2', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('119', 'Enter the Maximum Package Weight you will ship', 'SHIPPING_MAX_WEIGHT', '50', 'Carriers have a max weight limit for a single package. This is a common one for all.', '7', '3', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('120', 'Package Tare weight.', 'SHIPPING_BOX_WEIGHT', '3', 'What is the weight of typical packaging of small to medium packages?', '7', '4', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('121', 'Larger packages - percentage increase.', 'SHIPPING_BOX_PADDING', '10', 'For 10% enter 10', '7', '5', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('122', 'Allow Orders Not Matching Defined Shipping Zones ', 'SHIPPING_ALLOW_UNDEFINED_ZONES', 'False', 'Should orders be allowed to shipping addresses not matching defined shipping module shipping zones?', '7', '5', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('123', 'Display Product Image', 'PRODUCT_LIST_IMAGE', '1', 'Do you want to display the Product Image?', '8', '1', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('124', 'Display Product Manufacturer Name', 'PRODUCT_LIST_MANUFACTURER', '0', 'Do you want to display the Product Manufacturer Name?', '8', '2', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('125', 'Display Product Model', 'PRODUCT_LIST_MODEL', '0', 'Do you want to display the Product Model?', '8', '3', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('126', 'Display Product Name', 'PRODUCT_LIST_NAME', '2', 'Do you want to display the Product Name?', '8', '4', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('127', 'Display Product Price', 'PRODUCT_LIST_PRICE', '3', 'Do you want to display the Product Price', '8', '5', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('128', 'Display Product Quantity', 'PRODUCT_LIST_QUANTITY', '0', 'Do you want to display the Product Quantity?', '8', '6', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('129', 'Display Product Weight', 'PRODUCT_LIST_WEIGHT', '0', 'Do you want to display the Product Weight?', '8', '7', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('130', 'Display Buy Now column', 'PRODUCT_LIST_BUY_NOW', '4', 'Do you want to display the Buy Now column?', '8', '8', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('131', 'Display Category/Manufacturer Filter (0=disable; 1=enable)', 'PRODUCT_LIST_FILTER', '1', 'Do you want to display the Category/Manufacturer Filter?', '8', '9', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('132', 'Location of Prev/Next Navigation Bar (1-top, 2-bottom, 3-both)', 'PREV_NEXT_BAR_LOCATION', '2', 'Sets the location of the Prev/Next Navigation Bar (1-top, 2-bottom, 3-both)', '8', '10', NULL, '2015-02-23 09:52:39', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('133', 'Check stock level', 'STOCK_CHECK', 'true', 'Check to see if sufficent stock is available', '9', '1', NULL, '2015-02-23 09:52:39', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('134', 'Subtract stock', 'STOCK_LIMITED', 'true', 'Subtract product in stock by product orders', '9', '2', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('135', 'Allow Checkout', 'STOCK_ALLOW_CHECKOUT', 'true', 'Allow customer to checkout even if there is insufficient stock', '9', '3', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('136', 'Mark product out of stock', 'STOCK_MARK_PRODUCT_OUT_OF_STOCK', '***', 'Display something on screen so customer can see which product has insufficient stock', '9', '4', NULL, '2015-02-23 09:52:40', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('137', 'Stock Re-order level', 'STOCK_REORDER_LEVEL', '5', 'Define when stock needs to be re-ordered', '9', '5', NULL, '2015-02-23 09:52:40', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('138', 'Store Page Parse Time', 'STORE_PAGE_PARSE_TIME', 'false', 'Store the time it takes to parse a page', '10', '1', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('139', 'Log Destination', 'STORE_PAGE_PARSE_TIME_LOG', '/var/log/www/tep/page_parse_time.log', 'Directory and filename of the page parse time log', '10', '2', NULL, '2015-02-23 09:52:40', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('140', 'Log Date Format', 'STORE_PARSE_DATE_TIME_FORMAT', '%d/%m/%Y %H:%M:%S', 'The date format', '10', '3', NULL, '2015-02-23 09:52:40', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('141', 'Display The Page Parse Time', 'DISPLAY_PAGE_PARSE_TIME', 'true', 'Display the page parse time (store page parse time must be enabled)', '10', '4', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('142', 'Store Database Queries', 'STORE_DB_TRANSACTIONS', 'false', 'Store the database queries in the page parse time log', '10', '5', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('143', 'Use Cache', 'USE_CACHE', 'false', 'Use caching features', '11', '1', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('144', 'Cache Directory', 'DIR_FS_CACHE', 'D:/XAMPP/htdocs/oscommerce234de/includes/work/', 'The directory where the cached files are saved', '11', '2', NULL, '2015-02-23 09:52:40', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('145', 'E-Mail Transport Method', 'EMAIL_TRANSPORT', 'sendmail', 'Defines if this server uses a local connection to sendmail or uses an SMTP connection via TCP/IP. Servers running on Windows and MacOS should change this setting to SMTP.', '12', '1', '2015-02-24 12:07:02', '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'sendmail\', \'smtp\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('146', 'E-Mail Linefeeds', 'EMAIL_LINEFEED', 'LF', 'Defines the character sequence used to separate mail headers.', '12', '2', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'LF\', \'CRLF\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('147', 'Use MIME HTML When Sending Emails', 'EMAIL_USE_HTML', 'false', 'Send e-mails in HTML format', '12', '3', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('148', 'Verify E-Mail Addresses Through DNS', 'ENTRY_EMAIL_ADDRESS_CHECK', 'false', 'Verify e-mail address through a DNS server', '12', '4', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('149', 'Send E-Mails', 'SEND_EMAILS', 'true', 'Send out e-mails', '12', '5', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('150', 'Enable download', 'DOWNLOAD_ENABLED', 'false', 'Enable the products download functions.', '13', '1', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('151', 'Download by redirect', 'DOWNLOAD_BY_REDIRECT', 'false', 'Use browser redirection for download. Disable on non-Unix systems.', '13', '2', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('152', 'Expiry delay (days)', 'DOWNLOAD_MAX_DAYS', '7', 'Set number of days before the download link expires. 0 means no limit.', '13', '3', NULL, '2015-02-23 09:52:40', NULL, '');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('153', 'Maximum number of downloads', 'DOWNLOAD_MAX_COUNT', '5', 'Set the maximum number of downloads. 0 means no download authorized.', '13', '4', NULL, '2015-02-23 09:52:40', NULL, '');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('154', 'Enable GZip Compression', 'GZIP_COMPRESSION', 'false', 'Enable HTTP GZip compression.', '14', '1', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('155', 'Compression Level', 'GZIP_LEVEL', '5', 'Use this compression level 0-9 (0 = minimum, 9 = maximum).', '14', '2', NULL, '2015-02-23 09:52:40', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('156', 'Session Directory', 'SESSION_WRITE_DIRECTORY', 'D:/XAMPP/htdocs/oscommerce234de/includes/work/', 'If sessions are file based, store them in this directory.', '15', '1', NULL, '2015-02-23 09:52:40', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('157', 'Force Cookie Use', 'SESSION_FORCE_COOKIE_USE', 'False', 'Force the use of sessions when cookies are only enabled.', '15', '2', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('158', 'Check SSL Session ID', 'SESSION_CHECK_SSL_SESSION_ID', 'False', 'Validate the SSL_SESSION_ID on every secure HTTPS page request.', '15', '3', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('159', 'Check User Agent', 'SESSION_CHECK_USER_AGENT', 'False', 'Validate the clients browser user agent on every page request.', '15', '4', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('160', 'Check IP Address', 'SESSION_CHECK_IP_ADDRESS', 'False', 'Validate the clients IP address on every page request.', '15', '5', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('161', 'Prevent Spider Sessions', 'SESSION_BLOCK_SPIDERS', 'True', 'Prevent known spiders from starting a session.', '15', '6', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('162', 'Recreate Session', 'SESSION_RECREATE', 'True', 'Recreate the session to generate a new session ID when the customer logs on or creates an account (PHP >=4.1 needed).', '15', '7', NULL, '2015-02-23 09:52:40', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('163', 'Last Update Check Time', 'LAST_UPDATE_CHECK_TIME', '', 'Last time a check for new versions of osCommerce was run', '6', '0', NULL, '2015-02-23 09:52:40', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('164', 'Enable PayPal Express Checkout', 'MODULE_PAYMENT_PAYPAL_EXPRESS_STATUS', 'True', 'Do you want to accept PayPal Express Checkout payments?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('165', 'Seller Account', 'MODULE_PAYMENT_PAYPAL_EXPRESS_SELLER_ACCOUNT', '', 'The email address of the seller account if no API credentials has been setup.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('166', 'API Username', 'MODULE_PAYMENT_PAYPAL_EXPRESS_API_USERNAME', '', 'The username to use for the PayPal API service', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('167', 'API Password', 'MODULE_PAYMENT_PAYPAL_EXPRESS_API_PASSWORD', '', 'The password to use for the PayPal API service', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('168', 'API Signature', 'MODULE_PAYMENT_PAYPAL_EXPRESS_API_SIGNATURE', '', 'The signature to use for the PayPal API service', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('169', 'PayPal Account Optional', 'MODULE_PAYMENT_PAYPAL_EXPRESS_ACCOUNT_OPTIONAL', 'False', 'This must also be enabled in your PayPal account, in Profile > Website Payment Preferences.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('170', 'PayPal Instant Update', 'MODULE_PAYMENT_PAYPAL_EXPRESS_INSTANT_UPDATE', 'True', 'Support PayPal shipping and tax calculations on the PayPal.com site during Express Checkout.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('171', 'PayPal Checkout Image', 'MODULE_PAYMENT_PAYPAL_EXPRESS_CHECKOUT_IMAGE', 'Static', 'Use static or dynamic Express Checkout image buttons. Dynamic images are used with PayPal campaigns.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'Static\', \'Dynamic\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('172', 'Page Style', 'MODULE_PAYMENT_PAYPAL_EXPRESS_PAGE_STYLE', '', 'The page style to use for the checkout flow (defined at your PayPal Profile page)', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('173', 'Transaction Method', 'MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTION_METHOD', 'Sale', 'The processing method to use for each transaction.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'Authorization\', \'Sale\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('174', 'Set Order Status', 'MODULE_PAYMENT_PAYPAL_EXPRESS_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', NULL, '2015-02-23 09:52:47', 'tep_get_order_status_name', 'tep_cfg_pull_down_order_statuses(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('175', 'PayPal Transactions Order Status Level', 'MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTIONS_ORDER_STATUS_ID', '4', 'Include PayPal transaction information in this order status level', '6', '0', NULL, '2015-02-23 09:52:47', 'tep_get_order_status_name', 'tep_cfg_pull_down_order_statuses(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('176', 'Payment Zone', 'MODULE_PAYMENT_PAYPAL_EXPRESS_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', NULL, '2015-02-23 09:52:47', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('177', 'Transaction Server', 'MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTION_SERVER', 'Live', 'Use the live or testing (sandbox) gateway server to process transactions?', '6', '0', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'Live\', \'Sandbox\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('178', 'Verify SSL Certificate', 'MODULE_PAYMENT_PAYPAL_EXPRESS_VERIFY_SSL', 'True', 'Verify gateway server SSL certificate on connection?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('179', 'Proxy Server', 'MODULE_PAYMENT_PAYPAL_EXPRESS_PROXY', '', 'Send API requests through this proxy server. (host:port, eg: 123.45.67.89:8080 or proxy.example.com:8080)', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('180', 'Debug E-Mail Address', 'MODULE_PAYMENT_PAYPAL_EXPRESS_DEBUG_EMAIL', '', 'All parameters of an invalid transaction will be sent to this email address.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('181', 'Sort order of display.', 'MODULE_PAYMENT_PAYPAL_EXPRESS_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('182', 'Installed Modules', 'MODULE_HEADER_TAGS_INSTALLED', 'ht_manufacturer_title.php;ht_category_title.php;ht_product_title.php;ht_canonical.php;ht_robot_noindex.php', 'List of header tag module filenames separated by a semi-colon. This is automatically updated. No need to edit.', '6', '0', '2015-03-09 18:29:54', '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('183', 'Enable Category Title Module', 'MODULE_HEADER_TAGS_CATEGORY_TITLE_STATUS', 'True', 'Do you want to allow category titles to be added to the page title?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('184', 'Sort Order', 'MODULE_HEADER_TAGS_CATEGORY_TITLE_SORT_ORDER', '200', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('185', 'Enable Manufacturer Title Module', 'MODULE_HEADER_TAGS_MANUFACTURER_TITLE_STATUS', 'True', 'Do you want to allow manufacturer titles to be added to the page title?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('186', 'Sort Order', 'MODULE_HEADER_TAGS_MANUFACTURER_TITLE_SORT_ORDER', '100', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('187', 'Enable Product Title Module', 'MODULE_HEADER_TAGS_PRODUCT_TITLE_STATUS', 'True', 'Do you want to allow product titles to be added to the page title?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('188', 'Sort Order', 'MODULE_HEADER_TAGS_PRODUCT_TITLE_SORT_ORDER', '300', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('189', 'Enable Canonical Module', 'MODULE_HEADER_TAGS_CANONICAL_STATUS', 'True', 'Do you want to enable the Canonical module?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('190', 'Sort Order', 'MODULE_HEADER_TAGS_CANONICAL_SORT_ORDER', '400', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('191', 'Enable Robot NoIndex Module', 'MODULE_HEADER_TAGS_ROBOT_NOINDEX_STATUS', 'True', 'Do you want to enable the Robot NoIndex module?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('192', 'Pages', 'MODULE_HEADER_TAGS_ROBOT_NOINDEX_PAGES', 'account.php;account_edit.php;account_history.php;account_history_info.php;account_newsletters.php;account_notifications.php;account_password.php;address_book.php;address_book_process.php;checkout_confirmation.php;checkout_payment.php;checkout_payment_address.php;checkout_process.php;checkout_shipping.php;checkout_shipping_address.php;checkout_success.php;cookie_usage.php;create_account.php;create_account_success.php;login.php;logoff.php;password_forgotten.php;password_reset.php;product_reviews_write.php;shopping_cart.php;ssl_check.php;tell_a_friend.php', 'The pages to add the meta robot noindex tag to.', '6', '0', NULL, '2015-02-23 09:52:47', 'ht_robot_noindex_show_pages', 'ht_robot_noindex_edit_pages(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('193', 'Sort Order', 'MODULE_HEADER_TAGS_ROBOT_NOINDEX_SORT_ORDER', '500', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('194', 'Installed Modules', 'MODULE_ADMIN_DASHBOARD_INSTALLED', 'd_total_revenue.php;d_total_customers.php;d_orders.php;d_customers.php;d_admin_logins.php;d_security_checks.php;d_latest_news.php;d_latest_addons.php;d_partner_news.php;d_version_check.php;d_reviews.php', 'List of Administration Tool Dashboard module filenames separated by a semi-colon. This is automatically updated. No need to edit.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('195', 'Enable Administrator Logins Module', 'MODULE_ADMIN_DASHBOARD_ADMIN_LOGINS_STATUS', 'True', 'Do you want to show the latest administrator logins on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('196', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_ADMIN_LOGINS_SORT_ORDER', '500', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('197', 'Enable Customers Module', 'MODULE_ADMIN_DASHBOARD_CUSTOMERS_STATUS', 'True', 'Do you want to show the newest customers on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('198', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_CUSTOMERS_SORT_ORDER', '400', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('199', 'Enable Latest Add-Ons Module', 'MODULE_ADMIN_DASHBOARD_LATEST_ADDONS_STATUS', 'True', 'Do you want to show the latest osCommerce Add-Ons on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('200', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_LATEST_ADDONS_SORT_ORDER', '800', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('201', 'Enable Latest News Module', 'MODULE_ADMIN_DASHBOARD_LATEST_NEWS_STATUS', 'True', 'Do you want to show the latest osCommerce News on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('202', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_LATEST_NEWS_SORT_ORDER', '700', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('203', 'Enable Orders Module', 'MODULE_ADMIN_DASHBOARD_ORDERS_STATUS', 'True', 'Do you want to show the latest orders on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('204', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_ORDERS_SORT_ORDER', '300', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('205', 'Enable Security Checks Module', 'MODULE_ADMIN_DASHBOARD_SECURITY_CHECKS_STATUS', 'True', 'Do you want to run the security checks for this installation?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('206', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_SECURITY_CHECKS_SORT_ORDER', '600', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('207', 'Enable Total Customers Module', 'MODULE_ADMIN_DASHBOARD_TOTAL_CUSTOMERS_STATUS', 'True', 'Do you want to show the total customers chart on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('208', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_TOTAL_CUSTOMERS_SORT_ORDER', '200', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('209', 'Enable Total Revenue Module', 'MODULE_ADMIN_DASHBOARD_TOTAL_REVENUE_STATUS', 'True', 'Do you want to show the total revenue chart on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('210', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_TOTAL_REVENUE_SORT_ORDER', '100', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('211', 'Enable Version Check Module', 'MODULE_ADMIN_DASHBOARD_VERSION_CHECK_STATUS', 'True', 'Do you want to show the version check results on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('212', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_VERSION_CHECK_SORT_ORDER', '900', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('213', 'Enable Latest Reviews Module', 'MODULE_ADMIN_DASHBOARD_REVIEWS_STATUS', 'True', 'Do you want to show the latest reviews on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('214', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_REVIEWS_SORT_ORDER', '1000', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('215', 'Enable Partner News Module', 'MODULE_ADMIN_DASHBOARD_PARTNER_NEWS_STATUS', 'True', 'Do you want to show the latest osCommerce Partner News on the dashboard?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('216', 'Sort Order', 'MODULE_ADMIN_DASHBOARD_PARTNER_NEWS_SORT_ORDER', '820', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('217', 'Installed Modules', 'MODULE_BOXES_INSTALLED', 'bm_categories.php;bm_manufacturers.php;bm_search.php;bm_whats_new.php;bm_information.php;bm_card_acceptance.php;bm_shopping_cart.php;bm_manufacturer_info.php;bm_order_history.php;bm_best_sellers.php;bm_product_notifications.php;bm_product_social_bookmarks.php;bm_specials.php;bm_reviews.php;bm_languages.php;bm_currencies.php;bm_extrainfopage.php', 'List of box module filenames separated by a semi-colon. This is automatically updated. No need to edit.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('218', 'Enable Best Sellers Module', 'MODULE_BOXES_BEST_SELLERS_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('219', 'Content Placement', 'MODULE_BOXES_BEST_SELLERS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('220', 'Sort Order', 'MODULE_BOXES_BEST_SELLERS_SORT_ORDER', '5030', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:47', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('221', 'Enable Categories Module', 'MODULE_BOXES_CATEGORIES_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('222', 'Content Placement', 'MODULE_BOXES_CATEGORIES_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:47', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('223', 'Sort Order', 'MODULE_BOXES_CATEGORIES_SORT_ORDER', '1000', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('224', 'Enable Currencies Module', 'MODULE_BOXES_CURRENCIES_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('225', 'Content Placement', 'MODULE_BOXES_CURRENCIES_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('226', 'Sort Order', 'MODULE_BOXES_CURRENCIES_SORT_ORDER', '5090', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('227', 'Enable Information Module', 'MODULE_BOXES_INFORMATION_STATUS', 'False', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('228', 'Content Placement', 'MODULE_BOXES_INFORMATION_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('229', 'Sort Order', 'MODULE_BOXES_INFORMATION_SORT_ORDER', '1050', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('230', 'Enable Languages Module', 'MODULE_BOXES_LANGUAGES_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('231', 'Content Placement', 'MODULE_BOXES_LANGUAGES_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('232', 'Sort Order', 'MODULE_BOXES_LANGUAGES_SORT_ORDER', '5080', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('233', 'Enable Manufacturer Info Module', 'MODULE_BOXES_MANUFACTURER_INFO_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('234', 'Content Placement', 'MODULE_BOXES_MANUFACTURER_INFO_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('235', 'Sort Order', 'MODULE_BOXES_MANUFACTURER_INFO_SORT_ORDER', '5010', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('236', 'Enable Manufacturers Module', 'MODULE_BOXES_MANUFACTURERS_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('237', 'Content Placement', 'MODULE_BOXES_MANUFACTURERS_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('238', 'Sort Order', 'MODULE_BOXES_MANUFACTURERS_SORT_ORDER', '1020', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('239', 'Enable Order History Module', 'MODULE_BOXES_ORDER_HISTORY_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('240', 'Content Placement', 'MODULE_BOXES_ORDER_HISTORY_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('241', 'Sort Order', 'MODULE_BOXES_ORDER_HISTORY_SORT_ORDER', '5020', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('242', 'Enable Product Notifications Module', 'MODULE_BOXES_PRODUCT_NOTIFICATIONS_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('243', 'Content Placement', 'MODULE_BOXES_PRODUCT_NOTIFICATIONS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('244', 'Sort Order', 'MODULE_BOXES_PRODUCT_NOTIFICATIONS_SORT_ORDER', '5040', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('245', 'Enable Product Social Bookmarks Module', 'MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('246', 'Content Placement', 'MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('247', 'Sort Order', 'MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_SORT_ORDER', '5050', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('248', 'Enable Reviews Module', 'MODULE_BOXES_REVIEWS_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('249', 'Content Placement', 'MODULE_BOXES_REVIEWS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('250', 'Sort Order', 'MODULE_BOXES_REVIEWS_SORT_ORDER', '5070', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('251', 'Enable Search Module', 'MODULE_BOXES_SEARCH_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('252', 'Content Placement', 'MODULE_BOXES_SEARCH_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('253', 'Sort Order', 'MODULE_BOXES_SEARCH_SORT_ORDER', '1030', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('254', 'Enable Shopping Cart Module', 'MODULE_BOXES_SHOPPING_CART_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('255', 'Content Placement', 'MODULE_BOXES_SHOPPING_CART_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('256', 'Sort Order', 'MODULE_BOXES_SHOPPING_CART_SORT_ORDER', '5000', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('257', 'Enable Specials Module', 'MODULE_BOXES_SPECIALS_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('258', 'Content Placement', 'MODULE_BOXES_SPECIALS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('259', 'Sort Order', 'MODULE_BOXES_SPECIALS_SORT_ORDER', '5060', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('260', 'Enable What\'s New Module', 'MODULE_BOXES_WHATS_NEW_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('261', 'Content Placement', 'MODULE_BOXES_WHATS_NEW_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('262', 'Sort Order', 'MODULE_BOXES_WHATS_NEW_SORT_ORDER', '1040', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('263', 'Enable Card Acceptance Module', 'MODULE_BOXES_CARD_ACCEPTANCE_STATUS', 'True', 'Do you want to add the module to your shops?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('264', 'Logos', 'MODULE_BOXES_CARD_ACCEPTANCE_LOGOS', 'paypal_horizontal_large.png', 'The card acceptance logos to show.', '6', '0', NULL, '2015-02-23 09:52:48', 'bm_card_acceptance_show_logos', 'bm_card_acceptance_edit_logos(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('265', 'Content Placement', 'MODULE_BOXES_CARD_ACCEPTANCE_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('266', 'Sort Order', 'MODULE_BOXES_CARD_ACCEPTANCE_SORT_ORDER', '1060', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('267', 'Installed Template Block Groups', 'TEMPLATE_BLOCK_GROUPS', 'boxes;header_tags', 'This is automatically updated. No need to edit.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('268', 'Installed Modules', 'MODULE_CONTENT_INSTALLED', 'account/cm_account_set_password;checkout_success/cm_cs_redirect_old_order;checkout_success/cm_cs_thank_you;checkout_success/cm_cs_product_notifications;checkout_success/cm_cs_downloads;login/cm_login_form;login/cm_create_account_link', 'This is automatically updated. No need to edit.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('269', 'Enable Set Account Password', 'MODULE_CONTENT_ACCOUNT_SET_PASSWORD_STATUS', 'True', 'Do you want to enable the Set Account Password module?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('270', 'Allow Local Passwords', 'MODULE_CONTENT_ACCOUNT_SET_PASSWORD_ALLOW_PASSWORD', 'True', 'Allow local account passwords to be set.', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('271', 'Sort Order', 'MODULE_CONTENT_ACCOUNT_SET_PASSWORD_SORT_ORDER', '100', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('272', 'Enable Redirect Old Order Module', 'MODULE_CONTENT_CHECKOUT_SUCCESS_REDIRECT_OLD_ORDER_STATUS', 'True', 'Should customers be redirected when viewing old checkout success orders?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('273', 'Redirect Minutes', 'MODULE_CONTENT_CHECKOUT_SUCCESS_REDIRECT_OLD_ORDER_MINUTES', '60', 'Redirect customers to the My Account page after an order older than this amount is viewed.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('274', 'Sort Order', 'MODULE_CONTENT_CHECKOUT_SUCCESS_REDIRECT_OLD_ORDER_SORT_ORDER', '500', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('275', 'Enable Thank You Module', 'MODULE_CONTENT_CHECKOUT_SUCCESS_THANK_YOU_STATUS', 'True', 'Should the thank you block be shown on the checkout success page?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('276', 'Sort Order', 'MODULE_CONTENT_CHECKOUT_SUCCESS_THANK_YOU_SORT_ORDER', '1000', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('277', 'Enable Product Notifications Module', 'MODULE_CONTENT_CHECKOUT_SUCCESS_PRODUCT_NOTIFICATIONS_STATUS', 'True', 'Should the product notifications block be shown on the checkout success page?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('278', 'Sort Order', 'MODULE_CONTENT_CHECKOUT_SUCCESS_PRODUCT_NOTIFICATIONS_SORT_ORDER', '2000', 'Sort order of display. Lowest is displayed first.', '6', '3', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('279', 'Enable Product Downloads Module', 'MODULE_CONTENT_CHECKOUT_SUCCESS_DOWNLOADS_STATUS', 'True', 'Should ordered product download links be shown on the checkout success page?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('280', 'Sort Order', 'MODULE_CONTENT_CHECKOUT_SUCCESS_DOWNLOADS_SORT_ORDER', '3000', 'Sort order of display. Lowest is displayed first.', '6', '3', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('281', 'Enable Login Form Module', 'MODULE_CONTENT_LOGIN_FORM_STATUS', 'True', 'Do you want to enable the login form module?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('282', 'Content Width', 'MODULE_CONTENT_LOGIN_FORM_CONTENT_WIDTH', 'Half', 'Should the content be shown in a full or half width container?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Full\', \'Half\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('283', 'Sort Order', 'MODULE_CONTENT_LOGIN_FORM_SORT_ORDER', '1000', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('284', 'Enable New User Module', 'MODULE_CONTENT_CREATE_ACCOUNT_LINK_STATUS', 'True', 'Do you want to enable the new user module?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('285', 'Content Width', 'MODULE_CONTENT_CREATE_ACCOUNT_LINK_CONTENT_WIDTH', 'Full', 'Should the content be shown in a full or half width container?', '6', '1', NULL, '2015-02-23 09:52:48', NULL, 'tep_cfg_select_option(array(\'Full\', \'Half\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('286', 'Sort Order', 'MODULE_CONTENT_CREATE_ACCOUNT_LINK_SORT_ORDER', '2000', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-23 09:52:48', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('287', 'Security Check Extended Last Run', 'MODULE_SECURITY_CHECK_EXTENDED_LAST_RUN_DATETIME', '1427021411', 'The date and time the last extended security check was performed.', '6', NULL, NULL, '2015-02-23 10:17:41', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('288', 'Enable Extra Info Page Module', 'MODULE_BOXES_EXTRAINFOPAGE_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', NULL, '2015-02-24 15:57:38', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('289', 'Content Placement', 'MODULE_BOXES_EXTRAINFOPAGE_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', '6', '1', NULL, '2015-02-24 15:57:38', NULL, 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('290', 'Sort Order', 'MODULE_BOXES_EXTRAINFOPAGE_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-02-24 15:57:38', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('318', 'Enable SEO URLs 5?', 'USU5_ENABLED', 'true', 'Turn Seo Urls 5 on', '16', '1', '2015-03-04 09:01:31', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('319', 'Enable the cache?', 'USU5_CACHE_ON', 'true', 'Turn the cache system on', '16', '2', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('320', 'Enable multi language support?', 'USU5_MULTI_LANGUAGE_SEO_SUPPORT', 'false', 'Enable the multi language functionality', '16', '3', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('321', 'Output W3C valid URLs?', 'USU5_USE_W3C_VALID', 'true', 'This setting will output W3C valid URLs.', '16', '4', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('322', 'Select your chosen cache system?', 'USU5_CACHE_SYSTEM', 'file', 'Choose from the 4 available caching strategies.', '16', '5', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'mysql\', \'file\',\'sqlite\',\'memcache\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('323', 'Set the number of days to store the cache.', 'USU5_CACHE_DAYS', '7', 'Set the number of days you wish to retain cached data, after this the cache will auto reset.', '16', '6', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('324', 'Choose the uri format', 'USU5_URLS_TYPE', 'standard', '<b>Choose USU5 URL format:</b>', '16', '7', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'standard\',\'path_standard\',\'rewrite\',\'path_rewrite\',), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('325', 'Choose how your product link text is made up', 'USU5_PRODUCTS_LINK_TEXT_ORDER', 'cp', 'Product link text can be made up of:<br /><b>p</b> = product name<br /><b>c</b> = category name<br /><b>b</b> = manufacturer (brand)<br /><b>m</b> = model<br />e.g. <b>bp</b> (brand/product)', '16', '8', '2015-03-10 08:52:40', '2015-03-02 14:22:34', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('326', 'Filter Short Words', 'USU5_FILTER_SHORT_WORDS', '2', '<b>This setting will filter words.</b><br>1 = Remove words of 1 letter<br>2 = Remove words of 2 letters or less<br>3 = Remove words of 3 letters or less<br>', '16', '9', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'1\',\'2\',\'3\',), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('327', 'Add category parent to beginning of category uris?', 'USU5_ADD_CAT_PARENT', 'true', 'This setting will add the category parent name to the beginning of the category URLs (i.e. - parent-category-c-1.html).', '16', '10', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('328', 'Remove all non-alphanumeric characters?', 'USU5_REMOVE_ALL_SPEC_CHARS', 'true', 'This will remove all non-letters and non-numbers. If your language has special characters then you will need to use the character conversion system.', '16', '11', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('329', 'Add cPath to product URLs?', 'USU5_ADD_CPATH_TO_PRODUCT_URLS', 'false', 'This setting will append the cPath to the end of product URLs (i.e. - some-product-p-1.html?cPath=xx).', '16', '12', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('330', 'Enter special character conversions. <b>(Better to use the file based character conversions)</b>', 'USU5_CHAR_CONVERT_SET', 'ä=>ae,Ä=>Ae,ö=>oe,Ö=>Oe,ü=>ue,Ü=>ue,ß=>ss', 'This setting will convert characters.<br><br>The format <b>MUST</b> be in the form: <b>char=>conv,char2=>conv2</b>', '16', '13', '2015-03-10 08:52:26', '2015-03-02 14:22:34', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('331', 'Turn performance reporting on true/false.', 'USU5_OUPUT_PERFORMANCE', 'false', '<span style=\"color: red;\">Performance reporting should not be set to ON on a live site</span><br>It is for reporting re: performance and queries and shows at the bottom of your site.', '16', '14', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('332', 'Turn variable reporting on true/false.', 'USU5_DEBUG_OUPUT_VARS', 'false', '<span style=\"color: red;\">Variable reporting should not be set to ON on a live site</span><br>It is for reporting the contents of USU classes and shows unformatted at the bottom of your site.', '16', '15', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('333', 'Force www.mysite.com/ when www.mysite.com/index.php', 'USU5_HOME_PAGE_REDIRECT', 'false', 'Force a redirect to www.mysite.com/ when www.mysite.com/index.php', '16', '16', '2015-03-02 14:22:34', '2015-03-02 14:22:34', NULL, 'tep_cfg_select_option(array(\'true\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('334', 'Reset USU5 Cache', 'USU5_RESET_CACHE', 'false', 'This will reset the cache data for USU5', '16', '17', '2015-03-10 08:51:15', '2015-03-02 14:22:34', 'tep_reset_cache_data_usu5', 'tep_cfg_select_option(array(\'reset\', \'false\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('335', 'Enable Check/Money Order Module', 'MODULE_PAYMENT_MONEYORDER_STATUS', 'True', 'Do you want to accept Check/Money Order payments?', '6', '1', NULL, '2015-03-02 14:25:20', NULL, 'tep_cfg_select_option(array(\'True\', \'False\'), ');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('336', 'Make Payable to:', 'MODULE_PAYMENT_MONEYORDER_PAYTO', '', 'Who should payments be made payable to?', '6', '1', NULL, '2015-03-02 14:25:20', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('337', 'Sort order of display.', 'MODULE_PAYMENT_MONEYORDER_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', NULL, '2015-03-02 14:25:20', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('338', 'Payment Zone', 'MODULE_PAYMENT_MONEYORDER_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', NULL, '2015-03-02 14:25:20', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('339', 'Set Order Status', 'MODULE_PAYMENT_MONEYORDER_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', NULL, '2015-03-02 14:25:20', 'tep_get_order_status_name', 'tep_cfg_pull_down_order_statuses(');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('552', 'Logo', 'EDIT_INVOICE_LOGO', 'oscommerce.jpg', 'Hier können Sie ein Logo angeben, dass auf der Rechnung angezeigt werden soll', '787', '1', '2015-03-22 20:31:47', '0000-00-00 00:00:00', '', '');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('553', 'Logo Ausrichtung', 'EDIT_INVOICE_LOGO_ALIGN', 'rechts', 'Wo soll das Logo angezeigt werden?', '787', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'tep_cfg_select_option(array(\'links\', \'rechts\', \'mitte\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('554', 'Datumsanzeige', 'EDIT_INVOICE_SHOW_DATE', 'nur Datum', 'Wie soll das Datum angezeigt werden?', '787', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'tep_cfg_select_option(array(\'nur Datum\', \'Datum und Uhrzeit\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('555', 'Kundennummer', 'EDIT_INFOICE_SHOW_CNR', 'ja', 'Soll die Kundennummer auf der Rechnung angezeigt werden?', '787', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'tep_cfg_select_option(array(\'ja\', \'nein\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('556', 'Rechnungsnummer', 'EDIT_INFOICE_SHOW_ONR', 'ja', 'Soll die Rechnungsnummer auf der Rechnung angezeigt werden?', '787', '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'tep_cfg_select_option(array(\'ja\', \'nein\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('557', 'Zahlungsweise', 'EDIT_INFOICE_SHOW_PAYMENT', 'ja', 'Soll die Zahlungsweise auf der Rechnung angezeigt werden?', '787', '40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'tep_cfg_select_option(array(\'ja\', \'nein\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('558', 'Barcode für Produkte', 'BARCODE_PRODUCT', 'nein', 'Sollder Barcode für die Produkte angezeigt werden?', '787', '45', '2015-03-22 19:02:53', '0000-00-00 00:00:00', NULL, 'tep_cfg_select_option(array(\'ja\', \'nein\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('559', 'Barcode für Rechnungsnummer', 'BARCODE_RECHNUNG', 'nein', 'Soll der Barcode für die Rechnungsnummer angezeigt werden?', '787', '50', '2015-03-22 19:02:47', '0000-00-00 00:00:00', NULL, 'tep_cfg_select_option(array(\'ja\', \'nein\'),');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('560', 'Zahlungsfälligkeit der Rechnung', 'ZAHLUNGSFAELLIGKEIT', '10', 'Tage bis die Rechnung bezahlt werden soll. Ausgehend vom Rechnungsdatum', '787', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('561', 'Bank', 'OWNER_BANK_NAME', 'Bank1Saar eG', 'Der Bankname Ihrer Hausbank', '911', '1', '2015-03-03 08:47:42', '2015-03-03 08:47:42', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('562', 'Kontoinhaber', 'OWNER_BANK_ACCOUNT', 'Vor u. Zuname', 'Name des Kontoinhabers', '911', '2', '2015-03-03 08:47:42', '2015-03-03 08:47:42', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('563', 'Bankleitzahl', 'STORE_OWNER_BLZ', '55555555555', 'Die Bankleitzahl Ihrer Hausbank', '911', '3', '2015-03-03 08:47:42', '2015-03-03 08:47:42', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('564', 'Kontonummer', 'OWNER_BANK', '66666666666', 'Ihre Kontonummer', '911', '4', '2015-03-03 08:47:42', '2015-03-03 08:47:42', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('565', 'International Bank Account Number (IBAN)', 'OWNER_BANK_IBAN', 'IBAN', 'International Bank Account Number', '911', '5', '2015-03-03 08:47:42', '2015-03-03 08:47:42', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('566', 'SWIFT Code', 'OWNER_BANK_SWIFT', 'SWIFT', 'Swift Code für internationale Überweisungen', '911', '6', '2015-03-03 08:47:42', '2015-03-03 08:47:42', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('567', 'Finanzamt', 'OWNER_BANK_FA', 'Finanzamt Neuss II', 'Name Ihres zuständigen Finanzamtes', '911', '7', '2015-03-03 08:47:42', '2015-03-03 08:47:42', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('568', 'Steuernummer', 'OWNER_BANK_TAX_NUMBER', 'Steuer_Nr.:122/122/122', 'Ihre Steuernummer (Eingabe incl. Abkürzung)', '911', '8', '2015-03-03 08:47:42', '2015-03-03 08:47:42', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('569', 'Umsatzsteuer-Identifikationsnummer', 'OWNER_BANK_UST_NUMBER', 'UST-ID-Nr.:DE122122122', 'Ihre Umsatzsteuer-Identifikationsnummer (Eingabe incl. Abkürzung)', '911', '9', '2015-03-03 08:47:42', '2015-03-03 08:47:42', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('570', 'Anzeige der Bankdaten', 'SHOW_BANK_DATA', 'ja', 'Wollen Sie ihre Bankdaten im Impressum anzeigen lassen?', '911', '10', '2015-03-03 08:47:42', '0000-00-00 00:00:00', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('571', 'Rechnungsnummer Prefix', 'ENTRY_INVOICE_ORDER_ID_PREFIX', '2015-', 'Hier kann man einen Prefix eingeben, der vor der Rechnungsnummet angezeigt wird.', '787', '36', '2015-03-22 19:03:25', '2003-05-18 21:00:00', '', '');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('572', 'Rechnungsnummer Sufix', 'ENTRY_INVOICE_ORDER_ID_SUFIX', '', 'Hier kann man einen Sufix eingeben, der nach der Rechnungsnummet angezeigt wird.', '787', '37', '2003-06-15 04:49:34', '2003-05-18 21:00:00', '', '');
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('573', 'Handelsregisternr.', 'HRB', '1340', 'Handelsregisternr.', '911', '11', '2015-03-03 08:48:01', '2015-03-03 08:48:01', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('574', 'Amtsgericht', 'AMTSGERICHT', 'Amtsgericht Crailsheim', 'Amtsgericht', '911', '12', '2015-03-03 08:48:01', '2015-03-03 08:48:01', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('575', 'Shopbetreiber', 'SHOPBETREIBER', 'Muster GmbH ÄÜÖüöäß', 'Shopbetreiber eintragen', '911', '13', '2015-03-03 13:57:12', '2015-03-03 08:48:01', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('576', 'Shopadresse-Strasse', 'SHOPSTRASSE', 'Andreas-Muster-Str.6', 'Shopadresse-Strasse eintragen', '911', '14', '2015-03-03 08:48:01', '2015-03-03 08:48:01', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('577', 'Shopadresse-Stadt', 'SHOPSTADT', 'D 99999 Musterstadt', 'Shopadresse-Stadt eintragen', '911', '15', '2015-03-03 08:48:01', '2015-03-03 08:48:01', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('578', 'Shopadresse-Telefon', 'SHOPTELEFON', 'Tel. +49 (0) 9999 999999', 'Shopadresse-Telefon eintragen', '911', '16', '2015-03-03 08:48:01', '2015-03-03 08:48:01', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('579', 'Shopadresse-Fax', 'SHOPFAX', 'FAX +49 (0) 9999 999998', 'Shopadresse-Fax eintragen', '911', '17', '2015-03-03 08:48:01', '2015-03-03 08:48:01', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('580', 'Shopadresse-Email', 'SHOPEMAIL', 'info@muster.de', 'Shopadresse-Email eintragen', '911', '18', '2015-03-03 08:48:01', '2015-03-03 08:48:01', NULL, NULL);
insert into configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) values ('582', 'Kleinunternehmerrechnung', 'KLEINUNTERNEHMER_RECHNUNG', 'nein', 'Soll eine Kleinunternehmer Rechnung angezeigt werden?', '787', '60', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'tep_cfg_select_option(array(\'ja\', \'nein\'),');

drop table if exists configuration_group;
create table configuration_group (
  configuration_group_id int(11) not null auto_increment,
  configuration_group_title varchar(64) not null ,
  configuration_group_description varchar(255) not null ,
  sort_order int(5) ,
  visible int(1) default '1' ,
  PRIMARY KEY (configuration_group_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('1', 'My Store', 'General information about my store', '1', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('2', 'Minimum Values', 'The minimum values for functions / data', '2', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('3', 'Maximum Values', 'The maximum values for functions / data', '3', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('4', 'Images', 'Image parameters', '4', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('5', 'Customer Details', 'Customer account configuration', '5', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('6', 'Module Options', 'Hidden from configuration', '6', '0');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('7', 'Shipping/Packaging', 'Shipping options available at my store', '7', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('8', 'Product Listing', 'Product Listing    configuration options', '8', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('9', 'Stock', 'Stock configuration options', '9', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('10', 'Logging', 'Logging configuration options', '10', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('11', 'Cache', 'Caching configuration options', '11', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('12', 'E-Mail Options', 'General setting for E-Mail transport and HTML E-Mails', '12', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('13', 'Download', 'Downloadable products options', '13', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('14', 'GZip Compression', 'GZip compression options', '14', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('15', 'Sessions', 'Session options', '15', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('16', 'Seo Urls 5', 'Options for ULTIMATE Seo Urls 5 by FWR Media', '16', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('787', 'Rechnungdaten', 'Rechnungsdaten', '787', '1');
insert into configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('911', 'Bankverbindung', 'Bankverbindung', '911', '1');

drop table if exists counter;
create table counter (
  startdate char(8) ,
  counter int(12) 
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into counter (startdate, counter) values ('20150223', '558');

drop table if exists counter_history;
create table counter_history (
  month char(8) ,
  counter int(12) 
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists countries;
create table countries (
  countries_id int(11) not null auto_increment,
  countries_name varchar(255) not null ,
  countries_iso_code_2 char(2) not null ,
  countries_iso_code_3 char(3) not null ,
  address_format_id int(11) not null ,
  PRIMARY KEY (countries_id),
  KEY IDX_COUNTRIES_NAME (countries_name)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('1', 'Afghanistan', 'AF', 'AFG', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('2', 'Albania', 'AL', 'ALB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('3', 'Algeria', 'DZ', 'DZA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('4', 'American Samoa', 'AS', 'ASM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('5', 'Andorra', 'AD', 'AND', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('6', 'Angola', 'AO', 'AGO', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('7', 'Anguilla', 'AI', 'AIA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('8', 'Antarctica', 'AQ', 'ATA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('9', 'Antigua and Barbuda', 'AG', 'ATG', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('10', 'Argentina', 'AR', 'ARG', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('11', 'Armenia', 'AM', 'ARM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('12', 'Aruba', 'AW', 'ABW', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('13', 'Australia', 'AU', 'AUS', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('14', 'Austria', 'AT', 'AUT', '5');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('15', 'Azerbaijan', 'AZ', 'AZE', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('16', 'Bahamas', 'BS', 'BHS', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('17', 'Bahrain', 'BH', 'BHR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('18', 'Bangladesh', 'BD', 'BGD', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('19', 'Barbados', 'BB', 'BRB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('20', 'Belarus', 'BY', 'BLR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('21', 'Belgium', 'BE', 'BEL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('22', 'Belize', 'BZ', 'BLZ', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('23', 'Benin', 'BJ', 'BEN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('24', 'Bermuda', 'BM', 'BMU', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('25', 'Bhutan', 'BT', 'BTN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('26', 'Bolivia', 'BO', 'BOL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('27', 'Bosnia and Herzegowina', 'BA', 'BIH', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('28', 'Botswana', 'BW', 'BWA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('29', 'Bouvet Island', 'BV', 'BVT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('30', 'Brazil', 'BR', 'BRA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('31', 'British Indian Ocean Territory', 'IO', 'IOT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('32', 'Brunei Darussalam', 'BN', 'BRN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('33', 'Bulgaria', 'BG', 'BGR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('34', 'Burkina Faso', 'BF', 'BFA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('35', 'Burundi', 'BI', 'BDI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('36', 'Cambodia', 'KH', 'KHM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('37', 'Cameroon', 'CM', 'CMR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('38', 'Canada', 'CA', 'CAN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('39', 'Cape Verde', 'CV', 'CPV', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('40', 'Cayman Islands', 'KY', 'CYM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('41', 'Central African Republic', 'CF', 'CAF', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('42', 'Chad', 'TD', 'TCD', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('43', 'Chile', 'CL', 'CHL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('44', 'China', 'CN', 'CHN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('45', 'Christmas Island', 'CX', 'CXR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('46', 'Cocos (Keeling) Islands', 'CC', 'CCK', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('47', 'Colombia', 'CO', 'COL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('48', 'Comoros', 'KM', 'COM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('49', 'Congo', 'CG', 'COG', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('50', 'Cook Islands', 'CK', 'COK', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('51', 'Costa Rica', 'CR', 'CRI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('52', 'Cote D\'Ivoire', 'CI', 'CIV', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('53', 'Croatia', 'HR', 'HRV', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('54', 'Cuba', 'CU', 'CUB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('55', 'Cyprus', 'CY', 'CYP', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('56', 'Czech Republic', 'CZ', 'CZE', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('57', 'Denmark', 'DK', 'DNK', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('58', 'Djibouti', 'DJ', 'DJI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('59', 'Dominica', 'DM', 'DMA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('60', 'Dominican Republic', 'DO', 'DOM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('61', 'East Timor', 'TP', 'TMP', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('62', 'Ecuador', 'EC', 'ECU', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('63', 'Egypt', 'EG', 'EGY', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('64', 'El Salvador', 'SV', 'SLV', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('65', 'Equatorial Guinea', 'GQ', 'GNQ', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('66', 'Eritrea', 'ER', 'ERI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('67', 'Estonia', 'EE', 'EST', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('68', 'Ethiopia', 'ET', 'ETH', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('69', 'Falkland Islands (Malvinas)', 'FK', 'FLK', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('70', 'Faroe Islands', 'FO', 'FRO', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('71', 'Fiji', 'FJ', 'FJI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('72', 'Finland', 'FI', 'FIN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('73', 'France', 'FR', 'FRA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('74', 'France, Metropolitan', 'FX', 'FXX', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('75', 'French Guiana', 'GF', 'GUF', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('76', 'French Polynesia', 'PF', 'PYF', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('77', 'French Southern Territories', 'TF', 'ATF', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('78', 'Gabon', 'GA', 'GAB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('79', 'Gambia', 'GM', 'GMB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('80', 'Georgia', 'GE', 'GEO', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('81', 'Deutschland', 'DE', 'DEU', '5');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('82', 'Ghana', 'GH', 'GHA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('83', 'Gibraltar', 'GI', 'GIB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('84', 'Greece', 'GR', 'GRC', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('85', 'Greenland', 'GL', 'GRL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('86', 'Grenada', 'GD', 'GRD', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('87', 'Guadeloupe', 'GP', 'GLP', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('88', 'Guam', 'GU', 'GUM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('89', 'Guatemala', 'GT', 'GTM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('90', 'Guinea', 'GN', 'GIN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('91', 'Guinea-bissau', 'GW', 'GNB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('92', 'Guyana', 'GY', 'GUY', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('93', 'Haiti', 'HT', 'HTI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('94', 'Heard and Mc Donald Islands', 'HM', 'HMD', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('95', 'Honduras', 'HN', 'HND', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('96', 'Hong Kong', 'HK', 'HKG', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('97', 'Hungary', 'HU', 'HUN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('98', 'Iceland', 'IS', 'ISL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('99', 'India', 'IN', 'IND', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('100', 'Indonesia', 'ID', 'IDN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('101', 'Iran (Islamic Republic of)', 'IR', 'IRN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('102', 'Iraq', 'IQ', 'IRQ', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('103', 'Ireland', 'IE', 'IRL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('104', 'Israel', 'IL', 'ISR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('105', 'Italy', 'IT', 'ITA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('106', 'Jamaica', 'JM', 'JAM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('107', 'Japan', 'JP', 'JPN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('108', 'Jordan', 'JO', 'JOR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('109', 'Kazakhstan', 'KZ', 'KAZ', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('110', 'Kenya', 'KE', 'KEN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('111', 'Kiribati', 'KI', 'KIR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('112', 'Korea, Democratic People\'s Republic of', 'KP', 'PRK', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('113', 'Korea, Republic of', 'KR', 'KOR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('114', 'Kuwait', 'KW', 'KWT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('115', 'Kyrgyzstan', 'KG', 'KGZ', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('116', 'Lao People\'s Democratic Republic', 'LA', 'LAO', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('117', 'Latvia', 'LV', 'LVA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('118', 'Lebanon', 'LB', 'LBN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('119', 'Lesotho', 'LS', 'LSO', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('120', 'Liberia', 'LR', 'LBR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('121', 'Libyan Arab Jamahiriya', 'LY', 'LBY', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('122', 'Liechtenstein', 'LI', 'LIE', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('123', 'Lithuania', 'LT', 'LTU', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('124', 'Luxembourg', 'LU', 'LUX', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('125', 'Macau', 'MO', 'MAC', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('126', 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('127', 'Madagascar', 'MG', 'MDG', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('128', 'Malawi', 'MW', 'MWI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('129', 'Malaysia', 'MY', 'MYS', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('130', 'Maldives', 'MV', 'MDV', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('131', 'Mali', 'ML', 'MLI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('132', 'Malta', 'MT', 'MLT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('133', 'Marshall Islands', 'MH', 'MHL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('134', 'Martinique', 'MQ', 'MTQ', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('135', 'Mauritania', 'MR', 'MRT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('136', 'Mauritius', 'MU', 'MUS', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('137', 'Mayotte', 'YT', 'MYT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('138', 'Mexico', 'MX', 'MEX', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('139', 'Micronesia, Federated States of', 'FM', 'FSM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('140', 'Moldova, Republic of', 'MD', 'MDA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('141', 'Monaco', 'MC', 'MCO', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('142', 'Mongolia', 'MN', 'MNG', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('143', 'Montserrat', 'MS', 'MSR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('144', 'Morocco', 'MA', 'MAR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('145', 'Mozambique', 'MZ', 'MOZ', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('146', 'Myanmar', 'MM', 'MMR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('147', 'Namibia', 'NA', 'NAM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('148', 'Nauru', 'NR', 'NRU', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('149', 'Nepal', 'NP', 'NPL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('150', 'Netherlands', 'NL', 'NLD', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('151', 'Netherlands Antilles', 'AN', 'ANT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('152', 'New Caledonia', 'NC', 'NCL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('153', 'New Zealand', 'NZ', 'NZL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('154', 'Nicaragua', 'NI', 'NIC', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('155', 'Niger', 'NE', 'NER', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('156', 'Nigeria', 'NG', 'NGA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('157', 'Niue', 'NU', 'NIU', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('158', 'Norfolk Island', 'NF', 'NFK', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('159', 'Northern Mariana Islands', 'MP', 'MNP', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('160', 'Norway', 'NO', 'NOR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('161', 'Oman', 'OM', 'OMN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('162', 'Pakistan', 'PK', 'PAK', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('163', 'Palau', 'PW', 'PLW', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('164', 'Panama', 'PA', 'PAN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('165', 'Papua New Guinea', 'PG', 'PNG', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('166', 'Paraguay', 'PY', 'PRY', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('167', 'Peru', 'PE', 'PER', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('168', 'Philippines', 'PH', 'PHL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('169', 'Pitcairn', 'PN', 'PCN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('170', 'Poland', 'PL', 'POL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('171', 'Portugal', 'PT', 'PRT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('172', 'Puerto Rico', 'PR', 'PRI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('173', 'Qatar', 'QA', 'QAT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('174', 'Reunion', 'RE', 'REU', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('175', 'Romania', 'RO', 'ROM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('176', 'Russian Federation', 'RU', 'RUS', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('177', 'Rwanda', 'RW', 'RWA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('178', 'Saint Kitts and Nevis', 'KN', 'KNA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('179', 'Saint Lucia', 'LC', 'LCA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('180', 'Saint Vincent and the Grenadines', 'VC', 'VCT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('181', 'Samoa', 'WS', 'WSM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('182', 'San Marino', 'SM', 'SMR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('183', 'Sao Tome and Principe', 'ST', 'STP', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('184', 'Saudi Arabia', 'SA', 'SAU', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('185', 'Senegal', 'SN', 'SEN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('186', 'Seychelles', 'SC', 'SYC', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('187', 'Sierra Leone', 'SL', 'SLE', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('188', 'Singapore', 'SG', 'SGP', '4');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('189', 'Slovakia (Slovak Republic)', 'SK', 'SVK', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('190', 'Slovenia', 'SI', 'SVN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('191', 'Solomon Islands', 'SB', 'SLB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('192', 'Somalia', 'SO', 'SOM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('193', 'South Africa', 'ZA', 'ZAF', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('194', 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('195', 'Spain', 'ES', 'ESP', '3');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('196', 'Sri Lanka', 'LK', 'LKA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('197', 'St. Helena', 'SH', 'SHN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('198', 'St. Pierre and Miquelon', 'PM', 'SPM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('199', 'Sudan', 'SD', 'SDN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('200', 'Suriname', 'SR', 'SUR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('201', 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('202', 'Swaziland', 'SZ', 'SWZ', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('203', 'Sweden', 'SE', 'SWE', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('204', 'Switzerland', 'CH', 'CHE', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('205', 'Syrian Arab Republic', 'SY', 'SYR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('206', 'Taiwan', 'TW', 'TWN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('207', 'Tajikistan', 'TJ', 'TJK', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('208', 'Tanzania, United Republic of', 'TZ', 'TZA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('209', 'Thailand', 'TH', 'THA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('210', 'Togo', 'TG', 'TGO', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('211', 'Tokelau', 'TK', 'TKL', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('212', 'Tonga', 'TO', 'TON', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('213', 'Trinidad and Tobago', 'TT', 'TTO', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('214', 'Tunisia', 'TN', 'TUN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('215', 'Turkey', 'TR', 'TUR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('216', 'Turkmenistan', 'TM', 'TKM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('217', 'Turks and Caicos Islands', 'TC', 'TCA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('218', 'Tuvalu', 'TV', 'TUV', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('219', 'Uganda', 'UG', 'UGA', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('220', 'Ukraine', 'UA', 'UKR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('221', 'United Arab Emirates', 'AE', 'ARE', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('222', 'United Kingdom', 'GB', 'GBR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('223', 'United States', 'US', 'USA', '2');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('224', 'United States Minor Outlying Islands', 'UM', 'UMI', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('225', 'Uruguay', 'UY', 'URY', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('226', 'Uzbekistan', 'UZ', 'UZB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('227', 'Vanuatu', 'VU', 'VUT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('228', 'Vatican City State (Holy See)', 'VA', 'VAT', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('229', 'Venezuela', 'VE', 'VEN', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('230', 'Viet Nam', 'VN', 'VNM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('231', 'Virgin Islands (British)', 'VG', 'VGB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('232', 'Virgin Islands (U.S.)', 'VI', 'VIR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('233', 'Wallis and Futuna Islands', 'WF', 'WLF', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('234', 'Western Sahara', 'EH', 'ESH', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('235', 'Yemen', 'YE', 'YEM', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('236', 'Yugoslavia', 'YU', 'YUG', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('237', 'Zaire', 'ZR', 'ZAR', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('238', 'Zambia', 'ZM', 'ZMB', '1');
insert into countries (countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id) values ('239', 'Zimbabwe', 'ZW', 'ZWE', '1');

drop table if exists currencies;
create table currencies (
  currencies_id int(11) not null auto_increment,
  title varchar(32) not null ,
  code char(3) not null ,
  symbol_left varchar(12) ,
  symbol_right varchar(12) ,
  decimal_point char(1) ,
  thousands_point char(1) ,
  decimal_places char(1) ,
  value float(13,8) ,
  last_updated datetime ,
  PRIMARY KEY (currencies_id),
  KEY idx_currencies_code (code)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into currencies (currencies_id, title, code, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value, last_updated) values ('1', 'Euro', 'EUR', '', '€', '.', ',', '2', '1.00000000', '2016-02-04 09:52:42');
insert into currencies (currencies_id, title, code, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value, last_updated) values ('2', 'U.S. Dollar', 'USD', '$', '', '.', ',', '2', '1.00000000', '2016-02-04 09:52:42');
drop table if exists customers;
create table customers (
  customers_id int(11) not null auto_increment,
  customers_gender char(1) ,
  customers_firstname varchar(255) not null ,
  customers_lastname varchar(255) not null ,
  customers_dob datetime default '0000-00-00 00:00:00' not null ,
  customers_email_address varchar(255) not null ,
  customers_default_address_id int(11) ,
  customers_telephone varchar(255) not null ,
  customers_fax varchar(255) ,
  customers_password varchar(60) not null ,
  customers_newsletter char(1) ,
  PRIMARY KEY (customers_id),
  KEY idx_customers_email_address (customers_email_address)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists customers_basket;
create table customers_basket (
  customers_basket_id int(11) not null auto_increment,
  customers_id int(11) not null ,
  products_id tinytext not null ,
  customers_basket_quantity int(2) not null ,
  final_price decimal(15,4) ,
  customers_basket_date_added char(8) ,
  PRIMARY KEY (customers_basket_id),
  KEY idx_customers_basket_customers_id (customers_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists customers_basket_attributes;
create table customers_basket_attributes (
  customers_basket_attributes_id int(11) not null auto_increment,
  customers_id int(11) not null ,
  products_id tinytext not null ,
  products_options_id int(11) not null ,
  products_options_value_id int(11) not null ,
  PRIMARY KEY (customers_basket_attributes_id),
  KEY idx_customers_basket_att_customers_id (customers_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists customers_info;
create table customers_info (
  customers_info_id int(11) not null ,
  customers_info_date_of_last_logon datetime ,
  customers_info_number_of_logons int(5) ,
  customers_info_date_account_created datetime ,
  customers_info_date_account_last_modified datetime ,
  global_product_notifications int(1) default '0' ,
  password_reset_key char(40) ,
  password_reset_date datetime ,
  PRIMARY KEY (customers_info_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists edit_invoice;
create table edit_invoice (
  edit_invoice_id tinyint(3) unsigned default '0' not null ,
  language_id tinyint(3) unsigned default '1' not null ,
  edit_invoice_text mediumtext ,
  PRIMARY KEY (edit_invoice_id, language_id),
  KEY status_id (edit_invoice_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into edit_invoice (edit_invoice_id, language_id, edit_invoice_text) values ('1', '1', 'Erster englischer Text auf Rechnung');
insert into edit_invoice (edit_invoice_id, language_id, edit_invoice_text) values ('1', '2', 'Erster deutscher Text auf Rechnung');
insert into edit_invoice (edit_invoice_id, language_id, edit_invoice_text) values ('2', '1', 'Zweiter englischer Text auf Rechnung');
insert into edit_invoice (edit_invoice_id, language_id, edit_invoice_text) values ('2', '2', 'Zweiter deutscher Texte auf Rechnung');
insert into edit_invoice (edit_invoice_id, language_id, edit_invoice_text) values ('3', '1', 'Englischer Text auf Lieferschein');
insert into edit_invoice (edit_invoice_id, language_id, edit_invoice_text) values ('3', '2', 'Deutscher Text auf Lieferschein');

drop table if exists geo_zones;
create table geo_zones (
  geo_zone_id int(11) not null auto_increment,
  geo_zone_name varchar(32) not null ,
  geo_zone_description varchar(255) not null ,
  last_modified datetime ,
  date_added datetime not null ,
  PRIMARY KEY (geo_zone_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into geo_zones (geo_zone_id, geo_zone_name, geo_zone_description, last_modified, date_added) values ('1', 'Deutschland', 'Deutschland', '2015-03-03 16:52:04', '2015-02-23 09:52:45');

drop table if exists languages;
create table languages (
  languages_id int(11) not null auto_increment,
  name varchar(32) not null ,
  code char(2) not null ,
  image varchar(64) ,
  directory varchar(32) ,
  sort_order int(3) ,
  PRIMARY KEY (languages_id),
  KEY IDX_LANGUAGES_NAME (name)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into languages (languages_id, name, code, image, directory, sort_order) values ('1', 'Deutsch', 'de', 'icon.gif', 'german', '1');
insert into languages (languages_id, name, code, image, directory, sort_order) values ('2', 'English', 'en', 'icon.gif', 'english', '2');

drop table if exists manufacturers;
create table manufacturers (
  manufacturers_id int(11) not null auto_increment,
  manufacturers_name varchar(32) not null ,
  manufacturers_image varchar(64) ,
  date_added datetime ,
  last_modified datetime ,
  PRIMARY KEY (manufacturers_id),
  KEY IDX_MANUFACTURERS_NAME (manufacturers_name)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('1', 'Matrox', 'manufacturer_matrox.gif', '2015-02-23 09:52:42', NULL);
insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('2', 'Microsoft', 'manufacturer_microsoft.gif', '2015-02-23 09:52:42', NULL);
insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('3', 'Warner', 'manufacturer_warner.gif', '2015-02-23 09:52:42', NULL);
insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('4', 'Fox', 'manufacturer_fox.gif', '2015-02-23 09:52:42', NULL);
insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('5', 'Logitech', 'manufacturer_logitech.gif', '2015-02-23 09:52:42', NULL);
insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('6', 'Canon', 'manufacturer_canon.gif', '2015-02-23 09:52:42', NULL);
insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('7', 'Sierra', 'manufacturer_sierra.gif', '2015-02-23 09:52:42', NULL);
insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('8', 'GT Interactive', 'manufacturer_gt_interactive.gif', '2015-02-23 09:52:42', NULL);
insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('9', 'Hewlett Packard', 'manufacturer_hewlett_packard.gif', '2015-02-23 09:52:42', NULL);
insert into manufacturers (manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified) values ('10', 'Samsung', 'manufacturer_samsung.png', '2015-02-23 09:52:42', NULL);

drop table if exists manufacturers_info;
create table manufacturers_info (
  manufacturers_id int(11) not null ,
  languages_id int(11) not null ,
  manufacturers_url varchar(255) not null ,
  url_clicked int(5) default '0' not null ,
  date_last_click datetime ,
  PRIMARY KEY (manufacturers_id, languages_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('1', '1', 'http://www.matrox.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('1', '2', 'http://www.matrox.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('2', '1', 'http://www.microsoft.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('2', '2', 'http://www.microsoft.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('3', '1', 'http://www.warner.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('3', '2', 'http://www.warner.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('4', '1', 'http://www.fox.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('4', '2', 'http://www.fox.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('5', '1', 'http://www.logitech.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('5', '2', 'http://www.logitech.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('6', '1', 'http://www.canon.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('6', '2', 'http://www.canon.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('7', '1', 'http://www.sierra.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('7', '2', 'http://www.sierra.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('8', '1', 'http://www.infogrames.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('8', '2', 'http://www.infogrames.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('9', '1', 'http://www.hewlettpackard.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('9', '2', 'http://www.hewlettpackard.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('10', '1', 'http://www.samsung.com', '0', NULL);
insert into manufacturers_info (manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click) values ('10', '2', 'http://www.samsung.com', '0', NULL);

drop table if exists newsletters;
create table newsletters (
  newsletters_id int(11) not null auto_increment,
  title varchar(255) not null ,
  content text not null ,
  module varchar(255) not null ,
  date_added datetime not null ,
  date_sent datetime ,
  status int(1) ,
  locked int(1) default '0' ,
  PRIMARY KEY (newsletters_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists orders;
create table orders (
  orders_id int(11) not null auto_increment,
  customers_id int(11) not null ,
  customers_name varchar(255) not null ,
  customers_company varchar(255) ,
  customers_street_address varchar(255) not null ,
  customers_suburb varchar(255) ,
  customers_city varchar(255) not null ,
  customers_postcode varchar(255) not null ,
  customers_state varchar(255) ,
  customers_country varchar(255) not null ,
  customers_telephone varchar(255) not null ,
  customers_email_address varchar(255) not null ,
  customers_address_format_id int(5) not null ,
  delivery_name varchar(255) not null ,
  delivery_company varchar(255) ,
  delivery_street_address varchar(255) not null ,
  delivery_suburb varchar(255) ,
  delivery_city varchar(255) not null ,
  delivery_postcode varchar(255) not null ,
  delivery_state varchar(255) ,
  delivery_country varchar(255) not null ,
  delivery_address_format_id int(5) not null ,
  billing_name varchar(255) not null ,
  billing_company varchar(255) ,
  billing_street_address varchar(255) not null ,
  billing_suburb varchar(255) ,
  billing_city varchar(255) not null ,
  billing_postcode varchar(255) not null ,
  billing_state varchar(255) ,
  billing_country varchar(255) not null ,
  billing_address_format_id int(5) not null ,
  payment_method varchar(255) not null ,
  cc_type varchar(20) ,
  cc_owner varchar(255) ,
  cc_number varchar(32) ,
  cc_expires varchar(4) ,
  last_modified datetime ,
  date_purchased datetime ,
  orders_status int(5) not null ,
  orders_date_finished datetime ,
  currency char(3) ,
  currency_value decimal(14,6) ,
  PRIMARY KEY (orders_id),
  KEY idx_orders_customers_id (customers_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists orders_products;
create table orders_products (
  orders_products_id int(11) not null auto_increment,
  orders_id int(11) not null ,
  products_id int(11) not null ,
  products_model varchar(12) ,
  products_name varchar(64) not null ,
  products_price decimal(15,4) not null ,
  final_price decimal(15,4) not null ,
  products_tax decimal(7,4) not null ,
  products_quantity int(2) not null ,
  PRIMARY KEY (orders_products_id),
  KEY idx_orders_products_orders_id (orders_id),
  KEY idx_orders_products_products_id (products_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;;

drop table if exists orders_products_attributes;
create table orders_products_attributes (
  orders_products_attributes_id int(11) not null auto_increment,
  orders_id int(11) not null ,
  orders_products_id int(11) not null ,
  products_options varchar(32) not null ,
  products_options_values varchar(32) not null ,
  options_values_price decimal(15,4) not null ,
  price_prefix char(1) not null ,
  PRIMARY KEY (orders_products_attributes_id),
  KEY idx_orders_products_att_orders_id (orders_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists orders_products_download;
create table orders_products_download (
  orders_products_download_id int(11) not null auto_increment,
  orders_id int(11) default '0' not null ,
  orders_products_id int(11) default '0' not null ,
  orders_products_filename varchar(255) not null ,
  download_maxdays int(2) default '0' not null ,
  download_count int(2) default '0' not null ,
  PRIMARY KEY (orders_products_download_id),
  KEY idx_orders_products_download_orders_id (orders_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists orders_status;
create table orders_status (
  orders_status_id int(11) default '0' not null ,
  language_id int(11) default '1' not null ,
  orders_status_name varchar(32) not null ,
  public_flag int(11) default '1' ,
  downloads_flag int(11) default '0' ,
  PRIMARY KEY (orders_status_id, language_id),
  KEY idx_orders_status_name (orders_status_name)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('1', '1', 'Pending', '1', '0');
insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('1', '2', 'Offen', '1', '0');
insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('2', '1', 'Processing', '1', '1');
insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('2', '2', 'In Berarbeitung', '1', '1');
insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('3', '1', 'Delivered', '1', '1');
insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('3', '2', 'Geliefert', '1', '1');
insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('4', '1', 'PayPal [Transactions]', '0', '0');
insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('4', '2', 'PayPal [Transaktion]', '1', '0');
insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('5', '1', 'Authorize.net [Transactions]', '0', '0');
insert into orders_status (orders_status_id, language_id, orders_status_name, public_flag, downloads_flag) values ('5', '2', 'Authorize.net [Transaktionen]', '0', '0');

drop table if exists orders_status_history;
create table orders_status_history (
  orders_status_history_id int(11) not null auto_increment,
  orders_id int(11) not null ,
  orders_status_id int(5) not null ,
  date_added datetime not null ,
  customer_notified int(1) default '0' ,
  comments text ,
  PRIMARY KEY (orders_status_history_id),
  KEY idx_orders_status_history_orders_id (orders_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists orders_total;
create table orders_total (
  orders_total_id int(10) unsigned not null auto_increment,
  orders_id int(11) not null ,
  title varchar(255) not null ,
  text varchar(255) not null ,
  value decimal(15,4) not null ,
  class varchar(32) not null ,
  sort_order int(11) not null ,
  PRIMARY KEY (orders_total_id),
  KEY idx_orders_total_orders_id (orders_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists pages;
create table pages (
  pages_id int(11) not null auto_increment,
  sort_order int(3) ,
  status int(1) default '1' not null ,
  page_type char(1) ,
  PRIMARY KEY (pages_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into pages (pages_id, sort_order, status, page_type) values ('11', '0', '1', '3');
insert into pages (pages_id, sort_order, status, page_type) values ('13', '0', '1', '5');
insert into pages (pages_id, sort_order, status, page_type) values ('4', '0', '0', '1');
insert into pages (pages_id, sort_order, status, page_type) values ('5', '0', '1', '8');
insert into pages (pages_id, sort_order, status, page_type) values ('6', '0', '1', '7');
insert into pages (pages_id, sort_order, status, page_type) values ('7', '0', '1', '4');
insert into pages (pages_id, sort_order, status, page_type) values ('8', '0', '1', '7');
insert into pages (pages_id, sort_order, status, page_type) values ('9', '0', '0', '7');
insert into pages (pages_id, sort_order, status, page_type) values ('10', '0', '1', '2');

drop table if exists pages_description;
create table pages_description (
  id int(11) not null auto_increment,
  pages_id int(11) ,
  pages_title varchar(64) not null ,
  pages_html_text text ,
  intorext char(1) ,
  externallink varchar(255) ,
  link_target char(1) ,
  language_id int(3) ,
  PRIMARY KEY (id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('17', '11', 'Zahlungs- Lieferzeit- und Versandinformationen', '<h2>&nbsp;<a href=\"shipping.php?#versand\"><span style=\"color: #9a9a9a;\">Versandkosten</span></a>&nbsp;&nbsp;&nbsp; <a href=\"shipping.php?#lieferzeit\"><span style=\"color: #9a9a9a;\">Lieferzeit</span></a>&nbsp;&nbsp;&nbsp; <a href=\"shipping.php?#zahlung\"><span style=\"color: #9a9a9a;\"> Zahlung</span></a></h2>
<div class=\"contentContainer\">
<div class=\"contentText\">
<h2><a name=\"versand\"></a>Versandkosten:</h2>
<ul>
<li>
<table border=\"1\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\"><caption>Versandkosten pro Lieferung (inkl. MwSt und in Euro) *</caption>
<tbody>
<tr><th scope=\"col\" width=\"40%\">Land</th><th scope=\"col\" width=\"20%\">Zustellung ab Versand<br>in Werktagen</th><th scope=\"col\" width=\"10%\">0-5 kg</th><th scope=\"col\" width=\"10%\">5-10 kg</th><th scope=\"col\" width=\"10%\">10-20 kg</th><th scope=\"col\" width=\"10%\">20-31 kg</th></tr>
<tr>
<td>Deutschland</td>
<td align=\"center\">2-3</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
</tr>
<tr>
<td>EU:<br>A, B, BG, CZ, CY (au&szlig;er Nordteil), DK (au&szlig;er Far&ouml;er, Gr&ouml;nland), E (au&szlig;er Kanaren, Ceuta und Melilla), EST, F (au&szlig;er &Uuml;bersee und Departments), FIN (au&szlig;er Alandinseln), GB (au&szlig;er Kanalinseln), GR (au&szlig;er Berg Athos), H, HR, IRL, I (au&szlig;er Livigno und Campione dItalia), LV, LT, L, M, NL (au&szlig;er non-EU), PL, P, RO, S, SK, SLO</td>
<td align=\"center\">3-5</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
</tr>
</tbody>
</table>
</li>
</ul>
<ul>
<li>(*) Der Versand von Ware bis 31 kg erfolgt in der Regel - wenn Abmessungen (120x60x60 cm) und Gewichte (max. 31 kg) dies zulassen - als versichertes Paket lt. Tabelle.<br> Abweichende Abmessungen und Gewichte, sowie Sendungen ins non-EU-Ausland werden zu den jeweils anfallenden Kosten berechnet.</li>
</ul>
<ul>
<li>Kleinteile k&ouml;nnen auf Kundenwunsch auch per unversichertem Brief/Warensendung f&uuml;r 2.95 Euro innerhalb Deutschlandes verschickt werden; f&uuml;r unversicherte Sendungen k&ouml;nnen wir bei Besch&auml;digung/Verlust keine Haftung &uuml;bernehmen.</li>
</ul>
<ul>
<li>Bei fehlerhaften/unvollst&auml;ndigen Angaben zur Liefer-/Rechnungsanschrift (z.B. falsche PLZ, falsche Hausnummer, nicht zustellbare Adresse wegen fehlendem Namensschild, etc.) kann es zu Mehrkosten bei der Versandabwicklung kommen. Diese Mehrkosten (Zuschl&auml;ge des Kurierdienstes f&uuml;r Adressermittlung, PLZ-Korrektur, etc) gehen zu Lasten des Kunden.</li>
<li></li>
</ul>
<h2><a name=\"lieferzeit\"></a>Lieferzeit:</h2>
<ul>
<li>Die Lieferung erfolgt sp&auml;testens innerhalb von Arbeitstagen (Montag bis Freitag, Feiertage ausgenommen) nach Erteilung des Zahlungsauftrags an das &uuml;berweisende Kreditinstitut (bei Vorkasse) bzw. nach Vertragsschluss (bei Nachnahme oder Rechnungskauf).</li>
</ul>
<ul>
<li>Das voraussichtliche Lieferdatum h&auml;ngt von mehreren Faktoren ab, wie Lieferadresse, Versandart und Verf&uuml;gbarkeit. Zur Berechnung des voraussichtlichen Lieferdatums addieren wir die Dauer einer Bank&uuml;berweisung mit der Zeit, die das Paket von unserem Lager bis zu einer Adresse in Deutschland im Regelfall ben&ouml;tigt. Bitte ber&uuml;cksichtigen Sie dabei, dass Wochenend- und Feiertage hinzugerechnet werden m&uuml;ssen.</li>
</ul>
<ul>
<li>Die Auslieferung Ihrer Bestellung erfolgt &uuml;ber einen unserer Logistikpartner oder .</li>
</ul>
<ul>
<li>Sie sehen das voraussichtliche Lieferdatum (oder einen entsprechenden Zeitrahmen) auf der letzten Seite des Bestellformulars.</li>
</ul>
<h2><a name=\"zahlung\"></a>Zahlung:</h2>
<ul>
<li>Sie k&ouml;nnen bei uns per &Uuml;berweisung bezahlen.</li>
</ul>
</div>
</div>', '1', 'shipping.php', '0', '2');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('3', '4', 'Welcome', 'Herzlich willkommen bei uns', '0', '', '0', '2');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('4', '4', 'Welcome', 'Herzlich willkommen bei uns', '0', '', '0', '1');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('5', '5', 'Widerrufsbelehrung', '<p>F&uuml;gen Sie hier Informationen zum Widerruf ein. **** DE</p>', '1', 'widerruf.php', '0', '2');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('6', '5', 'Withdrawsinformation', '<p>F&uuml;gen Sie hier Informationen zum Widerruf ein. **** EN</p>', '1', 'widerruf.php', '0', '1');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('7', '6', 'Widerrufsformular', '', '1', 'widerruf_form.php', '0', '2');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('8', '6', 'Withdrawlform', '', '1', 'widerruf_form.php', '0', '1');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('9', '7', 'Privatsphäre und Datenschutz', 'Geben Sie Ihre Privatsphäre und Datenschutz Informationen hier ein! +++++++++++++', '1', 'privacy.php', '0', '2');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('10', '7', 'Privacy', 'Geben Sie Ihre Privatsphäre und Datenschutz Informationen hier ein! +++++++++++++', '1', 'privacy.php', '0', '1');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('11', '8', 'Impressum', '<p>Geben Sie hier Ihr Impressum ein.</p>', '0', '', '0', '2');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('12', '8', 'Impressum', '<p>Geben Sie hier Ihr Impressum ein.</p>', '0', '', '0', '1');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('13', '9', 'FAQ', 'Fügen Sie hier Ihre FAQ ein. ', '0', '', '0', '2');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('14', '9', 'FAQ', 'Fügen Sie hier Ihre FAQ ein. ', '0', '', '0', '1');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('15', '10', 'Kontaktformular', '', '1', 'contact_us.php', '0', '2');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('16', '10', 'Contact Us', '', '1', 'contact_us.php', '0', '1');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('18', '11', 'Payment- and shipping information', '<h2>&nbsp;<a href=\"shipping.php?#versand\"><span style=\"color: #9a9a9a;\">shipping costs</span></a>&nbsp;&nbsp;&nbsp; <a href=\"shipping.php?#lieferzeit\"><span style=\"color: #9a9a9a;\">delivery period</span></a>&nbsp;&nbsp;&nbsp; <a href=\"shipping.php?#zahlung\"><span style=\"color: #9a9a9a;\"> payment</span></a></h2>
<div class=\"contentContainer\">
<div class=\"contentText\">
<h2><a name=\"versand\"></a>shipping costs:</h2>
<ul>
<li>
<table border=\"1\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\"><caption>shipping costs per parcel (incl. tax and in Euro) *</caption>
<tbody>
<tr><th scope=\"col\" width=\"40%\">country</th><th scope=\"col\" width=\"20%\">delivery from shipment<br>in workdays</th><th scope=\"col\" width=\"10%\">0-5 kg</th><th scope=\"col\" width=\"10%\">5-10 kg</th><th scope=\"col\" width=\"10%\">10-20 kg</th><th scope=\"col\" width=\"10%\">20-31 kg</th></tr>
<tr>
<td>Germany</td>
<td align=\"center\">2-3</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
</tr>
<tr>
<td>EU:<br>A, B, BG, CZ, CY (besides northern part), DK (besides Faroese, Greenland), E (besides Canaries, Ceuta and Melilla), EST, F (besides oversea and Departments), FIN (besides Alandisland), GB (besides channel island), GR (besides mount Athos), H, HR, IRL, I (besides Livigno and Campione dItalia), LV, LT, L, M, NL (besides non-EU), PL, P, RO, S, SK, SLO</td>
<td align=\"center\">3-5</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
<td align=\"center\">&nbsp;</td>
</tr>
</tbody>
</table>
</li>
</ul>
<ul>
<li>(*) The shipment of products up to 31 kg is usually done as a parcel with insurance as shown on the list above, if allowed by size (120x60x60 cm) and weight (max. 31 kg).<br> The shipping costs for dissenting sizes and weights, as well as parcels to non-EU-countries are calculated in each case.</li>
</ul>
<ul>
<li>Small parts can be shipped via letter starting at Euro on demand. Please note: the letter has no insurance and we assume no liability for damage/loss.</li>
</ul>
<ul>
<li>If the customer specified a wrong/incomplete address (e.g. wrong city code, wrong house number, etc.), the additional costs for the delivery will be charged at the expense of the customer.</li>
<li></li>
</ul>
<h2><a name=\"lieferzeit\"></a>Delivery period:</h2>
<ul>
<li>The shipment will take place inbetween workdays (monday-friday, holidays excluded) after issuing the payment order at the transferring bank (payment in advance) and accordingly after making a contract (purchase on account).</li>
</ul>
<ul>
<li>The estimated delivery period depends on several parameters, like delivery address, mode of shipment, etc. To calculate the estimated delivery period we add the duration of the bank transfer and the regular shipping time by our carrier. Please take account of the addition of weekends and holidays.</li>
</ul>
<ul>
<li>The shipment of your order is carried out by or .</li>
</ul>
<ul>
<li>You can see the estimated delivery period on the last page of your order.</li>
</ul>
<h2><a name=\"zahlung\"></a>payment:</h2>
<ul>
<li>You can pay via bank transfer or .</li>
</ul>
</div>
</div>', '1', 'shipping.php', '0', '1');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('21', '13', 'AGB', '<p>Diese allgemeinen Verkaufs-und Lieferbedingungen gelten f&uuml;r alle 
Kaufvertr&auml;ge, die mit dem Shop Web Shop, XXX einbezogen sind. Mit der Bestellung erkl&auml;ren Sie sich mit diesen Bedingungen. <br> <br> Siehe den Volltext auf Deutsch oder Englisch, indem Sie auf der Landesflagge in der rechten Spalte klicken. Sie k&ouml;nnen dann wieder auf Ihre Sprache, indem Sie die Flagge Ihres Landes anklicken.</p>', '1', 'conditions.php', '0', '1');
insert into pages_description (id, pages_id, pages_title, pages_html_text, intorext, externallink, link_target, language_id) values ('22', '13', 'Conditions', '<p>Put here your Conditions of Use information.</p>', '1', 'conditions.php', '0', '2');

drop table if exists products;
create table products (
  products_id int(11) not null auto_increment,
  products_quantity int(4) not null ,
  products_model varchar(12) ,
  products_image varchar(64) ,
  products_price decimal(15,4) not null ,
  products_baseprice decimal(15,4) not null ,
  products_baseprice_unit varchar(32) not null ,
  products_date_added datetime not null ,
  products_last_modified datetime ,
  products_date_available datetime ,
  products_weight decimal(5,2) not null ,
  products_status tinyint(1) not null ,
  products_tax_class_id int(11) not null ,
  manufacturers_id int(11) ,
  products_ordered int(11) default '0' not null ,
  PRIMARY KEY (products_id),
  KEY idx_products_model (products_model),
  KEY idx_products_date_added (products_date_added)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('1', '32', 'MG200MMS', 'matrox/mg200mms.gif', '299.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '23.00', '1', '1', '1', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('2', '31', 'MG400-32MB', 'matrox/mg400-32mb.gif', '499.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '23.00', '1', '1', '1', '1');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('3', '1', 'MSIMPRO', 'microsoft/msimpro.gif', '49.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '1');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('4', '13', 'DVD-RPMK', 'dvd/replacement_killers.gif', '42.0000', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '23.00', '1', '1', '2', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('5', '16', 'DVD-BLDRNDC', 'dvd/blade_runner.gif', '35.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '1');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('6', '9', 'DVD-MATR', 'dvd/the_matrix.gif', '39.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '1');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('7', '8', 'DVD-YGEM', 'dvd/youve_got_mail.gif', '34.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '2');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('8', '9', 'DVD-ABUG', 'dvd/a_bugs_life.gif', '35.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '1');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('9', '10', 'DVD-UNSG', 'dvd/under_siege.gif', '29.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('10', '10', 'DVD-UNSG2', 'dvd/under_siege2.gif', '29.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('11', '10', 'DVD-FDBL', 'dvd/fire_down_below.gif', '29.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('12', '10', 'DVD-DHWV', 'dvd/die_hard_3.gif', '39.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '4', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('13', '10', 'DVD-LTWP', 'dvd/lethal_weapon.gif', '34.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('14', '10', 'DVD-REDC', 'dvd/red_corner.gif', '44.0000', '0.0000', '', '2015-02-23 09:52:42', '2015-03-03 16:54:50', NULL, '7.00', '1', '1', '3', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('15', '10', 'DVD-FRAN', 'dvd/frantic.gif', '35.0000', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '3', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('16', '10', 'DVD-CUFI', 'dvd/courage_under_fire.gif', '38.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '4', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('17', '10', 'DVD-SPEED', 'dvd/speed.gif', '39.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '4', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('18', '10', 'DVD-SPEED2', 'dvd/speed_2.gif', '42.0000', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '4', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('19', '10', 'DVD-TSAB', 'dvd/theres_something_about_mary.gif', '49.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '4', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('20', '7', 'DVD-BELOVED', 'dvd/beloved.gif', '30.8411', '0.0000', '', '2015-02-23 09:52:42', '2015-03-04 08:59:07', NULL, '7.00', '1', '1', '3', '3');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('21', '16', 'PC-SWAT3', 'sierra/swat_3.gif', '79.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '7.00', '1', '1', '7', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('22', '12', 'PC-UNTM', 'gt_interactive/unreal_tournament.gif', '89.9900', '100.0000', '1 Kg', '2015-02-23 09:52:42', '2015-02-23 11:04:41', NULL, '7.00', '1', '1', '8', '1');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('23', '16', 'PC-TWOF', 'gt_interactive/wheel_of_time.gif', '99.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '10.00', '1', '1', '8', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('24', '16', 'PC-DISC', 'gt_interactive/disciples.gif', '90.0000', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '8.00', '1', '1', '8', '1');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('25', '16', 'MSINTKB', 'microsoft/intkeyboardps2.gif', '69.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '8.00', '1', '1', '2', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('26', '9', 'MSIMEXP', 'microsoft/imexplorer.gif', '64.9500', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '8.00', '1', '1', '2', '1');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('27', '8', 'HPLJ1100XI', 'hewlett_packard/lj1100xi.gif', '499.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '45.00', '1', '1', '9', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('28', '100', 'GT-P1000', 'samsung/galaxy_tab.gif', '749.9900', '0.0000', '', '2015-02-23 09:52:42', NULL, NULL, '1.00', '1', '1', '10', '0');
insert into products (products_id, products_quantity, products_model, products_image, products_price, products_baseprice, products_baseprice_unit, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered) values ('29', '22', '1', 'Penguins.jpg', '1123.0000', '0.0000', '', '2015-03-10 08:43:38', NULL, '2015-03-11 00:00:00', '0.00', '1', '1', '0', '0');

drop table if exists products_attributes;
create table products_attributes (
  products_attributes_id int(11) not null auto_increment,
  products_id int(11) not null ,
  options_id int(11) not null ,
  options_values_id int(11) not null ,
  options_values_price decimal(15,4) not null ,
  price_prefix char(1) not null ,
  PRIMARY KEY (products_attributes_id),
  KEY idx_products_attributes_products_id (products_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('1', '1', '4', '1', '0.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('2', '1', '4', '2', '50.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('3', '1', '4', '3', '70.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('4', '1', '3', '5', '0.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('5', '1', '3', '6', '100.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('6', '2', '4', '3', '10.0000', '-');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('7', '2', '4', '4', '0.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('8', '2', '3', '6', '0.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('9', '2', '3', '7', '120.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('10', '26', '3', '8', '0.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('11', '26', '3', '9', '6.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('26', '22', '5', '10', '0.0000', '+');
insert into products_attributes (products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix) values ('27', '22', '5', '13', '0.0000', '+');

drop table if exists products_attributes_download;
create table products_attributes_download (
  products_attributes_id int(11) not null ,
  products_attributes_filename varchar(255) not null ,
  products_attributes_maxdays int(2) default '0' ,
  products_attributes_maxcount int(2) default '0' ,
  PRIMARY KEY (products_attributes_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into products_attributes_download (products_attributes_id, products_attributes_filename, products_attributes_maxdays, products_attributes_maxcount) values ('26', 'unreal.zip', '7', '3');

drop table if exists products_description;
create table products_description (
  products_id int(11) not null auto_increment,
  language_id int(11) default '1' not null ,
  products_name varchar(64) not null ,
  products_description text ,
  products_url varchar(255) ,
  products_viewed int(5) default '0' ,
  PRIMARY KEY (products_id, language_id),
  KEY products_name (products_name)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('1', '1', 'Matrox G200 MMS', 'Reinforcing its position as a multi-monitor trailblazer, Matrox Graphics Inc. has once again developed the most flexible and highly advanced solution in the industry. Introducing the new Matrox G200 Multi-Monitor Series; the first graphics card ever to support up to four DVI digital flat panel displays on a single 8&quot; PCI board.<br /><br />With continuing demand for digital flat panels in the financial workplace, the Matrox G200 MMS is the ultimate in flexible solutions. The Matrox G200 MMS also supports the new digital video interface (DVI) created by the Digital Display Working Group (DDWG) designed to ease the adoption of digital flat panels. Other configurations include composite video capture ability and onboard TV tuner, making the Matrox G200 MMS the complete solution for business needs.<br /><br />Based on the award-winning MGA-G200 graphics chip, the Matrox G200 Multi-Monitor Series provides superior 2D/3D graphics acceleration to meet the demanding needs of business applications such as real-time stock quotes (Versus), live video feeds (Reuters &amp; Bloombergs), multiple windows applications, word processing, spreadsheets and CAD.', 'www.matrox.com/mga/products/g200_mms/home.cfm', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('1', '2', 'Matrox G200 MMS', 'Reinforcing its position as a multi-monitor trailblazer, Matrox Graphics Inc. has once again developed the most flexible and highly advanced solution in the industry. Introducing the new Matrox G200 Multi-Monitor Series; the first graphics card ever to support up to four DVI digital flat panel displays on a single 8&quot; PCI board.<br /><br />With continuing demand for digital flat panels in the financial workplace, the Matrox G200 MMS is the ultimate in flexible solutions. The Matrox G200 MMS also supports the new digital video interface (DVI) created by the Digital Display Working Group (DDWG) designed to ease the adoption of digital flat panels. Other configurations include composite video capture ability and onboard TV tuner, making the Matrox G200 MMS the complete solution for business needs.<br /><br />Based on the award-winning MGA-G200 graphics chip, the Matrox G200 Multi-Monitor Series provides superior 2D/3D graphics acceleration to meet the demanding needs of business applications such as real-time stock quotes (Versus), live video feeds (Reuters &amp; Bloombergs), multiple windows applications, word processing, spreadsheets and CAD.', 'www.matrox.com/mga/products/g200_mms/home.cfm', '2');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('2', '1', 'Matrox G400 32MB', '<strong>Dramatically Different High Performance Graphics</strong><br /><br />Introducing the Millennium G400 Series - a dramatically different, high performance graphics experience. Armed with the industry\'s fastest graphics chip, the Millennium G400 Series takes explosive acceleration two steps further by adding unprecedented image quality, along with the most versatile display options for all your 3D, 2D and DVD applications. As the most powerful and innovative tools in your PC\'s arsenal, the Millennium G400 Series will not only change the way you see graphics, but will revolutionize the way you use your computer.<br /><br /><strong>Key features:</strong><ul><li>New Matrox G400 256-bit DualBus graphics chip</li><li>Explosive 3D, 2D and DVD performance</li><li>DualHead Display</li><li>Superior DVD and TV output</li><li>3D Environment-Mapped Bump Mapping</li><li>Vibrant Color Quality rendering </li><li>UltraSharp DAC of up to 360 MHz</li><li>3D Rendering Array Processor</li><li>Support for 16 or 32 MB of memory</li></ul>', 'www.matrox.com/mga/products/mill_g400/home.htm', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('2', '2', 'Matrox G400 32MB', '<strong>Dramatically Different High Performance Graphics</strong><br /><br />Introducing the Millennium G400 Series - a dramatically different, high performance graphics experience. Armed with the industry\'s fastest graphics chip, the Millennium G400 Series takes explosive acceleration two steps further by adding unprecedented image quality, along with the most versatile display options for all your 3D, 2D and DVD applications. As the most powerful and innovative tools in your PC\'s arsenal, the Millennium G400 Series will not only change the way you see graphics, but will revolutionize the way you use your computer.<br /><br /><strong>Key features:</strong><ul><li>New Matrox G400 256-bit DualBus graphics chip</li><li>Explosive 3D, 2D and DVD performance</li><li>DualHead Display</li><li>Superior DVD and TV output</li><li>3D Environment-Mapped Bump Mapping</li><li>Vibrant Color Quality rendering </li><li>UltraSharp DAC of up to 360 MHz</li><li>3D Rendering Array Processor</li><li>Support for 16 or 32 MB of memory</li></ul>', 'www.matrox.com/mga/products/mill_g400/home.htm', '2');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('3', '1', 'Microsoft IntelliMouse Pro', 'Every element of IntelliMouse Pro - from its unique arched shape to the texture of the rubber grip around its base - is the product of extensive customer and ergonomic research. Microsoft\'s popular wheel control, which now allows zooming and universal scrolling functions, gives IntelliMouse Pro outstanding comfort and efficiency.', 'www.microsoft.com/hardware/mouse/intellimouse.asp', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('3', '2', 'Microsoft IntelliMouse Pro', 'Every element of IntelliMouse Pro - from its unique arched shape to the texture of the rubber grip around its base - is the product of extensive customer and ergonomic research. Microsoft\'s popular wheel control, which now allows zooming and universal scrolling functions, gives IntelliMouse Pro outstanding comfort and efficiency.', 'www.microsoft.com/hardware/mouse/intellimouse.asp', '1');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('4', '1', 'The Replacement Killers - Die Ersatzkiller', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />Languages: English, Deutsch.<br />Subtitles: English, Deutsch, Spanish.<br />Audio: Dolby Surround 5.1.<br />Picture Format: 16:9 Wide-Screen.<br />Length: (approx) 80 minutes.<br />Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.replacement-killers.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('4', '2', 'The Replacement Killers', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />Languages: English, Deutsch.<br />Subtitles: English, Deutsch, Spanish.<br />Audio: Dolby Surround 5.1.<br />Picture Format: 16:9 Wide-Screen.<br />Length: (approx) 80 minutes.<br />Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.replacement-killers.com', '1');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('5', '1', 'Blade Runner - Director\'s Cut', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />Languages: English, Deutsch.<br />Subtitles: English, Deutsch, Spanish.<br />Audio: Dolby Surround 5.1.<br />Picture Format: 16:9 Wide-Screen.<br />Length: (approx) 112 minutes.<br />Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.bladerunner.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('5', '2', 'Blade Runner - Director\'s Cut', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />Languages: English, Deutsch.<br />Subtitles: English, Deutsch, Spanish.<br />Audio: Dolby Surround 5.1.<br />Picture Format: 16:9 Wide-Screen.<br />Length: (approx) 112 minutes.<br />Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.bladerunner.com', '1');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('6', '1', 'The Matrix', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch.<br />
Audio: Dolby Surround.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 131 minutes.<br />
Other: Interactive Menus, Chapter Selection, Making Of.', 'www.thematrix.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('6', '2', 'The Matrix', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch.<br />
Audio: Dolby Surround.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 131 minutes.<br />
Other: Interactive Menus, Chapter Selection, Making Of.', 'www.thematrix.com', '4');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('7', '1', 'Email für dich', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch, Spanish.<br />
Subtitles: English, Deutsch, Spanish, French, Nordic, Polish.<br />
Audio: Dolby Digital 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 115 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.youvegotmail.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('7', '2', 'You\'ve Got Mail', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch, Spanish.<br />
Subtitles: English, Deutsch, Spanish, French, Nordic, Polish.<br />
Audio: Dolby Digital 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 115 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.youvegotmail.com', '6');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('8', '1', 'Das große Krabbeln', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Digital 5.1 / Dobly Surround Stereo.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 91 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.abugslife.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('8', '2', 'A Bug\'s Life', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Digital 5.1 / Dobly Surround Stereo.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 91 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.abugslife.com', '1');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('9', '1', 'Alarmstufe Rot', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 98 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('9', '2', 'Under Siege', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 98 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('10', '1', 'Alarmstufe Rot 2 - Dark Territory', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 98 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('10', '2', 'Under Siege 2 - Dark Territory', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 98 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('11', '1', 'Fire Down Below', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 100 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('11', '2', 'Fire Down Below', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 100 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('12', '1', 'Stirb Langsam - Jetzt erst recht', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 122 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('12', '2', 'Die Hard With A Vengeance', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 122 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('13', '1', 'Lethal Weapon - Zwei stahlharte Profis', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 100 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('13', '2', 'Lethal Weapon', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 100 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('14', '1', 'Red Corner - Labyrinth ohne Ausweg', '<p>Regional Code: 2 (Japan, Europe, Middle East, South Africa). <br> Languages: English, Deutsch. <br> Subtitles: English, Deutsch, Spanish. <br> Audio: Dolby Surround 5.1. <br> Picture Format: 16:9 Wide-Screen. <br> Length: (approx) 117 minutes. <br> Other: Interactive Menus, Chapter Selection, Subtitles (more languages).</p>', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('14', '2', 'Red Corner', '<p>Regional Code: 2 (Japan, Europe, Middle East, South Africa). <br> Languages: English, Deutsch. <br> Subtitles: English, Deutsch, Spanish. <br> Audio: Dolby Surround 5.1. <br> Picture Format: 16:9 Wide-Screen. <br> Length: (approx) 117 minutes. <br> Other: Interactive Menus, Chapter Selection, Subtitles (more languages).</p>', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('15', '1', 'Frantic', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 115 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('15', '2', 'Frantic', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 115 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('16', '1', 'Courage Under Fire', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 112 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('16', '2', 'Courage Under Fire', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 112 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('17', '1', 'Speed', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 112 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('17', '2', 'Speed', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 112 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('18', '1', 'Speed 2: Cruise Control', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 120 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('18', '2', 'Speed 2: Cruise Control', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 120 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('19', '1', 'There\'s Something About Mary', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 114 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('19', '2', 'There\'s Something About Mary', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />
Languages: English, Deutsch.<br />
Subtitles: English, Deutsch, Spanish.<br />
Audio: Dolby Surround 5.1.<br />
Picture Format: 16:9 Wide-Screen.<br />
Length: (approx) 114 minutes.<br />
Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('20', '1', 'Menschenkind', '<p>Regional Code: 2 (Japan, Europe, Middle East, South Africa). <br> Languages: English, Deutsch. <br> Subtitles: English, Deutsch, Spanish. <br> Audio: Dolby Surround 5.1. <br> Picture Format: 16:9 Wide-Screen. <br> Length: (approx) 164 minutes. <br> Other: Interactive Menus, Chapter Selection, Subtitles (more languages).</p>', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('20', '2', 'Beloved', '<p>Regional Code: 2 (Japan, Europe, Middle East, South Africa). <br> Languages: English, Deutsch. <br> Subtitles: English, Deutsch, Spanish. <br> Audio: Dolby Surround 5.1. <br> Picture Format: 16:9 Wide-Screen. <br> Length: (approx) 164 minutes. <br> Other: Interactive Menus, Chapter Selection, Subtitles (more languages).</p>', '', '2');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('21', '1', 'SWAT 3: Close Quarters Battle', '<strong>Windows 95/98</strong><br /><br />211 in progress with shots fired. Officer down. Armed suspects with hostages. Respond Code 3! Los Angles, 2005, In the next seven days, representatives from every nation around the world will converge on Las Angles to witness the signing of the United Nations Nuclear Abolishment Treaty. The protection of these dignitaries falls on the shoulders of one organization, LAPD SWAT. As part of this elite tactical organization, you and your team have the weapons and all the training necessary to protect, to serve, and \"When needed\" to use deadly force to keep the peace. It takes more than weapons to make it through each mission. Your arsenal includes C2 charges, flashbangs, tactical grenades. opti-Wand mini-video cameras, and other devices critical to meeting your objectives and keeping your men free of injury. Uncompromised Duty, Honor and Valor!', 'www.swat3.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('21', '2', 'SWAT 3: Close Quarters Battle', '<strong>Windows 95/98</strong><br /><br />211 in progress with shots fired. Officer down. Armed suspects with hostages. Respond Code 3! Los Angles, 2005, In the next seven days, representatives from every nation around the world will converge on Las Angles to witness the signing of the United Nations Nuclear Abolishment Treaty. The protection of these dignitaries falls on the shoulders of one organization, LAPD SWAT. As part of this elite tactical organization, you and your team have the weapons and all the training necessary to protect, to serve, and \"When needed\" to use deadly force to keep the peace. It takes more than weapons to make it through each mission. Your arsenal includes C2 charges, flashbangs, tactical grenades. opti-Wand mini-video cameras, and other devices critical to meeting your objectives and keeping your men free of injury. Uncompromised Duty, Honor and Valor!', 'www.swat3.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('22', '1', 'Unreal Tournament', '<p>From the creators of the best-selling Unreal, comes Unreal Tournament. A new kind of single player experience. A ruthless multiplayer revolution.<br><br>This stand-alone game showcases completely new team-based gameplay, groundbreaking multi-faceted single player action or dynamic multi-player mayhem. It\'s a fight to the finish for the title of Unreal Grand Master in the gladiatorial arena. A single player experience like no other! Guide your team of \'bots\' (virtual teamates) against the hardest criminals in the galaxy for the ultimate title - the Unreal Grand Master.</p>', 'www.unrealtournament.net', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('22', '2', 'Unreal Tournament', '<p>From the creators of the best-selling Unreal, comes Unreal Tournament. A new kind of single player experience. A ruthless multiplayer revolution.<br><br>This stand-alone game showcases completely new team-based gameplay, groundbreaking multi-faceted single player action or dynamic multi-player mayhem. It\'s a fight to the finish for the title of Unreal Grand Master in the gladiatorial arena. A single player experience like no other! Guide your team of \'bots\' (virtual teamates) against the hardest criminals in the galaxy for the ultimate title - the Unreal Grand Master.</p>', 'www.unrealtournament.net', '3');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('23', '1', 'The Wheel Of Time', 'The world in which The Wheel of Time takes place is lifted directly out of Jordan\'s pages; it\'s huge and consists of many different environments. How you navigate the world will depend largely on which game - single player or multipayer - you\'re playing. The single player experience, with a few exceptions, will see Elayna traversing the world mainly by foot (with a couple notable exceptions). In the multiplayer experience, your character will have more access to travel via Ter\'angreal, Portal Stones, and the Ways. However you move around, though, you\'ll quickly discover that means of locomotion can easily become the least of the your worries...<br /><br />During your travels, you quickly discover that four locations are crucial to your success in the game. Not surprisingly, these locations are the homes of The Wheel of Time\'s main characters. Some of these places are ripped directly from the pages of Jordan\'s books, made flesh with Legend\'s unparalleled pixel-pushing ways. Other places are specific to the game, conceived and executed with the intent of expanding this game world even further. Either way, they provide a backdrop for some of the most intense first person action and strategy you\'ll have this year.', 'www.wheeloftime.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('23', '2', 'The Wheel Of Time', 'The world in which The Wheel of Time takes place is lifted directly out of Jordan\'s pages; it\'s huge and consists of many different environments. How you navigate the world will depend largely on which game - single player or multipayer - you\'re playing. The single player experience, with a few exceptions, will see Elayna traversing the world mainly by foot (with a couple notable exceptions). In the multiplayer experience, your character will have more access to travel via Ter\'angreal, Portal Stones, and the Ways. However you move around, though, you\'ll quickly discover that means of locomotion can easily become the least of the your worries...<br /><br />During your travels, you quickly discover that four locations are crucial to your success in the game. Not surprisingly, these locations are the homes of The Wheel of Time\'s main characters. Some of these places are ripped directly from the pages of Jordan\'s books, made flesh with Legend\'s unparalleled pixel-pushing ways. Other places are specific to the game, conceived and executed with the intent of expanding this game world even further. Either way, they provide a backdrop for some of the most intense first person action and strategy you\'ll have this year.', 'www.wheeloftime.com', '1');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('24', '1', 'Disciples: Sacred Lands', 'A new age is dawning...<br /><br />Enter the realm of the Sacred Lands, where the dawn of a New Age has set in motion the most momentous of wars. As the prophecies long foretold, four races now clash with swords and sorcery in a desperate bid to control the destiny of their gods. Take on the quest as a champion of the Empire, the Mountain Clans, the Legions of the Damned, or the Undead Hordes and test your faith in battles of brute force, spellbinding magic and acts of guile. Slay demons, vanquish giants and combat merciless forces of the dead and undead. But to ensure the salvation of your god, the hero within must evolve.<br /><br />The day of reckoning has come... and only the chosen will survive.', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('24', '2', 'Disciples: Sacred Lands', 'A new age is dawning...<br /><br />Enter the realm of the Sacred Lands, where the dawn of a New Age has set in motion the most momentous of wars. As the prophecies long foretold, four races now clash with swords and sorcery in a desperate bid to control the destiny of their gods. Take on the quest as a champion of the Empire, the Mountain Clans, the Legions of the Damned, or the Undead Hordes and test your faith in battles of brute force, spellbinding magic and acts of guile. Slay demons, vanquish giants and combat merciless forces of the dead and undead. But to ensure the salvation of your god, the hero within must evolve.<br /><br />The day of reckoning has come... and only the chosen will survive.', '', '3');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('25', '1', 'Microsoft Internet Keyboard PS/2', 'The Internet Keyboard has 10 Hot Keys on a comfortable standard keyboard design that also includes a detachable palm rest. The Hot Keys allow you to browse the web, or check e-mail directly from your keyboard. The IntelliType Pro software also allows you to customize your hot keys - make the Internet Keyboard work the way you want it to!', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('25', '2', 'Microsoft Internet Keyboard PS/2', 'The Internet Keyboard has 10 Hot Keys on a comfortable standard keyboard design that also includes a detachable palm rest. The Hot Keys allow you to browse the web, or check e-mail directly from your keyboard. The IntelliType Pro software also allows you to customize your hot keys - make the Internet Keyboard work the way you want it to!', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('26', '1', 'Microsoft IntelliMouse Explorer', 'Microsoft introduces its most advanced mouse, the IntelliMouse Explorer! IntelliMouse Explorer features a sleek design, an industrial-silver finish, a glowing red underside and taillight, creating a style and look unlike any other mouse. IntelliMouse Explorer combines the accuracy and reliability of Microsoft IntelliEye optical tracking technology, the convenience of two new customizable function buttons, the efficiency of the scrolling wheel and the comfort of expert ergonomic design. All these great features make this the best mouse for the PC!', 'www.microsoft.com/hardware/mouse/explorer.asp', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('26', '2', 'Microsoft IntelliMouse Explorer', 'Microsoft introduces its most advanced mouse, the IntelliMouse Explorer! IntelliMouse Explorer features a sleek design, an industrial-silver finish, a glowing red underside and taillight, creating a style and look unlike any other mouse. IntelliMouse Explorer combines the accuracy and reliability of Microsoft IntelliEye optical tracking technology, the convenience of two new customizable function buttons, the efficiency of the scrolling wheel and the comfort of expert ergonomic design. All these great features make this the best mouse for the PC!', 'www.microsoft.com/hardware/mouse/explorer.asp', '1');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('27', '1', 'Hewlett Packard LaserJet 1100Xi', 'HP has always set the pace in laser printing technology. The new generation HP LaserJet 1100 series sets another impressive pace, delivering a stunning 8 pages per minute print speed. The 600 dpi print resolution with HP\'s Resolution Enhancement technology (REt) makes every document more professional.<br /><br />Enhanced print speed and laser quality results are just the beginning. With 2MB standard memory, HP LaserJet 1100xi users will be able to print increasingly complex pages. Memory can be increased to 18MB to tackle even more complex documents with ease. The HP LaserJet 1100xi supports key operating systems including Windows 3.1, 3.11, 95, 98, NT 4.0, OS/2 and DOS. Network compatibility available via the optional HP JetDirect External Print Servers.<br /><br />HP LaserJet 1100xi also features The Document Builder for the Web Era from Trellix Corp. (featuring software to create Web documents).', 'www.pandi.hp.com/pandi-db/prodinfo.main?product=laserjet1100', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('27', '2', 'Hewlett Packard LaserJet 1100Xi', 'HP has always set the pace in laser printing technology. The new generation HP LaserJet 1100 series sets another impressive pace, delivering a stunning 8 pages per minute print speed. The 600 dpi print resolution with HP\'s Resolution Enhancement technology (REt) makes every document more professional.<br /><br />Enhanced print speed and laser quality results are just the beginning. With 2MB standard memory, HP LaserJet 1100xi users will be able to print increasingly complex pages. Memory can be increased to 18MB to tackle even more complex documents with ease. The HP LaserJet 1100xi supports key operating systems including Windows 3.1, 3.11, 95, 98, NT 4.0, OS/2 and DOS. Network compatibility available via the optional HP JetDirect External Print Servers.<br /><br />HP LaserJet 1100xi also features The Document Builder for the Web Era from Trellix Corp. (featuring software to create Web documents).', 'www.pandi.hp.com/pandi-db/prodinfo.main?product=laserjet1100', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('28', '1', 'Samsung Galaxy Tab', '<p>Powered by a Cortex A8 1.0GHz application processor, the Samsung GALAXY Tab is designed to deliver high performance whenever and wherever you are. At the same time, HD video contents are supported by a wide range of multimedia formats (DivX, XviD, MPEG4, H.263, H.264 and more), which maximizes the joy of entertainment.</p><p>With 3G HSPA connectivity, 802.11n Wi-Fi, and Bluetooth 3.0, the Samsung GALAXY Tab enhances users\' mobile communication on a whole new level. Video conferencing and push email on the large 7-inch display make communication more smooth and efficient. For voice telephony, the Samsung GALAXY Tab turns out to be a perfect speakerphone on the desk, or a mobile phone on the move via Bluetooth headset.</p>', 'http://galaxytab.samsungmobile.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('28', '2', 'Samsung Galaxy Tab', '<p>Powered by a Cortex A8 1.0GHz application processor, the Samsung GALAXY Tab is designed to deliver high performance whenever and wherever you are. At the same time, HD video contents are supported by a wide range of multimedia formats (DivX, XviD, MPEG4, H.263, H.264 and more), which maximizes the joy of entertainment.</p><p>With 3G HSPA connectivity, 802.11n Wi-Fi, and Bluetooth 3.0, the Samsung GALAXY Tab enhances users\' mobile communication on a whole new level. Video conferencing and push email on the large 7-inch display make communication more smooth and efficient. For voice telephony, the Samsung GALAXY Tab turns out to be a perfect speakerphone on the desk, or a mobile phone on the move via Bluetooth headset.</p>', 'http://galaxytab.samsungmobile.com', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('29', '1', 'Bärendienst', '<p>Auch Ihnen können wir einen B&auml;rendienst erweisen.</p>', '', '0');
insert into products_description (products_id, language_id, products_name, products_description, products_url, products_viewed) values ('29', '2', 'Bärendienst', '<p>Einen B&auml;rendienst mit lauter Umlauten &Auml;&Uuml;&Ouml;&auml;&uuml;&ouml;&szlig;</p>', '', '4');

drop table if exists products_images;
create table products_images (
  id int(11) not null auto_increment,
  products_id int(11) not null ,
  image varchar(64) ,
  htmlcontent text ,
  sort_order int(11) not null ,
  PRIMARY KEY (id),
  KEY products_images_prodid (products_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('1', '28', 'samsung/galaxy_tab_1.jpg', NULL, '1');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('2', '28', 'samsung/galaxy_tab_2.jpg', NULL, '2');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('3', '28', 'samsung/galaxy_tab_3.jpg', NULL, '3');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('4', '28', 'samsung/galaxy_tab_4.jpg', '<iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/tAbsmHMAhrQ\" frameborder=\"0\" allowfullscreen></iframe>', '4');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('5', '17', 'dvd/speed_large.jpg', NULL, '1');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('6', '12', 'dvd/die_hard_3_large.jpg', NULL, '1');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('7', '11', 'dvd/fire_down_below_large.jpg', NULL, '1');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('8', '13', 'dvd/lethal_weapon_large.jpg', NULL, '1');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('9', '18', 'dvd/speed_2_large.jpg', NULL, '1');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('10', '6', 'dvd/the_matrix_large.jpg', NULL, '1');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('11', '4', 'dvd/replacement_killers_large.jpg', NULL, '1');
insert into products_images (id, products_id, image, htmlcontent, sort_order) values ('12', '9', 'dvd/under_siege_large.jpg', NULL, '1');

drop table if exists products_notifications;
create table products_notifications (
  products_id int(11) not null ,
  customers_id int(11) not null ,
  date_added datetime not null ,
  PRIMARY KEY (products_id, customers_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists products_options;
create table products_options (
  products_options_id int(11) default '0' not null ,
  language_id int(11) default '1' not null ,
  products_options_name varchar(32) not null ,
  PRIMARY KEY (products_options_id, language_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;;

insert into products_options (products_options_id, language_id, products_options_name) values ('1', '1', 'Color');
insert into products_options (products_options_id, language_id, products_options_name) values ('1', '2', 'Color');
insert into products_options (products_options_id, language_id, products_options_name) values ('2', '1', 'Size');
insert into products_options (products_options_id, language_id, products_options_name) values ('2', '2', 'Size');
insert into products_options (products_options_id, language_id, products_options_name) values ('3', '1', 'Model');
insert into products_options (products_options_id, language_id, products_options_name) values ('3', '2', 'Model');
insert into products_options (products_options_id, language_id, products_options_name) values ('4', '1', 'Memory');
insert into products_options (products_options_id, language_id, products_options_name) values ('4', '2', 'Memory');
insert into products_options (products_options_id, language_id, products_options_name) values ('5', '1', 'Version');
insert into products_options (products_options_id, language_id, products_options_name) values ('5', '2', 'Version');


drop table if exists products_options_values;
create table products_options_values (
  products_options_values_id int(11) default '0' not null ,
  language_id int(11) default '1' not null ,
  products_options_values_name varchar(64) not null ,
  PRIMARY KEY (products_options_values_id, language_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('1', '1', '4 mb');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('1', '2', '4 mb');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('2', '1', '8 mb');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('2', '2', '8 mb');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('3', '1', '16 mb');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('3', '2', '16 mb');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('4', '1', '32 mb');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('4', '2', '32 mb');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('5', '1', 'Value');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('5', '2', 'Value');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('6', '1', 'Premium');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('6', '2', 'Premium');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('7', '1', 'Deluxe');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('7', '2', 'Deluxe');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('8', '1', 'PS/2');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('8', '2', 'PS/2');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('9', '1', 'USB');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('9', '2', 'USB');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('10', '1', 'Download: Windows - English');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('10', '2', 'Download: Windows - English');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('13', '1', 'Box: Windows - English');
insert into products_options_values (products_options_values_id, language_id, products_options_values_name) values ('13', '2', 'Box: Windows - English');

drop table if exists products_options_values_to_products_options;
create table products_options_values_to_products_options (
  products_options_values_to_products_options_id int(11) not null auto_increment,
  products_options_id int(11) not null ,
  products_options_values_id int(11) not null ,
  PRIMARY KEY (products_options_values_to_products_options_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('1', '4', '1');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('2', '4', '2');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('3', '4', '3');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('4', '4', '4');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('5', '3', '5');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('6', '3', '6');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('7', '3', '7');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('8', '3', '8');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('9', '3', '9');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('10', '5', '10');
insert into products_options_values_to_products_options (products_options_values_to_products_options_id, products_options_id, products_options_values_id) values ('13', '5', '13');

drop table if exists products_to_categories;
create table products_to_categories (
  products_id int(11) not null ,
  categories_id int(11) not null ,
  PRIMARY KEY (products_id, categories_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into products_to_categories (products_id, categories_id) values ('1', '4');
insert into products_to_categories (products_id, categories_id) values ('2', '4');
insert into products_to_categories (products_id, categories_id) values ('3', '9');
insert into products_to_categories (products_id, categories_id) values ('4', '10');
insert into products_to_categories (products_id, categories_id) values ('5', '11');
insert into products_to_categories (products_id, categories_id) values ('6', '10');
insert into products_to_categories (products_id, categories_id) values ('7', '12');
insert into products_to_categories (products_id, categories_id) values ('8', '13');
insert into products_to_categories (products_id, categories_id) values ('9', '10');
insert into products_to_categories (products_id, categories_id) values ('10', '10');
insert into products_to_categories (products_id, categories_id) values ('11', '10');
insert into products_to_categories (products_id, categories_id) values ('12', '10');
insert into products_to_categories (products_id, categories_id) values ('13', '10');
insert into products_to_categories (products_id, categories_id) values ('14', '15');
insert into products_to_categories (products_id, categories_id) values ('15', '14');
insert into products_to_categories (products_id, categories_id) values ('16', '15');
insert into products_to_categories (products_id, categories_id) values ('17', '10');
insert into products_to_categories (products_id, categories_id) values ('18', '10');
insert into products_to_categories (products_id, categories_id) values ('19', '12');
insert into products_to_categories (products_id, categories_id) values ('20', '15');
insert into products_to_categories (products_id, categories_id) values ('21', '18');
insert into products_to_categories (products_id, categories_id) values ('22', '19');
insert into products_to_categories (products_id, categories_id) values ('23', '20');
insert into products_to_categories (products_id, categories_id) values ('24', '20');
insert into products_to_categories (products_id, categories_id) values ('25', '8');
insert into products_to_categories (products_id, categories_id) values ('26', '9');
insert into products_to_categories (products_id, categories_id) values ('27', '5');
insert into products_to_categories (products_id, categories_id) values ('28', '21');
insert into products_to_categories (products_id, categories_id) values ('29', '21');

drop table if exists reviews;
create table reviews (
  reviews_id int(11) not null auto_increment,
  products_id int(11) not null ,
  customers_id int(11) ,
  customers_name varchar(255) not null ,
  reviews_rating int(1) ,
  date_added datetime ,
  last_modified datetime ,
  reviews_status tinyint(1) default '0' not null ,
  reviews_read int(5) default '0' not null ,
  PRIMARY KEY (reviews_id),
  KEY idx_reviews_products_id (products_id),
  KEY idx_reviews_customers_id (customers_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into reviews (reviews_id, products_id, customers_id, customers_name, reviews_rating, date_added, last_modified, reviews_status, reviews_read) values ('1', '19', '0', 'John Doe', '5', '2015-02-23 09:52:44', NULL, '1', '0');


drop table if exists reviews_description;
create table reviews_description (
  reviews_id int(11) not null ,
  languages_id int(11) not null ,
  reviews_text text not null ,
  PRIMARY KEY (reviews_id, languages_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into reviews_description (reviews_id, languages_id, reviews_text) values ('1', '1', 'This has to be one of the funniest movies released for 1999!');


drop table if exists sec_directory_whitelist;
create table sec_directory_whitelist (
  id int(11) not null auto_increment,
  directory varchar(255) not null ,
  PRIMARY KEY (id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into sec_directory_whitelist (id, directory) values ('1', 'admin/backups');
insert into sec_directory_whitelist (id, directory) values ('2', 'admin/images/graphs');
insert into sec_directory_whitelist (id, directory) values ('3', 'images');
insert into sec_directory_whitelist (id, directory) values ('4', 'images/banners');
insert into sec_directory_whitelist (id, directory) values ('5', 'images/dvd');
insert into sec_directory_whitelist (id, directory) values ('6', 'images/gt_interactive');
insert into sec_directory_whitelist (id, directory) values ('7', 'images/hewlett_packard');
insert into sec_directory_whitelist (id, directory) values ('8', 'images/matrox');
insert into sec_directory_whitelist (id, directory) values ('9', 'images/microsoft');
insert into sec_directory_whitelist (id, directory) values ('10', 'images/samsung');
insert into sec_directory_whitelist (id, directory) values ('11', 'images/sierra');
insert into sec_directory_whitelist (id, directory) values ('12', 'includes/work');
insert into sec_directory_whitelist (id, directory) values ('13', 'pub');

drop table if exists sessions;
create table sessions (
  sesskey varchar(128) not null ,
  expiry int(11) unsigned not null ,
  value text not null ,
  PRIMARY KEY (sesskey)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists specials;
create table specials (
  specials_id int(11) not null auto_increment,
  products_id int(11) not null ,
  specials_new_products_price decimal(15,4) not null ,
  specials_date_added datetime ,
  specials_last_modified datetime ,
  expires_date datetime ,
  date_status_change datetime ,
  status int(1) default '1' not null ,
  PRIMARY KEY (specials_id),
  KEY idx_specials_products_id (products_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into specials (specials_id, products_id, specials_new_products_price, specials_date_added, specials_last_modified, expires_date, date_status_change, status) values ('1', '3', '39.9900', '2015-02-23 09:52:45', NULL, NULL, NULL, '1');
insert into specials (specials_id, products_id, specials_new_products_price, specials_date_added, specials_last_modified, expires_date, date_status_change, status) values ('2', '5', '30.0000', '2015-02-23 09:52:45', NULL, NULL, NULL, '1');
insert into specials (specials_id, products_id, specials_new_products_price, specials_date_added, specials_last_modified, expires_date, date_status_change, status) values ('3', '6', '30.0000', '2015-02-23 09:52:45', NULL, NULL, NULL, '1');
insert into specials (specials_id, products_id, specials_new_products_price, specials_date_added, specials_last_modified, expires_date, date_status_change, status) values ('4', '16', '29.9900', '2015-02-23 09:52:45', NULL, NULL, NULL, '1');

drop table if exists tax_class;
create table tax_class (
  tax_class_id int(11) not null auto_increment,
  tax_class_title varchar(32) not null ,
  tax_class_description varchar(255) not null ,
  last_modified datetime ,
  date_added datetime not null ,
  PRIMARY KEY (tax_class_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into tax_class (tax_class_id, tax_class_title, tax_class_description, last_modified, date_added) values ('1', '19 Prozent', '19 Prozent', '2015-03-03 16:52:23', '2016-02-04 09:52:45');
drop table if exists tax_rates;
create table tax_rates (
  tax_rates_id int(11) not null auto_increment,
  tax_zone_id int(11) not null ,
  tax_class_id int(11) not null ,
  tax_priority int(5) default '1' ,
  tax_rate decimal(7,4) not null ,
  tax_description varchar(255) not null ,
  last_modified datetime ,
  date_added datetime not null ,
  PRIMARY KEY (tax_rates_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into tax_rates (tax_rates_id, tax_zone_id, tax_class_id, tax_priority, tax_rate, tax_description, last_modified, date_added) values ('1', '1', '1', '1', '19.0000', '19.0% MwSt', '2016-02-04 16:52:41', '2015-02-23 09:52:45');

drop table if exists usu_cache;
create table usu_cache (
  cache_name varchar(64) not null ,
  cache_data longtext not null ,
  cache_date datetime not null ,
  UNIQUE cache_name (cache_name)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists whos_online;
create table whos_online (
  customer_id int(11) ,
  full_name varchar(255) not null ,
  session_id varchar(128) not null ,
  ip_address varchar(15) not null ,
  time_entry varchar(14) not null ,
  time_last_click varchar(14) not null ,
  last_page_url text not null ,
  KEY idx_whos_online_session_id (session_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

drop table if exists zones;
create table zones (
  zone_id int(11) not null auto_increment,
  zone_country_id int(11) not null ,
  zone_code varchar(32) not null ,
  zone_name varchar(255) not null ,
  PRIMARY KEY (zone_id),
  KEY idx_zones_country_id (zone_country_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('1', '223', 'AL', 'Alabama');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('2', '223', 'AK', 'Alaska');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('3', '223', 'AS', 'American Samoa');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('4', '223', 'AZ', 'Arizona');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('5', '223', 'AR', 'Arkansas');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('6', '223', 'AF', 'Armed Forces Africa');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('7', '223', 'AA', 'Armed Forces Americas');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('8', '223', 'AC', 'Armed Forces Canada');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('9', '223', 'AE', 'Armed Forces Europe');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('10', '223', 'AM', 'Armed Forces Middle East');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('11', '223', 'AP', 'Armed Forces Pacific');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('12', '223', 'CA', 'California');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('13', '223', 'CO', 'Colorado');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('14', '223', 'CT', 'Connecticut');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('15', '223', 'DE', 'Delaware');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('16', '223', 'DC', 'District of Columbia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('17', '223', 'FM', 'Federated States Of Micronesia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('18', '223', 'FL', 'Florida');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('19', '223', 'GA', 'Georgia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('20', '223', 'GU', 'Guam');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('21', '223', 'HI', 'Hawaii');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('22', '223', 'ID', 'Idaho');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('23', '223', 'IL', 'Illinois');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('24', '223', 'IN', 'Indiana');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('25', '223', 'IA', 'Iowa');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('26', '223', 'KS', 'Kansas');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('27', '223', 'KY', 'Kentucky');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('28', '223', 'LA', 'Louisiana');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('29', '223', 'ME', 'Maine');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('30', '223', 'MH', 'Marshall Islands');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('31', '223', 'MD', 'Maryland');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('32', '223', 'MA', 'Massachusetts');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('33', '223', 'MI', 'Michigan');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('34', '223', 'MN', 'Minnesota');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('35', '223', 'MS', 'Mississippi');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('36', '223', 'MO', 'Missouri');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('37', '223', 'MT', 'Montana');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('38', '223', 'NE', 'Nebraska');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('39', '223', 'NV', 'Nevada');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('40', '223', 'NH', 'New Hampshire');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('41', '223', 'NJ', 'New Jersey');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('42', '223', 'NM', 'New Mexico');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('43', '223', 'NY', 'New York');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('44', '223', 'NC', 'North Carolina');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('45', '223', 'ND', 'North Dakota');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('46', '223', 'MP', 'Northern Mariana Islands');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('47', '223', 'OH', 'Ohio');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('48', '223', 'OK', 'Oklahoma');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('49', '223', 'OR', 'Oregon');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('50', '223', 'PW', 'Palau');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('51', '223', 'PA', 'Pennsylvania');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('52', '223', 'PR', 'Puerto Rico');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('53', '223', 'RI', 'Rhode Island');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('54', '223', 'SC', 'South Carolina');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('55', '223', 'SD', 'South Dakota');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('56', '223', 'TN', 'Tennessee');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('57', '223', 'TX', 'Texas');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('58', '223', 'UT', 'Utah');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('59', '223', 'VT', 'Vermont');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('60', '223', 'VI', 'Virgin Islands');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('61', '223', 'VA', 'Virginia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('62', '223', 'WA', 'Washington');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('63', '223', 'WV', 'West Virginia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('64', '223', 'WI', 'Wisconsin');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('65', '223', 'WY', 'Wyoming');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('66', '38', 'AB', 'Alberta');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('67', '38', 'BC', 'British Columbia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('68', '38', 'MB', 'Manitoba');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('69', '38', 'NF', 'Newfoundland');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('70', '38', 'NB', 'New Brunswick');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('71', '38', 'NS', 'Nova Scotia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('72', '38', 'NT', 'Northwest Territories');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('73', '38', 'NU', 'Nunavut');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('74', '38', 'ON', 'Ontario');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('75', '38', 'PE', 'Prince Edward Island');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('76', '38', 'QC', 'Quebec');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('77', '38', 'SK', 'Saskatchewan');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('78', '38', 'YT', 'Yukon Territory');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('79', '81', 'NDS', 'Niedersachsen');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('80', '81', 'BAW', 'Baden-Württemberg');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('81', '81', 'BAY', 'Bayern');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('82', '81', 'BER', 'Berlin');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('83', '81', 'BRG', 'Brandenburg');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('84', '81', 'BRE', 'Bremen');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('85', '81', 'HAM', 'Hamburg');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('86', '81', 'HES', 'Hessen');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('87', '81', 'MEC', 'Mecklenburg-Vorpommern');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('88', '81', 'NRW', 'Nordrhein-Westfalen');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('89', '81', 'RHE', 'Rheinland-Pfalz');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('90', '81', 'SAR', 'Saarland');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('91', '81', 'SAS', 'Sachsen');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('92', '81', 'SAC', 'Sachsen-Anhalt');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('93', '81', 'SCN', 'Schleswig-Holstein');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('94', '81', 'THE', 'Thüringen');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('95', '14', 'WI', 'Wien');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('96', '14', 'NO', 'Niederösterreich');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('97', '14', 'OO', 'Oberösterreich');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('98', '14', 'SB', 'Salzburg');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('99', '14', 'KN', 'Kärnten');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('100', '14', 'ST', 'Steiermark');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('101', '14', 'TI', 'Tirol');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('102', '14', 'BL', 'Burgenland');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('103', '14', 'VB', 'Voralberg');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('104', '204', 'AG', 'Aargau');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('105', '204', 'AI', 'Appenzell Innerrhoden');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('106', '204', 'AR', 'Appenzell Ausserrhoden');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('107', '204', 'BE', 'Bern');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('108', '204', 'BL', 'Basel-Landschaft');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('109', '204', 'BS', 'Basel-Stadt');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('110', '204', 'FR', 'Freiburg');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('111', '204', 'GE', 'Genf');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('112', '204', 'GL', 'Glarus');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('113', '204', 'JU', 'Graubünden');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('114', '204', 'JU', 'Jura');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('115', '204', 'LU', 'Luzern');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('116', '204', 'NE', 'Neuenburg');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('117', '204', 'NW', 'Nidwalden');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('118', '204', 'OW', 'Obwalden');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('119', '204', 'SG', 'St. Gallen');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('120', '204', 'SH', 'Schaffhausen');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('121', '204', 'SO', 'Solothurn');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('122', '204', 'SZ', 'Schwyz');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('123', '204', 'TG', 'Thurgau');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('124', '204', 'TI', 'Tessin');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('125', '204', 'UR', 'Uri');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('126', '204', 'VD', 'Waadt');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('127', '204', 'VS', 'Wallis');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('128', '204', 'ZG', 'Zug');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('129', '204', 'ZH', 'Zürich');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('130', '195', 'A Coruña', 'A Coruña');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('131', '195', 'Alava', 'Alava');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('132', '195', 'Albacete', 'Albacete');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('133', '195', 'Alicante', 'Alicante');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('134', '195', 'Almeria', 'Almeria');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('135', '195', 'Asturias', 'Asturias');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('136', '195', 'Avila', 'Avila');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('137', '195', 'Badajoz', 'Badajoz');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('138', '195', 'Baleares', 'Baleares');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('139', '195', 'Barcelona', 'Barcelona');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('140', '195', 'Burgos', 'Burgos');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('141', '195', 'Caceres', 'Caceres');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('142', '195', 'Cadiz', 'Cadiz');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('143', '195', 'Cantabria', 'Cantabria');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('144', '195', 'Castellon', 'Castellon');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('145', '195', 'Ceuta', 'Ceuta');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('146', '195', 'Ciudad Real', 'Ciudad Real');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('147', '195', 'Cordoba', 'Cordoba');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('148', '195', 'Cuenca', 'Cuenca');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('149', '195', 'Girona', 'Girona');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('150', '195', 'Granada', 'Granada');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('151', '195', 'Guadalajara', 'Guadalajara');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('152', '195', 'Guipuzcoa', 'Guipuzcoa');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('153', '195', 'Huelva', 'Huelva');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('154', '195', 'Huesca', 'Huesca');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('155', '195', 'Jaen', 'Jaen');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('156', '195', 'La Rioja', 'La Rioja');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('157', '195', 'Las Palmas', 'Las Palmas');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('158', '195', 'Leon', 'Leon');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('159', '195', 'Lleida', 'Lleida');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('160', '195', 'Lugo', 'Lugo');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('161', '195', 'Madrid', 'Madrid');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('162', '195', 'Malaga', 'Malaga');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('163', '195', 'Melilla', 'Melilla');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('164', '195', 'Murcia', 'Murcia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('165', '195', 'Navarra', 'Navarra');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('166', '195', 'Ourense', 'Ourense');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('167', '195', 'Palencia', 'Palencia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('168', '195', 'Pontevedra', 'Pontevedra');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('169', '195', 'Salamanca', 'Salamanca');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('170', '195', 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('171', '195', 'Segovia', 'Segovia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('172', '195', 'Sevilla', 'Sevilla');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('173', '195', 'Soria', 'Soria');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('174', '195', 'Tarragona', 'Tarragona');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('175', '195', 'Teruel', 'Teruel');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('176', '195', 'Toledo', 'Toledo');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('177', '195', 'Valencia', 'Valencia');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('178', '195', 'Valladolid', 'Valladolid');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('179', '195', 'Vizcaya', 'Vizcaya');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('180', '195', 'Zamora', 'Zamora');
insert into zones (zone_id, zone_country_id, zone_code, zone_name) values ('181', '195', 'Zaragoza', 'Zaragoza');

drop table if exists zones_to_geo_zones;
create table zones_to_geo_zones (
  association_id int(11) not null auto_increment,
  zone_country_id int(11) not null ,
  zone_id int(11) ,
  geo_zone_id int(11) ,
  last_modified datetime ,
  date_added datetime not null ,
  PRIMARY KEY (association_id),
  KEY idx_zones_to_geo_zones_country_id (zone_country_id)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

insert into zones_to_geo_zones (association_id, zone_country_id, zone_id, geo_zone_id, last_modified, date_added) values ('1', '81', '0', '1', NULL, '2015-02-23 09:52:45');
