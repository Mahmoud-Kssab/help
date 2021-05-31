<?php


// helper function to generate tree
function generateCategories($categories)
{
    foreach ($categories as $category) {

        if($category->sub == 0)
        {

            echo '<li class="nav-item">';
                    echo '<a href="pages/widgets.html" class="nav-link">';
                        echo '<i class="nav-icon fas fa-th"></i>';
                        echo '<p>';
                        echo $category->name;
                            echo '<span class="right badge badge-danger">New</span>';
                        echo '</p>';
                    echo '</a>';
                echo '</li>';



        }else
        {
            echo' <li class="nav-item">';

                echo'<a href="pages/widgets.html" class="nav-link">';
                    echo'<i class="nav-icon fas fa-circle"></i>';
                    echo '<p>' . $category->name . '<i class="right fas fa-angle-left"></i></p>';
                echo'</a>';


                echo '<ul class="nav nav-treeview" style="display: none;">';

                    generateCategories($category->children);

                echo '</ul>';



            echo '</li>';

        }


            echo '</li>';

    }
}

// function child($cats)
// {
//     foreach($cats as $cat)
//     {

//         if($cat->sub == 0)
//         {


//             echo '<ul class="nav nav-treeview" style="display: none;">';

//             echo '<li class="nav-item">';
//                     echo '<a href="pages/widgets.html" class="nav-link">';
//                         echo '<i class="nav-icon fas fa-th"></i>';
//                         echo '<p>';
//                         echo $cat->name;
//                             echo '<span class="right badge badge-danger">New</span>';
//                         echo '</p>';
//                     echo '</a>';
//                 echo '</li>';

//             echo '</ul>';


//         }else
//         {
//             return 'aaaaaaaaaaa';


//                 echo '<ul class="nav nav-treeview" style="display: none;">';
//                     echo '<li class="nav-item">';
//                         echo '<a href="pages/widgets.html" class="nav-link">';
//                             echo '<i class="far fa-dot-circle nav-icon"></i>';
//                             echo '<p>  ' . $cat->name . ' <a href="pages/widgets.html" class="btn btn-primary"> '. $cat->name . '</a> <i class="right fas fa-angle-left"></i></p>';
//                             foreach($cat->children as $c)
//                             {
//                                 echo '<ul class="nav nav-treeview" style="display: none;">';
//                                     echo '<li class="nav-item">';
//                                         echo '<a href="#" class="nav-link">';
//                                             echo '<i class="far fa-dot-circle nav-icon"></i>';

//                                              generateCategories($cat->children);


//                                             // child($cats);



//                                         echo '</a>';
//                                     echo '</li>';
//                                 echo '</ul>';
//                             }

//                         echo '</a>';
//                     echo '</li>';
//                 echo '</ul>';
//         }

//     }
// }

function parents($cat, $arr)
{

    $parent = App\Models\Category::where('id', $cat)->first();

    if($parent->parent_id != 0)
    {
        array_push ( $arr , $parent );
        return parents( $parent->parent_id ,$arr );

    }else
    {
        array_push ( $arr , $parent );
        return $arr;
    }

}



// function products($cat_id, $arr)
// {
//     // $arr = array();

//     $c = App\Models\Category::where('id', $cat_id)->first();


//     if( $c->sub == 0)
//     {
//         $posts = App\Models\Post::where('category_id', $c->id)->get();

//         if(!in_array($posts, $arr))
//         {
//             return $posts;
//         }


//     }else
//     {

//         $categories = App\Models\Category::where('parent_id', $cat_id)->get();
//         foreach($categories as $category)
//         {
//                 array_push( $arr , products($category->id, $arr ));
//         }




//     }

//     return $arr;
// }



function products($cat_id)
{
    $arr = array();

    $c = App\Models\Category::where('id', $cat_id)->first();


    if( $c->sub == 0)
    {
        $posts = App\Models\Post::where('category_id', $c->id)->get();

        if(!in_array($posts, $arr))
        {
            return $posts;
        }


    }else
    {

        $categories = App\Models\Category::where('parent_id', $cat_id)->get();
        foreach($categories as $category)
        {
                array_push( $arr , products($category->id ));
        }




    }

    return $arr;
}


?>
