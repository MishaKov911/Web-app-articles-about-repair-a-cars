<!-- similar working to product page 
/=> all questions
/cat-id =>questions in that id

filter option of answered unanswered all -->

<?php
    include("templates/conn.php");
    include("templates/function.php");
    $he='';
    $uid=$_SESSION['USER_ID'];
    if ($_SESSION['USER_LOGIN']!='yes' or $_SESSION['USER_ID']=="")
    {
        header("location:logout.php");
    }

    $sql1="SELECT * FROM `all_users` WHERE user_id ='$uid'";
    $res=mysqli_query($conn,$sql1);
    $urow = mysqli_fetch_array($res, MYSQLI_ASSOC);

    if(isset($_GET['cat_id'])){
        $c=$_GET['cat_id'];
        $sql= "SELECT * FROM `questions` WHERE `cat_id`='$c' ORDER BY `posted_timestamp` asc ";
        $res=mysqli_query($conn,$sql); 
        $prods=mysqli_fetch_all($res,MYSQLI_ASSOC);
        $sql1="SELECT `cat_name` from `category` where `cat_id`='$c'";
        $res1=mysqli_query($conn,$sql1);
        $prods1=mysqli_fetch_array($res1,MYSQLI_ASSOC);
        $count=mysqli_num_rows($res1);
        if($count<1){
            header("location:user_categories.php");
        }
        else{
            $he ="in ".$prods1['cat_name']." category";
        }
        // print_r($prods);
    }
    else{
        $sql= "SELECT * FROM `questions`";
        $res=mysqli_query($conn,$sql);
        $prods=mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статті</title>
    <link rel="stylesheet" href="templates/style.css">
    <link rel="icon" href="templates/images/logoAR.png" type="image/png">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

</head>

<body class="body">


    <div class="wrapper">

        <?php
        include("pages/header.php");
        ?>


        <div class="main__">

            <div class="row">
                <section>
                    <h2 class="NameContent" style="text-align:center;">Статті <?php echo $he ;?></h2>
                        <?php foreach($prods as $p){ ?>
                            <article class="card" itemscope itemtype="http://schema.org/Article">
                                
      	            			    <a class="card__link" 
                                      <?php if($p['status']){
                                                echo "href='view-post.php?q_id=$p[q_id]'";
                                              }
                                              else{
                                                echo "<a href='answer.php?q_id=$p[q_id]'";
                                              }
                                          ?>
                                    >

                                        <img src="<?php echo $cat['ImagePath']?>" alt="Опис зображення для SEO" class="card__image" itemprop="image">

                                        <div class="card__content">
                                          <h3 class="card__title">Q: <?php print_r($p['Question']); ?></h3>
                                          <h5 class="card__text">Asked By: <?php echo($p['author'])?></h5>
                        
                                          <!-- if answered view full post else answer now -->
                                          <!-- <a href="#" class="btn brand z-depth-0">View Full Post</a> -->

                                        </div>
                                    </a>
                            </article>
                        <?php } ?>  
                </section>
            </div>
                                      
            <div class="fixed-action-btn">
                <a href="compose.php" class="btn-floating btn-large red" >
                    <i class="large material-icons">mode_edit</i>
                </a>
            </div>
                                      
        </div>

        <footer>

        </footer>
        
    </div>
</body>