let replymetaToken = document.querySelector('#meta-token').content;
let replytweetContainer = document.querySelector('.tweet-container');
let moreReplyBtn = document.getElementById('show-more-replies');
/* let moreReplyBtnSibling =document.getElementById('show-more-replies').nextElementSibling.value
let moreRepliesMainContainer=document.getElementById("show-more-replies-main-container") */

let replyBtn = document.querySelectorAll('.reply-btn');
/* document.getElementById('replypostid16').value */
let replyOffset = 0
console.log(replyBtn)
if (moreReplyBtn) {
    moreReplyBtn.addEventListener('click',moreReplies)  
}

function moreReplies() {
    let moreReplyBtnSibling =document.getElementById('show-more-replies').nextElementSibling.value
    let moreRepliesMainContainer=document.getElementById("show-more-replies-main-container")
    let token = replymetaToken;
    replyOffset+=1;
    var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object
    xhr.onload = function() { // When response has loaded
    if(xhr.status === 200) { // If server status was ok
    console.log(JSON.parse(xhr.responseText));
    replies = JSON.parse(xhr.responseText);
    if (replies.more ==0) {
        moreRepliesMainContainer.style.display="none"
    }
    for (let index = 0; index < replies.replies.length; index++) {
        //const element = array[index];
        console.log("inner");
        
    let m  = document.querySelector(".main-reply-container");
    let container = document.createElement("div");
    container.setAttribute("class","each-reply-container");
    m.appendChild(container);
    let replyHeader = document.createElement("div");
        replyHeader.setAttribute("class","tweet-header each-tweet-itm");
        let replyContentContainer = document.createElement("div");
        replyContentContainer.setAttribute("class","each-reply-content");
        container.appendChild(replyHeader);
    container.appendChild(replyContentContainer);
    let profilepic = document.createElement("div");
        profilepic.setAttribute("class","profile-pic");
        let img = document.createElement("img");
        img.setAttribute("src","http://localhost:8000/storage/tweetmedia/fjNWdivsubv0EWx1ONYe0RUiM5gf1KJIg74z2QI6.jpg");
        img.setAttribute("width","25px");
        img.setAttribute("height","25px");
        profilepic.appendChild(img)
        replyHeader.appendChild(profilepic);
        let profiledetailContainer = document.createElement("div");
        profiledetailContainer.setAttribute("class","profile-detail-container");
        replyHeader.appendChild(profiledetailContainer);
        let profiledetail = document.createElement("div");
        profiledetail.setAttribute("class","profile-detail");
        profiledetailContainer.appendChild(profiledetail);
        let profiledetailusername = document.createElement("h2");
        profiledetailusername.setAttribute("class","profile-detail-username");
        profiledetailusername.textContent= replies.replies[index][1]
        profiledetail.appendChild(profiledetailusername)
        let createdAt = document.createElement("p");
        createdAt.setAttribute("class","created_at");
        createdAt.textContent= replies.replies[index][4]
        profiledetail.appendChild(createdAt)
        
        let profiledetailemail = document.createElement("p");
        profiledetailemail.textContent= replies.replies[index][2]
        profiledetailContainer.appendChild(profiledetailemail);

        
        
        let para = document.createElement("p");
        para.textContent = replies.replies[index][3];
        replyContentContainer.appendChild(para);
        
    }//for
    
    }
    } ;
    
    xhr.open('POST', '/morereply',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send(`post_id=${moreReplyBtnSibling}&_token=${token}&offset=${replyOffset}`);
}


for (let index = 0; index < replyBtn.length; index++) {
    const element = replyBtn[index].addEventListener('click',getcontainer);
    console.log(replyBtn[index].parentElement.firstElementChild.value)
    
    
}


 function testing(e) {
    e.preventDefault();
     console.log(e.target.parentNode.parentNode.parentNode.previousElementSibling);
     //e.target.parentNode.parentNode.parentNode.insertAdjacentHTML('afterend',"<input type='text'><button>send reply<button>")
    let = document.createElement('input');
    e.target.parentNode.parentNode.parentNode.previousElementSibling.firstElementChild.setAttribute('style','display:block')
    console.log(e.target.parentElement.firstElementChild.value)
    let token = e.target.parentElement.firstElementChild.value
    let el = e.target.parentElement.firstElementChild.nextElementSibling;
    let userid = e.target.parentElement.firstElementChild.nextElementSibling.value;
    let postid = el.nextElementSibling.value;
    console.log(postid)
    //http(token,userid,postid,reply)
 }

 

 function getcontainer(e) {
    e.preventDefault();
    let reply = document.createElement("div");
    let para = document.createElement("p");
    let container = document.createElement("div");
    //para.textContent = reply
    container
    //<div class="each-reply-container"></div>
    {/* <div>
                        <h2> {{$replyowner->name}} </h2>
                        <p> {{$replyowner->email}} </p>
                        
                    </div>
                    <!--  -->
                    <p> {{$reply->created_at}} </p> */}
                    
    container.setAttribute("class","each-reply-container");
    //con.setAttribute("class","modal-content");
    //let child = document.getElementById("postid-16-reply-btn-parent").cloneNode(true);
    //let c = child;
    //let n = document.getElementsByClassName("tweet-container");
    let m  = document.getElementsByTagName("body");
    //reply.appendChild(child);
    //reply.appendChild(con);
    //m[0].appendChild(reply);
    m[0].appendChild(container);
 }
 