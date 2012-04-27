<?php

/**
 * ownCloud - user_ldap
 *
 * @author Dominik Schmidt
 * @copyright 2011 Dominik Schmidt dev@dominik-schmidt.de
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
$params = array('ldap_host', 'ldap_port', 'ldap_dn', 'ldap_password', 'ldap_base', 'ldap_userlist_filter', 'ldap_login_filter', 'ldap_display_name', 'ldap_tls', 'ldap_nocase'. 'ldap_quota_def', 'ldap_quota_attr', 'ldap_email_attr');

if ($_POST) {
	foreach($params as $param){
		if(isset($_POST[$param])){
			OC_Appconfig::setValue('user_ldap', $param, $_POST[$param]);
		}
		elseif('ldap_tls' == $param) {
			// unchecked checkboxes are not included in the post paramters
				OC_Appconfig::setValue('user_ldap', $param, 0);
		}
		elseif('ldap_nocase' == $param) {
			OC_Appconfig::setValue('user_ldap', $param, 0);
		}

	}
}

// fill template
$tmpl = new OC_Template( 'user_ldap', 'settings');
foreach($params as $param){
		$value = OC_Appconfig::getValue('user_ldap', $param,'');
		$tmpl->assign($param, $value);
}

// ldap_port has a default value
$tmpl->assign( 'ldap_port', OC_Appconfig::getValue('user_ldap', 'ldap_port', OC_USER_BACKEND_LDAP_DEFAULT_PORT));

// ldap_display_name has a default value
$tmpl->assign( 'ldap_display_name', OC_Appconfig::getValue('user_ldap', 'ldap_display_name', OC_USER_BACKEND_LDAP_DEFAULT_DISPLAY_NAME));

return $tmpl->fetchPage();
