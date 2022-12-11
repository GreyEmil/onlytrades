<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    if(isset($_GET["selectedAuction"]))$_SESSION["temp"]=$_SESSION["auctions"][$_GET["selectedAuction"]];
   
?>



        <section class="breadcrumb-area breadcrumb-bg3">
            
            <div class="container" style="text-align:center">
                <h1>Auction</h1>
                    <div >
                        <h3>Name: </h3>
                        <p><?php echo $_SESSION["temp"]["name"]?></p>
                        <h3>Description: </h3>
                        <p><?php echo $_SESSION["temp"]["description"]?></p>
                        <h3>Item Images: </h3>
                        <div id="images"></div>
                        <h3>Time Left</h3>
                        <div  >
                            <h4 id="timer" class="timer"></h4>
                        </div>
                        
                        <?php 
                        foreach($_SESSION["temp"]["images"] AS $image)
                        {
                            
                            echo"<img src='data:image/jpeg;base64,".$image['bin']."' alt=''>";
                        }
                        ?>

                        

                    </div>
            </div>
        </section>
 
    
    

    
