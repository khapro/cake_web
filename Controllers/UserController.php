<?php
    namespace App\Controllers;
        use App\Core\Controller;
        use App\Core\Request;

        class UserController extends Controller
        {
           public function user(Request $request)
           {
               return $this->render('UserPage', ['name' => 'kha pro']);
           }
        }