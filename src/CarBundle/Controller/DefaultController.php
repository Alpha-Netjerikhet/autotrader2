<?php

namespace CarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
	/**
	 * @Route("/our-cars", name="offer")
	 */
	public function indexAction() {
		// $cars = [
		// 	['Make' => 'BMW', 'Name' => 'X1'],
		// 	['Make' => 'Fiat', 'Name' => 'Croma'],
		// 	['Make' => 'Audi', 'Name' => 'Q7'],
		// ];
		$carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
		$cars = $carRepository->findAll();
		return $this->render('CarBundle:Default:index.html.twig', ['cars' => $cars]);
	}

	/**
	 * @param $id
	 * @Route("/car/{id}", name="show_car")
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function showAction($id) {
		$carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
		$car = $carRepository->find($id);
		return $this->render('CarBundle:Default:show.html.twig', ['car' => $car]);
	}
}
