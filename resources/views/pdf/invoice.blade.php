<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap">
  <style>
      body {
          font-family: 'Noto Sans JP', sans-serif;
          font-size: 10px;
      }
      .invoice {
          margin: 20px;
      }

      table {
          width: 100%;
          border-collapse: collapse;
          margin-bottom: 20px;
      }

      th,
      td {
          border: 1px solid #dee2e6;
          padding: 8px;
          text-align: left;
      }

      /* Add this class to the tables from which you want to remove borders */
      .no-border-table th,
      .no-border-table td {
          border: none;
      }

      /* Add this class to hide top borders on specific rows */
      .no-bottom-border th,
      .no-bottom-border td {
          border-bottom-color: white !important;
      }

      /*Page break after the specified class */
      .page-break-after {
          page-break-after: always;
      }
  </style>
</head>

<body>
<div class="invoice">
  @foreach ($processedChunks as $key => $chunk)
      @include('pdf.template.invoiceTemplate',['page'=> $key+1,'items' => $chunk,'invoice' => $invoice])
    @if (!$loop->last)
      <div class="page-break-after"></div>
    @endif  @endforeach
</div>

</body>

</html>
