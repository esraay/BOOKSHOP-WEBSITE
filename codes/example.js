function clearForm(){
	document.getElementById('adresspanel').innerHTML="";
   
}

function Pay(){
   
    document.getElementById("title").innerHTML="ENTER YOUR ADRESS";
    document.getElementById("title2").innerHTML="PAYMENT OPTIONS";


    document.getElementById("parent").removeChild(document.getElementById("paybutton"));
    document.getElementById("parent").removeChild(document.getElementById("hidebutton"));

 
 

    var adress=document.createElement("input");

    adress.setAttribute("type","form");
    adress.setAttribute("id","adress");
    adress.setAttribute("placeholder","Enter your adress");


    var panelD=document.getElementById("adresspanel");
            panelD.appendChild(adress);

    var check1=document.createElement("input");
    var check2=document.createElement("input");

            check1.setAttribute("type","checkbox");
            check1.setAttribute("id","creditcard");
    

            //check1.innerText="With Credit Card";
  //  check1.style = style ="padding: 8px; background: #0A0A2A none repeat scroll 0% 50%; color: white; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; font-size: 16px;";

            check2.setAttribute("type","checkbox");
            check2.setAttribute("id","bankcard");
   // check2.style = style ="padding: 8px; background:#0A0A2A none repeat scroll 0% 50%; color: white; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; font-size: 16px;";
            


    var panelDiv=document.getElementById("panel");
            panelDiv.appendChild(check1);
            panelDiv.appendChild(document.createTextNode('Credit '))

    var panelDiv=document.getElementById("panel");
            panelDiv.appendChild(check2);
            panelDiv.appendChild(document.createTextNode('Bank'))

    var btnCreditCard=document.getElementById("creditcard");
    var btnBankCard=document.getElementById("bankcard");
    var btnSubmit=document.getElementById("Submit");


	btnCreditCard.onclick=function(){
      document.getElementById("creditcard").disabled = true;
      document.getElementById("bankcard").disabled = true;

      var card=document.createElement("input");
      card.setAttribute("id","cardno");
      card.setAttribute("placeholder","Enter credit card number");

      var panelCard=document.getElementById("cardNo");
            panelCard.appendChild(card);
      var submit=document.createElement("button");
          submit.setAttribute("type","button");
          submit.setAttribute("id","submit");
          submit.innerText="COMPLETE";
        submit.style = style ="padding: 8px; background: #0A0A2A none repeat scroll 0% 50%; color: white; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; font-size: 16px;";

      var panelCard=document.getElementById("Submit");
            panelCard.appendChild(submit);
	}
    btnBankCard.onclick=function(){
      document.getElementById("creditcard").disabled = true;
      document.getElementById("bankcard").disabled = true;

      var card=document.createElement("input");
      card.setAttribute("id","cardno");
      card.setAttribute("placeholder","Enter bank card number");

      var panelCard=document.getElementById("cardNo");
            panelCard.appendChild(card);
      var submit=document.createElement("button");
          submit.setAttribute("type","button");
          submit.setAttribute("id","submit");
          submit.innerText="COMPLETE";
        submit.style = style ="padding: 8px; background: #0A0A2A none repeat scroll 0% 50%; color: white; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; font-size: 16px;";

      var panelCard=document.getElementById("Submit");
            panelCard.appendChild(submit);
	}
    btnSubmit.onclick=function(){
        var x=document.getElementById("cardno").value;
        var y=document.getElementById("adress").value;
	    try { 
        if(x == ""||y== "")  throw "You should enter your card number and adress";
        if(x < 10000000000)  throw "Card No must have 11 characters ";
        if(x > 99999999999)   throw "Card No must have 11 characters";
        if(10000000000<x<99999999999){ 
        
        localStorage.setItem('adress',y);
        localStorage.setItem('cardno',x);   
        createCookie(y,x);     
        window.location = 'order.php'


       throw "Your order has been received.";

        }
        }
        
        catch(err) {
        alert(err);
        }
    
        }

}

function createCookie(adress,cardno) {
       
        document.cookie = "adress" + '=' + adress ;
        document.cookie = "cardno" + '=' + cardno ;


}
    
