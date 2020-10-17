<? include_once 'header.php' ?>

<div class="container">

<div class="row">

<?php
$xml=simplexml_load_file("rss.xml") or die("Error: Cannot create object");

// print_r($xml);
foreach($xml->children() as $item) {

    echo '
    <div class="col-lg-4">
    <div class="card m-2" style="width: 20rem;">
    <div class="card-body">
        <h5 class="card-title">'. $item->title .'</h5>
        <small class="card-subtitle mb-2 text-muted">'.$item->pubDate .'</small>
        <p class="card-text">'.$item->description .'</p>
        <a href="'.$item->comments.'" class="card-link">Comments</a>
        <a href="'.$item->link.'" class="card-link">link</a>
    </div>
    </div>
    </div>
    ';

}



?>
</div>
</div>


<? include_once 'footer.php' ?>