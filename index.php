<?php

include 'config.php';
error_reporting(0); //for not showing any error

if (isset($_POST['submit']))
    $name = $_POST['name'];
    $comment = $_POST['comment'];

$sql = "INSERT INTO topic (name, comment)
        VALUES ('$name', '$comment')";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('topic added successsfully.')</script>";
}else{
    echo "<script>alert('topic does not add.')</script>";
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>We Need To Talk</title>
</head>
<body>

    <!--Navbar, joka sisältää vain otsikon-->
    <div class="navbar">
        <div class="navbar__container">
            <h1 class="navbar__heading">Let's Dish...</h1>
        </div>
    </div>
 
    <!--Lisää keskustelu aihe-->
    <div class="wrapper">
       <form action="#" method="POST" class="form">
    <div class="row">
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="What's your name sweety..." required>
        </div>
    </div>
        <div class="input-group textarea">
            <label for="comment">The Tea</label>
            <textarea id="comment" placeholder="Spill the Tea hun..." required></textarea>
        </div>
        <div class="input-group">
            <button name="submit" class="btn">Spill Tea</button>
        </div>
       </form>
    <!--aihe lista, josta pääsee kommentointi sivulle-->
       <div class="comment">
       <div class="prev-comments">
        <?php

            $sql = "SELECT * FROM topic";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result));
            }
        ?>
        <div class="single-items">
            <h4><?php echo $row['name']; ?></h4>
            <p><?php echo $row['comment']; ?></p>
            <a href="comment.html"><button name="reply" class="btn__reply">Reply</button></a>
        </div>

        <?php

        ?>

        </div>
    </div>

    

  
        
 </div> 

   
</body>
</html>