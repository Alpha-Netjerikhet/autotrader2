<?php

namespace CarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
	/**
	 * @Route("/our-cars", name="offer")
	 */
	public function indexAction() {
		$cars = [
			['Make' => 'BMW', 'Name' => 'X1'],
			['Make' => 'Fiat', 'Name' => 'Croma'],
			['Make' => 'Audi', 'Name' => 'Q7'],
		];
		return $this->render('CarBundle:Default:index.html.twig', ['cars' => $cars]);
	}
}
