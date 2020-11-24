<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class HomeController extends Controller
{

   public function index()
   {
      isLoggedIn();
      $data = [
         'titulo' => 'Inicio',
      ];
      return $this->view('home/index', $data);
   }

}