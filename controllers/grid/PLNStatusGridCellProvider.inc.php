<?php

/**
 * @file plugins/generic/pln/controllers/grid/PLNStatusGridCellProvider.inc.php
 *
 * Copyright (c) 2014-2019 Simon Fraser University
 * Copyright (c) 2000-2019 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class PLNStatusGridCellProvider
 * @ingroup controllers_grid_PLNStatusGridCellProvider
 *
 * @brief Class for a cell provider to display information about PLN Deposits
 */

import('lib.pkp.classes.controllers.grid.GridCellProvider');
import('lib.pkp.classes.linkAction.request.RedirectAction');

class PLNStatusGridCellProvider extends GridCellProvider {
	/**
	 * Extracts variables for a given column from a data element
	 * so that they may be assigned to template before rendering.
	 * @param $row GridRow
	 * @param $column GridColumn
	 * @return array
	 */
	public function getTemplateVarsFromRowColumn($row, $column) {
		$deposit = $row->getData();

		switch ($column->getId()) {
			case 'id':
				// The action has the label
				return array('label' => $deposit->getId());
			case 'type':
				return array('label' => $deposit->getObjectType());
			case 'objectId':
				return array('label' => $deposit->getObjectId());
			case 'checked':
				return array('label' => $deposit->getStatus());
			case 'local_status':
				return array('label' => $deposit->getLocalStatus());
			case 'processing_status':
				return array('label' => $deposit->getProcessingStatus());
			case 'lockss_status':
				return array('label' => $deposit->getLockssStatus());
			case 'complete':
				return array('label' => $deposit->getComplete());
		}
	}
}
