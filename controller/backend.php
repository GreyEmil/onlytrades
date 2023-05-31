<?php
require_once '../model/userModel.php';
require_once '../model/auctionModel.php';
require_once '../model/ticketModel.php';
require_once '../model/tradeModel.php';
require_once '../model/merchModel.php';
require_once '../model/forumModel.php';


if($_POST["request"]=="checkusername")
{
    echo userModel::checkUsername($_POST["username"]);
}
if($_POST["request"]=="checkemail")
{
    echo userModel::checkEmail($_POST["email"]);
}

if($_POST["request"]=='updateadmin')
{
    if(isset($_FILES))
    $_POST["path"]=$_FILES["image"]["tmp_name"];
    echo userModel::modifyUser($_POST);
}
if($_POST["request"]=="getaccounts")
{
    $accounts=userModel::fetchAccounts();
    echo json_encode($accounts);
}

if($_POST["request"]=="takeaction")
{
    if($_POST["action"]=="ban")
    {
        userModel::banUser($_POST["id"]);
    }
    if($_POST["action"]=="unban")
    {
        userModel::unbanUser($_POST["id"]);
    }
    if($_POST["action"]=="remove")
    {
        userModel::removeUser($_POST["id"]);
    }
}
if($_POST["request"]=="gettickets")
{
    echo json_encode(ticketModel::getTickets());
}
if($_POST["request"]=="getticket")
{
    $ticket=ticketModel::getTicket($_POST["id"]);
    echo '
    
    <div class="container">
    <div class="row">
        <div class="col-lg-3">
            <ul>
                <li class="coup">
                    <div class="info-label">TICKET ID</div>
                    <div class="info">#'.$ticket["request"]["id"] .'</div>
                </li>
                <li class="coup">
                    <div class="info-label">CREATED</div>
                    <div class="info">'. $ticket["request"]["creation_date"].'</div>
                </li>
                <li class="coup">
                    <div class="info-label">STATUS</div>
                    ';
                    if($ticket["request"]["status"]=="OPEN") echo'
                    <select id="status"  name="status">
                        <option selected="selected" value="OPEN">OPEN</option>
                        <option value="AWAITING YOUR REPLY">AWAITING YOUR REPLY</option>
                        <option value="SOLVED">SOLVED</option>
                    </select>
                    ';
                    if($ticket["request"]["status"]=="AWAITING YOUR REPLY") echo'
                    <select id="status"  name="status">
                        <option value="OPEN">OPEN</option>
                        <option selected="selected" value="AWAITING YOUR REPLY">AWAITING YOUR REPLY</option>
                        <option value="SOLVED">SOLVED</option>
                    </select>
                    ';
                    if($ticket["request"]["status"]=="SOLVED") echo'
                    <select id="status"  name="status">
                        <option value="OPEN">OPEN</option>
                        <option value="AWAITING YOUR REPLY">AWAITING YOUR REPLY</option>
                        <option selected="selected" value="SOLVED">SOLVED</option>
                    </select>
                    ';
                    echo'
                    
                </li>
            </ul>
        </div>    
        <div class="col-lg-8">
           <div class="container ">
                <div class="ticket-content-be">
                <div class="row ticket-subject">
                    '.$ticket["request"]["subject"].'
                    </div>
                    <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img class="user-image" src="data:image/jpeg;base64,'.$ticket["request"]["user"]["photo"].'" alt="">
                            
                        </div>
                        <div class="col">
                            <div class="ticket-username">'.$ticket["request"]["user"]["username"].'</div>
                            <div class="reply-date">'.DateTime::createFromFormat("Y-m-d H:i:s",$ticket["request"]["creation_date"])->format('M j , Y H:i').'</div>
                        </div>
                    </div>
                    
                    </div>
                    <div class="row ticket-message-be" style="margin-top:20px">
                    '.$ticket["request"]["content"].'
                    </div>
                </div>';
                foreach($ticket["replies"] AS $reply)
                {
                    echo'
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <img class="user-image" src="data:image/jpeg;base64,'.$reply["user"]["photo"].'" alt="">
                                    
                                </div>
                                <div class="col">
                                    <div class="ticket-username">'.$reply["user"]["username"].'</div>
                                    <div class="reply-date">'.DateTime::createFromFormat("Y-m-d H:i:s",$reply["reply_date"])->format('M j , Y H:i').'</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ticket-content-be ticket-message-be" style="margin-top:20px">
                    '.$reply["content"].'
                    </div>

                ';
                }
                echo'
           </div>
           <div class="">
           <form id="reply" action="../controller/reporthandeler.php" method="post">
            <textarea name="replyt" id="replyt" cols="30" rows="8" class="reply"></textarea>
            <input type="text" style="display:none" name="id_ticket" value='.$ticket["request"]["id"].'>
            <button type="submit" id="reply_btn" name="reply_btn" class="reply-btn">Reply</button>
            </form>
           </div>
        </div> 
    </div>
</div>';
}

if($_POST["request"]=="updatestatus")
{
    ticketModel::updateStatus($_POST);
}
if($_POST["request"]=="updateticket")
{
    ticketModel::addReply($_POST);
}
if($_POST["request"]=="modify")
{
    userModel::modifyUser($_POST);
}

if($_POST["request"]=="gettrades")
{
    echo json_encode(tradeModel::getTrades());
}

if($_POST["request"]=="updatetradestatus")
{
    tradeModel::updateTradeStatus($_POST);
}

if($_POST["request"]=="getmyprofile")
{
    echo json_encode(userModel::getAccount($_POST["id"]));
}

if($_POST["request"]=="logout")
{
    unset($_SESSION["user"]);
}

if($_POST["request"]=="getstatistics")
{
    if($_POST["of"]=="trades")
    {
        echo json_encode(tradeModel::getStatistics());
    }

    if($_POST["of"]=="reports")
    {
        echo json_encode(ticketModel::getStatistics());
    }

    if($_POST["of"]=="auctions")
    {
        echo json_encode(auctionModel::getStatistics());
    }
}



if($_POST["request"]=="getauctions")
{
    
    echo json_encode(auctionModel::fetchAllAuctions());
}


if($_POST["request"]=="removeauction")
{
    
    auctionModel::deleteAuction($_POST["idAuction"]);
}


if($_POST["request"]=="getmerch")
{
    
    echo json_encode(merchModel::getMerch());
}


if($_POST["request"]=="getthreads")
{
    
    echo json_encode(forumModel::getAllThreads());
}

if($_POST["request"]=="deletethread")
{
    
    forumModel::deleteThread($_POST["idThread"]);
}



