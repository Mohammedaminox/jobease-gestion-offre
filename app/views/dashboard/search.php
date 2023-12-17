<?php
include("../../configg/connectDatabase.php");
$connection = new Connection();
$conn = $connection->conn;

if(isset($_GET['title'])){
    $title = $_GET['title'];

    if(empty($title)){
        $sql = "SELECT * FROM jobs" ; 
    }

    else{
        $sql = "SELECT * FROM jobs WHERE title LIKE '%$title%'";
    }
}
    $result = mysqli_query($conn , $sql) ; 
    while($row = mysqli_fetch_assoc($result)){?>

        <article class="postcard light green">
                <a class="postcard__img_link" href="#">
                    <img src="../../public/upload/<?php echo $row['image_path']; ?>" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h3 class="postcard__title green"><a href="#"><?php echo $row['title']; ?></a></h3>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i><?php echo $row['date_created']; ?>
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><?php echo $row['description']; ?></div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Maroc</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                        <li class="tag__item play green">
                            <a href="#"><i class="fas fa-play mr-2"></i>APPLY NOW</a>
                        </li>
                    </ul>
                </div>
        </article>

<?php 
} 
?>

