<?php
/*
  $Id: extra_info_pages.php,v 4.50 2003/06/09 22:07:52 hpdl Exp $

  contribution is : Extra pages-info box w- admin
  http://www.oscommerce.com/community/contributions,2021
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  class bm_extrainfopage {
    var $code = 'bm_extrainfopage';
    var $group = 'boxes';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function bm_extrainfopage() {
      $this->title = MODULE_BOXES_EXTRAINFOPAGE_TITLE;
      $this->description = MODULE_BOXES_EXTRAINFOPAGE_DESCRIPTION;

      if ( defined('MODULE_BOXES_EXTRAINFOPAGE_STATUS') ) {
        $this->sort_order = MODULE_BOXES_EXTRAINFOPAGE_SORT_ORDER;
        $this->enabled = (MODULE_BOXES_EXTRAINFOPAGE_STATUS == 'True');

        $this->group = ((MODULE_BOXES_EXTRAINFOPAGE_CONTENT_PLACEMENT == 'Left Column') ? 'boxes_column_left' : 'boxes_column_right');
      }
    }

    function execute() {
      global $oscTemplate, $languages_id;

	  $page_query = tep_db_query("select p.pages_id, p.sort_order, p.status, s.pages_title, s.pages_html_text, s.intorext, s.externallink, s.link_target from " . TABLE_PAGES . " p LEFT JOIN " .TABLE_PAGES_DESCRIPTION . " s on p.pages_id = s.pages_id where p.status = 1 and p.page_type != 1 and s.language_id = '" . (int)$languages_id . "' order by p.sort_order, s.pages_title");

		$rows = 0;
		$data = '<div class="ui-widget infoBoxContainer">' .
              '  <div class="ui-widget-header infoBoxHeading">' . MODULE_BOXES_EXTRAINFOPAGE_BOX_TITLE . '</div>' .
              '  <div class="ui-widget-content infoBoxContents"><table border="0" width="100%" cellspacing="0" cellpadding="1">';
		
		while ($page = tep_db_fetch_array($page_query)) {
			$rows++;
			$target="";
			if($page['link_target']== 1)  {
				$target="_blank";
			}

			if($page['pages_title'] != 'Contact Us'){
				$link = FILENAME_PAGES . '?pages_id=' . $page['pages_id'];
			}else{
				$link = FILENAME_CONTACT_US;
			}

			if($page['intorext'] == 1)  {
				$data .= '<tr><td class="bg_list2"><a target="'.$target.'" href="' . $page['externallink'] . '">' . $page['pages_title'] . '</a></td></tr>';
			}else {
				$data .= '<tr><td class="bg_list2"><a target="'.$target.'" href="' . tep_href_link(FILENAME_PAGES, 'pages_id=' .$page['pages_id'], 'NONSSL') . '">' . $page['pages_title'] . '</a></td></tr>';
			}
		}
		
		$data .= '</table></div>' .
              '</div>';

      $oscTemplate->addBlock($data, $this->group);
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_BOXES_EXTRAINFOPAGE_STATUS');
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Extra Info Page Module', 'MODULE_BOXES_EXTRAINFOPAGE_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Content Placement', 'MODULE_BOXES_EXTRAINFOPAGE_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', '6', '1', 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_BOXES_EXTRAINFOPAGE_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_BOXES_EXTRAINFOPAGE_STATUS', 'MODULE_BOXES_EXTRAINFOPAGE_CONTENT_PLACEMENT', 'MODULE_BOXES_EXTRAINFOPAGE_SORT_ORDER');
    }
  }
?>