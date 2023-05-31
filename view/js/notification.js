var xhr =new XMLHttpRequest(),xhr1 =new XMLHttpRequest();
var response;
var auction;
var popup=document.getElementById('popup');
function checkNotification()
{
    xhr.open('GET','../controller/notifyAuction.php',true);
    xhr.onload=function()
    {
        response=this.responseText.trim();
        if(response!='')
        {
            auction=JSON.parse(response);
            document.getElementById('info').innerHTML='Auction With the ID of '+auction["id"]+' starts in less than 5 minutes!';
            document.getElementById('link').innerHTML+='<a href="../controller/viewAuction.php?selectedAuction='+auction["id"]+'" class="a-pop" >Go to Auction Now</a>';
            popup.style.opacity=1;
            setTimeout(() => {
                popup.style.opacity=0;
                
            }, 5000);   
            setTimeout(() => {
                popup.innerHTML='';
                
            }, 7000); 
            
        }
        
        
    }
    xhr.send();
}
setInterval(checkNotification, 5000);