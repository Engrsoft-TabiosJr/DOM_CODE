$(document).ready(function(){
    $('#ngform').submit(function(e){
        e.preventDefault();

        $.ajax({
            url:'sendngs.php',
            data: $(this).serialize(),
            type:'POST',
            success:function(resp){
                $('#error_msg').html(resp);
            }
         }
        )
    })
});
let signal = 0;
function submitng(){
	signal = 1;	
	const selectElement = document.getElementById('time_value');
	const selectedValue = selectElement.value;
	const selectedText = selectElement.options[selectElement.selectedIndex].text;

	console.log("Selected Value:", selectedValue);
	console.log("Selected Text:", selectedText);
	const ngqty =document.getElementById('ng_qty').value;
	const ngtype_1= document.getElementById('ngtype_1').value;
	const ngtype_2= document.getElementById('ngtype_2').value;
	const ngtype_3= document.getElementById('ngtype_3').value;
		
//		console.log(time_txt);
		console.log(ngqty)
                console.log(ngtype_1);
                console.log(ngtype_2);
		console.log(ngtype_3);
   		 const dataToSend = {
       			 time: selectedText,
       			 time_val: selectedValue,
       			 ngqtys: ngqty,
      			 ngtype1:ngtype_1,
			 ngtype2:ngtype_2,
			 ngtype3:ngtype_3
   			 };
		const signalValue ={
			submit_sig:signal

			}

		const ngtimevalue = {
			time_val:selectedValue
			
			}

    // Convert data to URL-encoded string
		    var urlEncodedData = Object.keys(dataToSend)
       			 .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(dataToSend[key]))
        		 .join('&');

   			 var xhr = new XMLHttpRequest();
   			 xhr.open("POST", "sendNgdetails.php", true);
   			 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  		         xhr.onreadystatechange = function() {
       			 if (xhr.readyState === XMLHttpRequest.DONE) {
           		   if (xhr.status === 200) {
               			 // alert("Data submitted successfully: " + xhr.responseText);
               			 console.log("data  is recorded");
           		 } else {
               			 alert("Error: " + xhr.status);
           		 }
       		 }
   	 };
   	 xhr.send(urlEncodedData);

                    var urlEncodedData1 = Object.keys(signalValue)
                         .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(signalValue[key]))
                         .join('&');

                         var xhr1 = new XMLHttpRequest();
                         xhr1.open("POST", "signal.php", true);
                         xhr1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                         xhr1.onreadystatechange = function() {
                         if (xhr1.readyState === XMLHttpRequest.DONE) {
                           if (xhr1.status === 200) {
                                 // alert("Data submitted successfully: " + xhr.responseText);
                                 console.log("data  is recorded");
                         } else {
                                 alert("Error: " + xhr1.status);
                         }
                 }
         };

        xhr1.send(urlEncodedData1);

	

                    var urlEncodedData2 = Object.keys(ngtimevalue)
                         .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(ngtimevalue[key]))
                         .join('&');

                         var xhr2 = new XMLHttpRequest();
                         xhr2.open("POST", "timeVal.php", true);
                         xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                         xhr2.onreadystatechange = function() {
                         if (xhr1.readyState === XMLHttpRequest.DONE) {
                           if (xhr1.status === 200) {
                                 // alert("Data submitted successfully: " + xhr.responseText);
                                 console.log("ng time val:"+selectedValue);
                         } else {
                                 alert("Error: " + xhr2.status);
                         }
                 }
         };
         xhr2.send(urlEncodedData2);

	console.log("ng button is click");
	alert("NG successfully submitted");
	document.getElementById('id_ng_container').style.display = "none";	
   }
