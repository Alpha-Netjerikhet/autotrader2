<?php

namespace CarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
	/**
	 * @Route("/our-cars", name="offer")
	 */
	public function indexAction() {
		return $this->render('CarBundle:Default:index.html.twig');
	}
}
