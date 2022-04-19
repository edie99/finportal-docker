<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Users;
use App\Repository\UsersRepository;


class UserController extends AbstractController{
    /**
    * @Route(
    *       "/{search}",
    *       methods={"GET"},
    *       requirements={"search"="[\p{L}\p{N}]*"},
    *       options = { "utf8": true }
    * )
    */
   public function getUsers(string $search = "", UsersRepository $usersRepository):Response {

     if($search===""){
       //all users
       $users = $usersRepository->getAll();
     }
     else{
       //search by surname
       $users = $usersRepository->searchBySurname($search);
     }

     return $this->json($users);

   }

}
