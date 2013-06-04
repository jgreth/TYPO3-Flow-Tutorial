<?php
namespace JPG\Usertest\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW package "JPG.Usertest".               *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW\Annotations as FLOW;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Coffee bean
 *
 * @FLOW\Entity
 */
class CoffeeBean {

	/**
	 * The name
	 * @var string
	 */	protected $name;


	/**
	 * Get the Coffee bean's name
	 *
	 * @return string The Coffee bean's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Coffee bean's name
	 *
	 * @param string $name The Coffee bean's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

}
?>