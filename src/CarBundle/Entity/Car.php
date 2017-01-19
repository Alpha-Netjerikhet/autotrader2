<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\CarRepository")
 */
class Car {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="make", type="string", length=255)
	 */
	private $make;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="text", nullable=true)
	 */
	private $description;

	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 *
	 * @return Car
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set make
	 *
	 * @param string $make
	 *
	 * @return Car
	 */
	public function setMake($make) {
		$this->make = $make;

		return $this;
	}

	/**
	 * Get make
	 *
	 * @return string
	 */
	public function getMake() {
		return $this->make;
	}

	/**
	 * Gets the value of description.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the value of description.
	 *
	 * @param string $description the description
	 *
	 * @return self
	 */
	private function _setDescription($description) {
		$this->description = $description;

		return $this;
	}
}
