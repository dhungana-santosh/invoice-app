<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;


class InvoiceController extends Controller
{

    private Invoice $invoice;

    /**
     * @param Invoice $invoice
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $invoices = $this->invoice->paginate(10);

        return view('pages.list')
            ->with('invoices',$invoices);
    }

    /**
     * @param Invoice $invoice
     * @return View
     */
    public function show(Invoice $invoice): View
    {
        return view('pages.preview')
            ->with('invoice',$invoice);
    }

    /**
     * @param Invoice $invoice
     * @return \Illuminate\Foundation\Application|Response|string|Application|ResponseFactory
     */
    public function generatePDF(Invoice $invoice): \Illuminate\Foundation\Application|Response|string|Application|ResponseFactory
    {
        try {
            $data = $invoice->items;
            $firstChunkSize = 15;
            $restChunkSize = 19;

            $processedChunks = [];
            $processedChunks[] = $data->take($firstChunkSize)->all();

            $remainingItems = $data->skip($firstChunkSize);
            while ($remainingItems->isNotEmpty()) {
                $processedChunks[] = $remainingItems->take($restChunkSize)->all();
                $remainingItems = $remainingItems->skip($restChunkSize);
            }

            $pdf = PDF::loadView('pdf.invoice', compact('processedChunks','invoice'));

            return response($pdf->output(), 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename=invoice.pdf');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
