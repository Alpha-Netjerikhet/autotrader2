<?php

namespace CarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DefaultController extends Controller {
	/**
	 * @Route("/our-cars", name="offer")
	 */
	public function indexAction(Request $request) {
		// $cars = [
		// 	['Make' => 'BMW', 'Name' => 'X1'],
		// 	['Make' => 'Fiat', 'Name' => 'Croma'],
		// 	['Make' => 'Audi', 'Name' => 'Q7'],
		// ];
		$carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
		$cars = $carRepository->findCarsWithDetails(); // custom method instead of findAll()
		$form = $this->createFormBuilder()
			->setMethod('GET')
			->add('search', TextType::class, ['constraints' => [new NotBlank(), new Length(['min' => 2])]]) // name and type of the field
			->getForm(); // to get the form from the builder

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			die('Form submitted');
		}

		return $this->render('CarBundle:Default:index.html.twig',
			[
				'cars' => $cars,
				'form' => $form->createView(),
			]
		);
	}

	/**
	 * @param $id
	 * @Route("/car/{id}", name="show_car")
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function showAction($id) {
		$carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
		$car = $carRepository->findCarsWithDetailsById($id);
		return $this->render('CarBundle:Default:show.html.twig', ['car' => $car]);
	}
}
