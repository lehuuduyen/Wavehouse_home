<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print</title>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <style>
        @media print {
            /* Hide the header and footer */
            @page {
                margin: 0;
            }

            body {
                margin: 0;
                padding: 0;
            }

            header, footer {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div title="" class="barcode1 s2-013057-52c4013057-6558"
        style="position:absolute;overflow:hidden;left:84px;top:15px;">
        <svg id="barcode" width="100%" height="100%">

        </svg>
    </div>
    <script>
        const queryString = window.location.search;

        const urlParams = new URLSearchParams(queryString);

        JsBarcode("#barcode", urlParams.get('code'), {
            lineColor: "#000000",
        });
    </script>
    <script>
        var css = '@page { size: 80mm 50mm; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);

        window.print();
    </script>
</body>

</html>
