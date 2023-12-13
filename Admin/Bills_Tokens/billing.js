


var myDictionary = {};






      var total = 0;
  function increaseQuantity(itemId) {
    var quantityElement = document.getElementById('quantity_' + itemId);
    var currentQuantity = parseInt(quantityElement.innerText, 10);
    

    var row = quantityElement.closest('tr');
    if (row) {
    var cells = row.cells;

    // Calculate the indices of the two cells previous
    var currentCellIndex = Array.from(cells).indexOf(quantityElement.parentNode);
    var firstPreviousCellIndex = currentCellIndex - 1;
    var secondPreviousCellIndex = currentCellIndex - 2;
    var thirdPreviousCellIndex = currentCellIndex - 3;

    // Extract information from the two cells previous
    var firstPreviousColumnValue = cells[firstPreviousCellIndex].innerText;
    var secondPreviousColumnValue = cells[secondPreviousCellIndex].innerText;
    var thirdPreviousColumnValue = cells[thirdPreviousCellIndex].innerText;

}
      
      if(currentQuantity<secondPreviousColumnValue){
      quantityElement.innerText = currentQuantity + 1;

      var value = parseInt(firstPreviousColumnValue, 10);
      
      total = total + value;
      
      myDictionary[thirdPreviousColumnValue] = currentQuantity+1;
 
      document.getElementById('output').innerHTML = total;


     

}






}

  function decreaseQuantity(itemId) {
    var quantityElement = document.getElementById('quantity_' + itemId);
    var currentQuantity = parseInt(quantityElement.innerText, 10);
    if (currentQuantity > 0) {
      quantityElement.innerText = currentQuantity - 1;
    }
    var row = quantityElement.closest('tr');
    if (row) {
    var cells = row.cells;

    // Calculate the indices of the two cells previous
    var currentCellIndex = Array.from(cells).indexOf(quantityElement.parentNode);
    var firstPreviousCellIndex = currentCellIndex - 1;
    var secondPreviousCellIndex = currentCellIndex - 2;
    var thirdPreviousCellIndex = currentCellIndex - 3;

    // Extract information from the two cells previous
    var firstPreviousColumnValue = cells[firstPreviousCellIndex].innerText;
    var secondPreviousColumnValue = cells[secondPreviousCellIndex].innerText;
    var thirdPreviousColumnValue = cells[thirdPreviousCellIndex].innerText;


}
      var value = parseInt(firstPreviousColumnValue, 10);
      if(total - value >=0 && currentQuantity>0){
      total = total - value;}
      myDictionary[thirdPreviousColumnValue] = currentQuantity-1;
      document.getElementById('output').innerHTML = total;
      


// Call the function with the sample dictionary


  }




  var resultString = '';

  function concatenatePositiveValues() {
      
      
    for (var key in myDictionary) {
        if (myDictionary.hasOwnProperty(key) && myDictionary[key] > 0) {
            resultString +=  myDictionary[key] + 'x ' + key + ', ';
        }
    }

    // Remove the trailing comma and space
    resultString = resultString.slice(0, -2);

    document.getElementById('output').innerHTML = total;
}


/*
function sendVariables(){
var xhr = new XMLHttpRequest();
var form = document.createElement("form");
            form.method = "post";
            window.location.href =window.location.href // Same page URL
            form.style.display = "none";

            // Add parameters as hidden fields
           
            var params = {
                key1: resultString,
                key2: total,
                key3: "Due"
            }
   
            for (var key in params) {
                if (params.hasOwnProperty(key)) {
                    var input = document.createElement("input");
                    input.type = "hidden";
                    input.name = key;
                    input.value = params[key];
                    form.appendChild(input);
                }
            }

            document.body.appendChild(form);
            form.submit();
            

        }

  */      


        



        
        function redirectToPage() {
            var cus_id = document.getElementById('p1').value;
            var status = document.getElementById('p2').value;
   
            window.location.href = './billing_completed.php?id='+jsVariable+'&total='+total+'&resultString='+resultString+'&status='+status+'&cus_id='+cus_id;
       
       }







   

