<?php
/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

/* Security */
if (!defined('_PS_VERSION_'))
	exit;

class ShipwireInventoryUpdate extends ShipwireApi
{
	protected $_apiType = 'inventoryUpdate';

	public function __construct($apiUser, $apiPasswd)
	{
		$this->_xml['header'][] =
			'<InventoryUpdate>'.
			'<EmailAddress>'.$apiUser.'</EmailAddress>'.
			'<Password>'.$apiPasswd.'</Password>'.
			'<Server>'.$this->_configVars['SHIPWIRE_API_MODE'].'</Server>'.
			'<AffiliateId>7403</AffiliateId>'.
			'<Warehouse></Warehouse>
			<ProductCode></ProductCode>
			<IncludeEmpty/>';

		$this->_xml['body'][] = '';
		$this->_xml['footer'][] = '</InventoryUpdate>';
	}

	public function getInventory($field = NULL)
	{
		$result = $this->sendData();

		if (!empty($field) && isset($result[$field]))
			$result = $result[$field];

		return $result;
	}
}
