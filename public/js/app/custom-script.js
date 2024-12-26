<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>


// function onScanSuccess(decodedText, decodedResult) {
//     // handle the scanned code as you like, for example:
//     console.log(`Code matched = ${decodedText}`, decodedResult);
//   }
  
//   function onScanFailure(error) {
//     // handle scan failure, usually better to ignore and keep scanning.
//     // for example:
//     console.warn(`Code scan error = ${error}`);
//   }
  
//   let html5QrcodeScanner = new Html5QrcodeScanner(
//     "reader",
//     { fps: 10, qrbox: {width: 250, height: 250} },
//     /* verbose= */ false);
//   html5QrcodeScanner.render(onScanSuccess, onScanFailure);
  const resultContainer = document.getElementById("result_container");
  let onSuccess = function(text,result){
     console.log(text,result);
  };
  let onError = function (error) {
      console.log(error);
  }

  let html5QrcodeScanner = new Html5QrcodeScanner(
      "reader",
      {fps:20, qrbox: {width:500,height:500}},
      true,
  );
  html5QrcodeScanner.render(onSucces,onError);