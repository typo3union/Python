<?php

namespace TYPO3\NmTouren\Controller;





/***************************************************************

 *

 *  Copyright notice

 *

 *  (c) 2015 Marco Adomat <m.adomat@netzmagnet.de>, netzmagnet GmbH

 *

 *  All rights reserved

 *

 *  This script is part of the TYPO3 project. The TYPO3 project is

 *  free software; you can redistribute it and/or modify

 *  it under the terms of the GNU General Public License as published by

 *  the Free Software Foundation; either version 3 of the License, or

 *  (at your option) any later version.

 *

 *  The GNU General Public License can be found at

 *  http://www.gnu.org/copyleft/gpl.html.

 *

 *  This script is distributed in the hope that it will be useful,

 *  but WITHOUT ANY WARRANTY; without even the implied warranty of

 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

 *  GNU General Public License for more details.

 *

 *  This copyright notice MUST APPEAR in all copies of the script!

 ***************************************************************/



/**

 * TourController

 */

class TourController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {



	/**

	 * tourRepository

	 *

	 * @var \TYPO3\NmTouren\Domain\Repository\TourRepository

	 * @inject

	 */

	protected $tourRepository = NULL;



	/**

	 * action list

	 *

	 * @return void

	 */

	public function listAction() {


		

		$tours = $this->tourRepository->findAll();

		
		
		$this->view->assign('tour', $tours);

	}



	/**

	 * action show

	 *

	 * @param \TYPO3\NmTouren\Domain\Model\Tour $tour

	 * @return void

	 */

	public function showAction(\TYPO3\NmTouren\Domain\Model\Tour $tour) {

		$this->view->assign('tour', $tour);

	}



	/**

	 * action new

	 *

	 * @param \TYPO3\NmTouren\Domain\Model\Tour $newTour

	 * @ignorevalidation $newTour

	 * @return void

	 */

	public function newAction(\TYPO3\NmTouren\Domain\Model\Tour $newTour = NULL) {

		$this->view->assign('newTour', $newTour);

	}



	/**

	 * action create

	 *

	 * @param \TYPO3\NmTouren\Domain\Model\Tour $newTour

	 * @return void

	 */

	public function createAction(\TYPO3\NmTouren\Domain\Model\Tour $newTour) {

		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);

		$this->tourRepository->add($newTour);

		$this->redirect('list');

	}



	/**

	 * action edit

	 *

	 * @param \TYPO3\NmTouren\Domain\Model\Tour $tour

	 * @ignorevalidation $tour

	 * @return void

	 */

	public function editAction(\TYPO3\NmTouren\Domain\Model\Tour $tour) {

		$this->view->assign('tour', $tour);

	}



	/**

	 * action update

	 *

	 * @param \TYPO3\NmTouren\Domain\Model\Tour $tour

	 * @return void

	 */

	public function updateAction(\TYPO3\NmTouren\Domain\Model\Tour $tour) {

		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);

		$this->tourRepository->update($tour);

		$this->redirect('list');

	}



	/**

	 * action delete

	 *

	 * @param \TYPO3\NmTouren\Domain\Model\Tour $tour

	 * @return void

	 */

	public function deleteAction(\TYPO3\NmTouren\Domain\Model\Tour $tour) {

		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);

		$this->tourRepository->remove($tour);

		$this->redirect('list');

	}



}