var myDictionary = {};
var myDictionary2 = {};

    function handleInput(received,index){
        
        
        
        var quantityElement = document.getElementById(index);
        var row = quantityElement.closest('tr');
        if (row) {
        var cells = row.cells;
    
        // Calculate the indices of the two cells previous
        var currentCellIndex = Array.from(cells).indexOf(quantityElement.parentNode);
        var forthPreviousCellIndex = currentCellIndex - 4;
        
    
        // Extract information from the two cells previous
        var forthPreviousColumnValue = cells[forthPreviousCellIndex].innerText;
        myDictionary2[forthPreviousColumnValue] = received;
    
        
    
    }
    
    }



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
      
     
      quantityElement.innerText = currentQuantity + 1;
      myDictionary[thirdPreviousColumnValue] = currentQuantity+1;
 
     


}

  function decreaseQuantity(itemId) {
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
    var firstPreviousColumnValue = parseInt(cells[firstPreviousCellIndex].innerText,10);
    var secondPreviousColumnValue = cells[secondPreviousCellIndex].innerText;
    var thirdPreviousColumnValue = cells[thirdPreviousCellIndex].innerText;
}
    if(  (firstPreviousColumnValue+currentQuantity)>0 ){
        quantityElement.innerText = currentQuantity - 1;
        myDictionary[thirdPreviousColumnValue] = currentQuantity-1;
    }
      
  }




  var resultString = '';
  var resultString2 = '';
  function concatenatePositiveValues() {
      
      
    for (var key in myDictionary) {
        if (myDictionary.hasOwnProperty(key) ) {
            resultString +=  myDictionary[key] + 'x' + key + ',';
        }
    }

    // Remove the trailing comma and space


    // Remove the trailing comma and space
   
    
    for (var key in myDictionary2) {
        if (myDictionary2.hasOwnProperty(key)  && myDictionary2[key] > 0) {
            resultString2 +=  myDictionary2[key] + 'x' + key + ',';
        }
    }


   
}


        
        function redirectToPage2() {

         window.location.href = './update_completed.php?id='+jsVariable+'&resultString='+resultString+'&resultString2='+resultString2+'&exist=False';

        }


        function redirectToPage3() {
            var name = document.getElementById('p1').value;
            var price = document.getElementById('p2').value;
            var factor = document.getElementById('p3').value;
            window.location.href = './update_completed.php?id='+jsVariable+'&resultString=&resultString2=&exist=True&name='+name+'&price='+price+'&factor='+factor;
   
           }


        function redirectToPage(){
            var name = document.getElementById('p1').value;

            window.location.href = './update_completed.php?id='+jsVariable+'&resultString=&resultString2=&exist=Nottrue&name='+name;
   
        }
         
        