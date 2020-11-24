<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class MesafinalController extends Controller
{

   public function index()
   {
      isLoggedIn();
      $data = [
         'titulo' => 'Inicio',
      ];
      $this->view('mesafinal/ABMmesas', $data);
   }
}