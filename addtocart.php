

<?php 

include 'dbcon.php';

session_start();
// session_destroy();


$productname= $_POST['pname'];
$productprice=  $_POST['pprice'];
$productquantity =$_POST['pquantity'];

if(isset($_POST['addcart'])){


    // $checkproduct = array_column($_SESSION['cart'],'productname');
    // if(in_array($productname, $checkproduct)){


    // }

    // else{

$_SESSION['cart'] [] = array('productname' => $productname,  'productprice' => $productprice , 'productquantity' => $productquantity);


header("location:viewcart.php");

// }
}

//   Remove ITEM 



    if(isset($_POST['update'])){ 
   
        foreach($_SESSION['cart'] as $key => $value){
        
            if($value['productname']=== $_POST['item']){
                $_SESSION['cart'][$key] = array('productname' => $productname,
                  'productprice' => $productprice ,
                   'productquantity' => $productquantity); 
                header("location:viewcart.php");
            }       
        
            }
    }
    
    
    if(isset($_POST['remove'])){ 
       
        foreach($_SESSION['cart'] as $key => $value){
    
            // print_r($_SESSION['cart']);
            if($value['productname']=== $_POST['item']){
                unset($_SESSION['cart'] [$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header("location:viewcart.php");
    
            }
        }
    }


?>

