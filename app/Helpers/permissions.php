<?php

    function check_user_permissions($request, $actionName = NULL, $id=NULL)
    {
        //get current user
        $currentUser = $request->user();

        //get current action name
                    //dd($request->route()->getActionName());
        if ($actionName)
        {
            $currentActionName = $actionName;
        }
        else
        {
            $currentActionName = $request->route()->getActionName();
        }
        list($controller, $method) = explode('@', $currentActionName);
        $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);
        //dd("C: $controller M: $method");
        $crudPermissionsMap = [
//          'create' => ['create', 'store'],
//          'update' => ['edit', 'update'],
//          'delete' => ['destroy', 'restore', 'forceDestroy'],
//          'read'   => ['index', 'view']
            'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
        ];

        $classesMap = [
            'Blog' => 'post',
            'Categories'=> 'category',
            'Users' => 'user'
        ];

        foreach ($crudPermissionsMap as $permission => $methods)
        {
            // if the current method existsin methods list,
            // we'll check the permission
            if ((in_array($method, $methods)) && isset($classesMap[$controller]))
            {
                $className = $classesMap[$controller];
                //dd("{$permission}-{$controller}");
                if($className =='post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy']))
                {
                    $id = !is_null($id) ? $id : $request->route('blog');

                    //dd("current user try to edit/delete a post");
                    // if the current user has not update-others-post/delete-others-post permission
                    // make sure he/she only modify his/her own post
                    if ($id && (!$currentUser->isAbleTo('update-others-post')) || !$currentUser->isAbleTo("delete-others-post"))
                    {
                        $post = \App\Models\Post::withTrashed()->find($id);
                        if ($post->author_id !=$currentUser->id)
                        {
                            //abort(403, "Forbidden access!");
                            return false;
                        }
                    }
                }

                // if the user has not permission don't allow next request
                elseif ((!$currentUser->isAbleTo("{$permission}-{$className}")))
                {
                    //abort(403, "Forbidden access!");
                    return false;
                }
                break;
            }

        }
        //return $next($request);
        return true;
    }
