@push('scripts')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.3/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.3/dist/sweetalert2.min.css">
@endpush
<x-filament-panels::page>
    <div x-data="{}" x-load-js="[@js(\Filament\Support\Facades\FilamentAsset::getScriptSrc('custom-script'))]">
    </div>
    <div id="reader" width="200px" height="100px">

    </div>
    <div id="result_container" class="d-none"></div>

</x-filament-panels::page>


@push('scripts')

<script>
    const resultContainer = document.getElementById("result_container");
    let onSuccess = function(text,result){
       console.log(text,result);
       Swal.fire({
        title: "Berhasil Scan :",
        text: `No Pesanan Anda : ${text}`,
        icon: "success",
        confirmButtonText: 'Selesai'

});

    };
    let onError = function (error) {
        // console.log('gagal');
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        {fps:20, qrbox: {width:300,height:300}},
        false,
    );
    html5QrcodeScanner.render(onSuccess,onError);
    // function onScanSuccess(decodedText, decodedResult) {
    //     // handle the scanned code as you like, for example:
    //     console.log(`Code matched = ${decodedText}`, decodedResult);
    //     }

    //     function onScanFailure(error) {
    //     // handle scan failure, usually better to ignore and keep scanning.
    //     // for example:
    //     // console.warn(`Code scan error = ${error}`);
    //     }

    //     let html5QrcodeScanner = new Html5QrcodeScanner(
    //     "reader",
    //     { fps: 10, qrbox: {width: 250, height: 250} },
    //     /* verbose= */ false);
    //     html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

@endpush