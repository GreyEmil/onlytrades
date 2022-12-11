<?php
session_start();
if(!count($_SESSION["competitions"]))
            {
                echo '
                
                    <div class="released-game-item" >
                        <div style=" margin:auto;background-image: url(img/images/released_game_brush.png);height:50px;width:590px;background-size:590px;text-align:center;">
                            <h4 style="color:black;margin-top:20px;margin-left:100px;padding-top:15px; " >Oops! Looks Like there is no Competitions Yet</h4>
                        </div>
                    </div>
                
                ';
            }
            else
            {
            for($i=0;$i<count($_SESSION["competitions"]);$i++)
            {
            //    $now=time();
            //    $dateOnSec=strtotime($_SESSION["competitions"][$i]["startDate"]);
            //    $timeleftInSec=$dateOnSec-$now;
            //    if($timeleftInSec>0)
            //    {
            //    $days=floor($timeleftInSec/(3600*24));
            //    $hours=floor(($timeleftInSec%(3600*24))/3600);
            //    $mins=floor((($timeleftInSec%(3600*24))%3600)/60);
               
            //    $strdays=strval($days);
            //    $strhours=strval($hours);if(strlen($strhours)==1) $strhours='0'.$strhours;
            //    $strmins=strval($mins);if(strlen($strmins)==1) $strmins='0'.$strmins;
               
               

            //    $timeleft=$strdays.' days '.$strhours.' hours '.$strmins.' mins';
            //    }
            //    else {if($timeleftInSec<0 & $timeleftInSec>-1000)
            //    $timeleft="Auction Is Ongoing!";
            //    else $timeleft=str_repeat('&nbsp;', 15)."Closed!";}

               

              
              
                echo '
            <div class="released-game-carousel">
                <div class="released-game-item-fares">
                    <div class="released-game-item-bg"></div>
                    <div class="released-game-content">
                        <div class="released-game-list mb-15" style="color:white">
                            <ul >
                                <li style="color:white;"><span style="color:rgb(120,200,230);">Points To Win :</span>'.$_SESSION["competitions"][$i]["points"].'</li>
         
                                
                            </ul>
                        </div>
                        
                        <a href="competitionView.php?selectedCompetition='.$i.'" class="btn btn-style-two">View Details</a>
                    </div>
                    
                </div>
            </div>';
     
            }
        }
            ?>