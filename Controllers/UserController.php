<?php
    namespace App\Controllers;
        use App\Core\Controller;
        use App\Core\Request;
        use App\Models\UserModel;
    

        class UserController extends Controller
        {
           public function user()
           {
               return $this->render('UserPage');
           }

           public function post_user(Request $request)
           {
                $user_model = new UserModel();
                $user_model->load_data($request->get_body());
                $user_model->save();
           }
        }