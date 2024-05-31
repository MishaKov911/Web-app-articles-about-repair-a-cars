<?php
    include("templates/conn.php");
    include("templates/function.php");
    // $uid=$_SESSION['USER_ID'];
    // if ($_SESSION['USER_LOGIN']!='yes' or $_SESSION['USER_ID']=="")
    // {
    //     header("location:logout.php");
    // }

    // $sql1="SELECT * FROM `all_users` WHERE user_id ='$uid'";
    // $res=mysqli_query($conn,$sql1);
    // $urow = mysqli_fetch_array($res, MYSQLI_ASSOC);

    $sql2="SELECT * FROM `category`";
    $res2=mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_all($res2, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="templates/style.css">
    <link rel="icon" href="templates/images/logoAR.png" type="image/png">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
        <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const links = document.querySelectorAll('.card__link');
                    const main = document.querySelector('.main__');
                
                    links.forEach(link => {
                        link.addEventListener('click', (event) => {
                            event.preventDefault();  // Зупиняє стандартну дію посилання
                            main.classList.add('main__animate');
                            setTimeout(() => {
                                window.location.href = link.href;  // Переходить за посиланням після затримки
                            }, 500);  // Затримка у мілісекундах
                        });
                    });
                });
        </script>
        <style>
            .logoLinkAnimation{
                animation: marginChange 1.5s ease forwards;
            }
        </style>
</head>

<body class="body">


    <div class="wrapper">

        <?php
        include("pages/header.php");
        ?>

        <div class="main__">

            <div class="row">
            <h2 class="NameContent">Категорії</h2>
                <?php foreach($row2 as $cat){ ?>
                        <article class="card" itemscope itemtype="http://schema.org/Article">
                             <a href="all-q.php?cat_id=<?php echo $cat['cat_id']?>" class="card__link" itemprop="url">
                                 <img src="<?php echo $cat['ImagePath']?>" alt="Опис зображення для SEO" class="card__image" itemprop="image">
                                 <div class="card__content">
                                     <h2 class="card__title" itemprop="headline"><?php print_r($cat['cat_name']); ?></h2>
                                     <p class="card__text" itemprop="description">Опис: <?php print_r($cat['cat_description']);?></p>
                                 </div>
                             </a>
                        </article>
                <?php } ?>
            </div>
            
        </div>

        <footer>

        </footer>

    </div>
        
</body>