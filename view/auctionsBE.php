
<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
if(isset($_SESSION["auctionTemp"]) && !empty($_SESSION["auctionTemp"])){
for($i=0;$i<count($_SESSION["auctionTemp"]);$i++)
{
    $now=time();
    $dateOnSec=strtotime($_SESSION["auctionTemp"][$i]["startDate"]);
    $timeleftInSec=$dateOnSec-$now;
    if($timeleftInSec>0)
    {
    $days=floor($timeleftInSec/(3600*24));
    $hours=floor(($timeleftInSec%(3600*24))/3600);
    $mins=floor((($timeleftInSec%(3600*24))%3600)/60);
    
    $strdays=strval($days);
    $strhours=strval($hours);if(strlen($strhours)==1) $strhours='0'.$strhours;
    $strmins=strval($mins);if(strlen($strmins)==1) $strmins='0'.$strmins;
    
    

    $timeleft=$strdays.' days '.$strhours.' hours '.$strmins.' mins';
    }
    else {if($timeleftInSec<0 && $timeleftInSec>-1000)
    $timeleft="Auction Is Ongoing!";
    else $timeleft=str_repeat('&nbsp;', 15)."Closed!";}

    

    
    
    echo '
<div class="released-game-carousel">
    <div class="released-game-item-fares">
        <div style=" ">
            <img   src="data:image/jpeg;base64,'.$_SESSION["auctionTemp"][$i]["images"][0]["bin"].'" alt="" class="auction-display-image">
        </div>
        <div style="margin-left:20px; overflow-wrap: break-word; ">
            
            <h4 >Starts In:  <span id="timer'.$i.'">'.$timeleft.'</span></h4>
            <div  style="color:white ;">
                <ul >
                    <li class="info" ><span style="color:rgb(120,200,230);">Name: </span>'.$_SESSION["auctionTemp"][$i]["name"].'</li>
                    <li class="info" ><span style="color:rgb(120,200,230);">Description: </span>'.$_SESSION["auctionTemp"][$i]["description"].'</li>
                    <li class="info" ><span style="color:rgb(120,200,230);">Start Time: </span>'.$_SESSION["auctionTemp"][$i]["startDate"].'</li>
                    
                </ul>
            </div>
            
        </div>
        
    </div>
    <div style="text-align:center;margin-bottom:10px;">
        <a id="details'.$i.'" class="btn btn-style-two" href="auctionViewBE.php?selectedAuction='.$i.'" >Enter Auction</a>
        <a id="delete'.$i.'" class="btn btn-style-two" href="../controller/auctionDeleteBE.php?selectedAuction='.$i.'" >Delete Auction: </a>
    </div>
    
</div>';

}
}else{
    if (isset($_SESSION["auctionTemp"]) && empty($_SESSION["auctionTemp"]))
    echo "1";
    if (!isset($_SESSION["auctionTemp"]))
    echo "2";
}
?>
