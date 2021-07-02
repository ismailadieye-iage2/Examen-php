<?php
  if(!isset($_GET["id_article"]) || !is_numeric($_GET["id_bien"])) redirect_url("aricle","catalogue");
  require_once(PATH_ROOT."views/include/header.inc.html.php");
  require_once(PATH_ROOT."views/include/menu.inc.html.php");
  if(isset($_GET["id_article"])){
    $id_article=$_GET["id_article"];
    $bien=select_bien_by_id($id_article);
    //dd($article);
  }
?>
<div class="container">
        <div class="row mt-5">
            <h6 class="display-4">Détails de l'article</h6>
        </div>
      <div class="row">
        <div class="col-sm-8 mb-4">
          <div class="card">
            <img
              class="card-img-top"
              src="https://source.unsplash.com/1080x720/?product"
              alt="Annonce 1"
            />
            <div class="card-body">
            <div class="row">
                <div class="col-3">
                  <button class="btn">
                       <span class="badge badge-success"><?=$article['type']?></span>
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn">
                       <span class="badge badge-info"><?=$bien['localite']?></span>
                  </button>
                </div> 
              </div>
              <div class="row">
                <?php
                  $arr_tags=explode("#", $article["tags"]);
                  unset($arr_tags["0"]);
                  foreach($arr_tags as $tag):
                ?>
                <div class="col-2 mr-2">
                  <button class="btn">
                       <span class="badge badge-primary"><?=$tag ?></span>
                </button>
                </div>
                <?php endforeach ?>
              </div>
              <p class="card-text"><?= $article["description"]?></p>
              <hr />
              <span class="float-left btn btn-sm btn-outline-danger disabled"><?= $article["prix"]?> FCFA</span>
              <span class="float-left btn btn-sm disabled">Ref: <?= $article["reference"]?></span>
              <span class="float-left btn btn-sm disabled">Disponible</span>
              <a href="#" class="btn btn-sm btn-primary float-right">Réserver</a
              >
            </div>
          </div>
        </div>
        <!-- -------------------------------------------- -->
        <div class="col">
          <div class="card text-center" style="width: 18rem">
            <img style="width: 8em; height:8em;" class="card-img-top rounded-circle align-self-center" src="https://api.randomuser.me/portraits/men/30.jpg" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title"><?= $article["nom_complet"]?></h5>
              <p class="card-text"><?= $article["email"]?></p>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action bg-primary text-white"><i class="fas fa-mobile-alt mr-2"></i><?= $bien["telephone"]?></a>
                <span class="list-group-item list-group-item-action">
                    <a href="#"><i class="fab fa-facebook-square fa-2x text-primary mr-1"></i></a>
                    <a href="#"><i class="fab fa-whatsapp fa-2x text-success mr-1"></i></a>
                    <a href="#"><i class="fab fa-twitter fa-2x text-primary mr-1"></i></a>
                    <a href="#"><i class="fab fa-instagram fa-2x text-warning mr-1"></i></a>
                    <a href="#"><i class="fab fa-youtube fa-2x text-danger"></i></a>
                </span>
              </div>
          </div>
        </div>
      </div>
    </div>

<?php
  require_once(PATH_ROOT."views/include/footer.inc.html.php");
?>    