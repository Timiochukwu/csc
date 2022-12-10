// console.log(window.location.hash)
function url(){
	const url = this.value
	console.log(url);
	console.log("love")
	console.log(event.target.data.set.id)
}
// throw.Error(window.location);
window.addEventListener("load",function(e){

	if(window.location.search){

		var local_session = localStorage.getItem("mtk1");

		var method="POST";
    var url= "user"+window.location.search;
		// var url= "backend/getUserRecord.php";
    var data= "user_id";
		// var data= "user_id="+atob(local_session);


		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
		  if(xhr.readyState == 4 && xhr.status  ==200){
			  //console.log(xhr.responseText);
			  var res = JSON.parse(xhr.responseText);
			  if(res.success){
const image1 = res.data.image;
console.log(image1)
          document.getElementById("chatname").innerHTML = ""+res.data.username+"";
					// console.log(res.data.image);
					// document.getElementById("recimage").src = "img/user5.png";
          messageout();
					scroll()

			  }else{
				 console.log("Something went wrong, Kindly contact admin");
			  }

			  //document.getElementById("user_board").innerHTML = xhr.responseText;
		  }
		}

		xhr.open(method,url,true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send(data);

	}

});

function clearText()  {
 document.getElementById('abbeytext').value = "";
}

function scroll()  {
// window. scrollBy(0,1);
// scrolldelay = setTimeout(scroll,10);
}

var abbeysubmit = document.getElementById("abbeysubmit");
var el = document.getElementById("abbeytext");

el.addEventListener("keydown",function(event){
	if (event. key === "Enter") {
	var abbeytext = document.getElementById("abbeytext");
	if(abbeytext.value !=="" ){
	var method= "POST";
	var url = "message"+window.location.search;
	var data = abbeytext.value;

	var json = JSON.stringify(data);
	console.log(json);


	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			console.log(xhr.responseText);
			var res =JSON.parse(xhr.responseText);
			 if(res.success){
				 messageout();
				 clearText();
				 scroll()
			 }else{
			 alert(res.failed);
			 }
		}
	}
	xhr.open(method,url,true);
	xhr.setRequestHeader("Content-type","application/json");
	xhr.send(json);
	}else{
	console.log("Please input a value")
	// alert("All fields are required");
	}
}
})

  abbeysubmit.addEventListener("click",function(e){
		var abbeytext = document.getElementById("abbeytext");
		if(abbeytext.value !=="" ){
		var method= "POST";
		var url = "message"+window.location.search;
		var data = abbeytext.value;

		var json = JSON.stringify(data);
		console.log(json);


		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				console.log(xhr.responseText);
				var res =JSON.parse(xhr.responseText);
				 if(res.success){
					 messageout();
					 clearText();
					 scroll()
				 }else{
				 alert(res.failed);
				 }
			}
		}
		xhr.open(method,url,true);
		xhr.setRequestHeader("Content-type","application/json");
		xhr.send(json);
	}else{
		console.log("Please input a value")
		// alert("All fields are required");
	}
	});

localStorage.get
function messageout(){
  var method = "POST";
  var url =  "getmessage"+window.location.search;

	// console.table(window.location)
	// throw Error
	var urlparams = new URL(window.location.href).searchParams;

	var recipientId = urlparams.get("id");
	// console.log(recipientId)

  var data = localStorage.getItem("lastkey");

	var html = "";


   var xhr = new XMLHttpRequest();
   xhr.onreadystatechange =  function(){
     if(xhr.readyState == 4 && xhr.status == 200){
       // console.log(xhr.responseText);
       var res =JSON.parse(xhr.responseText);
       if(res.success){
				 // throw Error;
         // console.log("i was here");
				 var lefthtml= "";
         var righthtml= "";
       res.data.forEach(function(value, key){
				 const id=value.id
				 if (value.user_id == recipientId) {
				 	html += '<li class="chat-left pl-5" ><div class="chat-avatar"><img src="img/user5.png" id="recimage" alt="Quick Chat Admin"><div class="chat-name">Kyle</div></div><div class="chat-text-wrapper"><div class="chat-text"><p>'+value.message+'</p><div class="chat-hour read">'+value.time_created+'<span>✓</span></div></div></div></li>'
					// var testArray = [html]
					// var testArray = testArray.concat(testArray)
					// localStorage.setItem("message", JSON.stringify(testArray));

				}else{
					html += '<li class="chat-right pr-5"><div class="chat-text-wrapper"><div class="chat-text"><p>'+value.message+'</p><div class="chat-hour read">'+value.time_created+'<span>✓</span></div></div></div><div class="chat-avatar"><img src="img/user24.png" alt="Quick Chat Admin"><div class="chat-name">Amy</div></div></li>'
					// var testArray = [html]
					// var testArray = testArray.concat(testArray)
					// localStorage.setItem("message", JSON.stringify(testArray));

				}
				localStorage.setItem("lastkey",value.id)
			document.getElementById("chat-display").innerHTML = html ;
     });

		   // var data = JSON.parse(localStorage.getItem("message"));
		 		//   data.forEach(function(value, key){
				// 		console.log(value)
		 		//     // console.log(localStorage.getItem());
		 		// 	document.getElementById("chat-display").innerHTML =value ;
		 		// });
       }else{

         alert(res.failed);
       }
     }
   }
 xhr.open(method,url,true);
 xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xhr.send(data);
};
// function top() {
//     document.getElementById( 'top' ).scrollIntoView();
// };
//
// function bottom() {
//     document.getElementById( 'bottom' ).scrollIntoView();
//     window.setTimeout( function () { top(); }, 2000 );
// };
//
// bottom();
