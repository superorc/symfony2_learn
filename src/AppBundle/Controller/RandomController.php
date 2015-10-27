<?
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class RandomController extends Controller
{

  /**
  * @Route("/random/number/{count}")
  */
  public function numberAction($count)
  {
    $numbers = array();

    for ($i=0; $i < $count; $i++) {
      $numbers[] = rand(1, 999999);
    }

    $numberList = implode(', ', $numbers);

    $html = $this->container->get('templating')->render(
      'random/number.html.twig',
      array ('RandomNumList' => $numberList)
    );

    return new Response($html);
  }

  /**
  * @Route("/api/random/number")
  */
  public function apiNumberAction()
  {
    $data = array('random_num' => rand(10000, 999999) );
    return new JsonResponse($data);
  }
}
